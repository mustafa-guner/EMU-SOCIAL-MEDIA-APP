using AutoMapper;
using EMUSocialAPI.Data;
using EMUSocialAPI.DTOs.User;
using EMUSocialAPI.Models;
using Microsoft.EntityFrameworkCore;
using Bcrypt = BCrypt.Net.BCrypt;

namespace EMUSocialAPI.Services.Auth
{
    public class AuthService : IAuthService
    {

        private readonly IMapper _mapper;
        private readonly DataContext _dbContext;
        public AuthService(IMapper mapper, DataContext dbContext)
        {
            _mapper = mapper;
            _dbContext = dbContext;
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


        public async Task<List<UserModel>> Users()
        {
            var dbUsers = await _dbContext.Users.ToListAsync();
            return dbUsers;
        }


        public async Task<ServiceResponse<GetUserDTO>> Login(LoginUserDTO loginCredentials)
        {
            var serviceResponse = new ServiceResponse<GetUserDTO>();
            try
            {
                var user = await _dbContext.Users.FirstOrDefaultAsync(u => u.Email == loginCredentials.Email);
                //check if user already registered before or not
                if (user is null) throw new Exception("User account with the email is not found.");


                //Check if passwords are matched or not. (Compare it with the hashed one in database)
                if (!Bcrypt.Verify(loginCredentials.Password, user.Password)) throw new Exception("Password is not correct.");
                //Check user's account if it is active or not.
                if (user.IsActive is not true) throw new Exception("Your account has not activated yet. Please get in touch with admin.");

                serviceResponse.Data = _mapper.Map<GetUserDTO>(_mapper.Map<UserModel>(user));
                return serviceResponse;
            }
            catch (Exception e)
            {
                serviceResponse.Success = false;
                serviceResponse.Message = e.Message;
                return serviceResponse;
            }

        }
    }
}