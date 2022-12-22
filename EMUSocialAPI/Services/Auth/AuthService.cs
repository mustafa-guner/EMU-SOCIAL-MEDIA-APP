using AutoMapper;
using EMUSocialAPI.Authorization;
using EMUSocialAPI.Data;
using EMUSocialAPI.Helpers;
using EMUSocialAPI.Models;
using EMUSocialAPI.Models.DTOs.Auth;
using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.Options;
using Bcrypt = BCrypt.Net.BCrypt;


namespace EMUSocialAPI.Services.Auth
{
    public class AuthService : IAuthService
    {

        private readonly IMapper _mapper;
        private readonly DataContext _dbContext;
        private IJwtUtils _jwtUtils;
        private readonly AppSettings _appSettings;
        public AuthService(IMapper mapper, DataContext dbContext, IJwtUtils jwtUtils, IOptions<AppSettings> appSettings)
        {
            _mapper = mapper;
            _dbContext = dbContext;
            _jwtUtils = jwtUtils;
            _appSettings = appSettings.Value;
        }

        public async Task<RegisterResponse> Register(RegisterRequestDTO registerCredentials)
        {
            var registerResponse = new RegisterResponse();
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

            registerResponse.Message = "Congrulations! Your account has been added to queue for confirmation process.";
            return registerResponse;
        }

        public async Task<LoginResponse> Login(LoginRequestDTO loginCredentials)
        {
            var loginResponse = new LoginResponse();
            var user = await _dbContext.Users.FirstOrDefaultAsync(u => u.Email == loginCredentials.Email);
            //check if user already registered before or not
            if (user is null) throw new Exception("User account with the email is not found.");
            //Check if passwords are matched or not. (Compare it with the hashed one in database)
            if (!Bcrypt.Verify(loginCredentials.Password, user.Password)) throw new Exception("Password is not correct.");
            //Check user's account if it is active or not.
            if (user.IsActive is not true) throw new Exception("Your account is not active. Please get in touch with admin.");

            loginResponse.Token = _jwtUtils.GenerateJwtToken(user);

            return loginResponse;

        }


    }
}