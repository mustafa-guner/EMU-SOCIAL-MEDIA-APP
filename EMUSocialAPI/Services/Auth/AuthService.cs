using System.IdentityModel.Tokens.Jwt;
using System.Security.Claims;
using System.Text;
using AutoMapper;
using EMUSocialAPI.Data;
using EMUSocialAPI.DTOs.User;
using EMUSocialAPI.Helpers;
using EMUSocialAPI.Models;
using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.Options;
using Microsoft.IdentityModel.Tokens;
using Bcrypt = BCrypt.Net.BCrypt;

namespace EMUSocialAPI.Services.Auth
{
    public class AuthService : IAuthService
    {

        private readonly IMapper _mapper;
        private readonly DataContext _dbContext;
        private readonly AppSettings _appSettings;
        public AuthService(IMapper mapper, DataContext dbContext, IOptions<AppSettings> appSettings)
        {
            _mapper = mapper;
            _dbContext = dbContext;
            _appSettings = appSettings.Value;
        }

        public async Task<ServiceResponse<GetUserDTO>> Register(RegisterUserDTO registerCredentials)
        {
            var serviceResponse = new ServiceResponse<GetUserDTO>();
            try
            {
                //Check if the user is already exists
                if (_dbContext.Users.Any(u => u.Email == registerCredentials.Email))
                    throw new Exception("Email '" + registerCredentials.Email + "' is already taken.");

                var user = _mapper.Map<UserModel>(registerCredentials);

                //Hash password before add it to Databse
                user.Password = Bcrypt.HashPassword(registerCredentials.Password);

                //Add To Database
                await _dbContext.Users.AddAsync(user);
                //Save Database
                await _dbContext.SaveChangesAsync();
                serviceResponse.Data = _mapper.Map<GetUserDTO>(user);
                return serviceResponse;
            }
            catch (Exception e)
            {
                serviceResponse.Success = false;
                serviceResponse.Message = e.Message;
                return serviceResponse;
            }
        }

        public async Task<LoginResponse> Login(LoginUserDTO loginCredentials)
        {
            var loginResponse = new LoginResponse();
            try
            {
                var user = await _dbContext.Users.FirstOrDefaultAsync(u => u.Email == loginCredentials.Email);
                //check if user already registered before or not
                if (user is null) throw new Exception("User account with the email is not found.");


                //Check if passwords are matched or not. (Compare it with the hashed one in database)
                if (!Bcrypt.Verify(loginCredentials.Password, user.Password)) throw new Exception("Password is not correct.");
                //Check user's account if it is active or not.
                if (user.IsActive is not true) throw new Exception("Your account has not activated yet. Please get in touch with admin.");

                loginResponse.Token = generateJwtToken(user);

                return loginResponse;
            }
            catch (Exception e)
            {
                loginResponse.Success = false;
                loginResponse.Message = e.Message;
                return loginResponse;
            }

        }

        private string generateJwtToken(UserModel user)
        {
            // generate token that is valid for 7 days
            var tokenHandler = new JwtSecurityTokenHandler();
            var key = Encoding.ASCII.GetBytes(_appSettings.Secret);
            var tokenDescriptor = new SecurityTokenDescriptor
            {
                Subject = new ClaimsIdentity(new[] { new Claim("id", user.Id.ToString()) }),
                Expires = DateTime.UtcNow.AddDays(7),
                SigningCredentials = new SigningCredentials(new SymmetricSecurityKey(key), SecurityAlgorithms.HmacSha256Signature)
            };
            var token = tokenHandler.CreateToken(tokenDescriptor);
            return tokenHandler.WriteToken(token);
        }
    }
}