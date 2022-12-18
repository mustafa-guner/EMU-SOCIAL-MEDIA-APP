using AutoMapper;
using EMUSocialAPI.Data;
using EMUSocialAPI.DTOs.User;
using EMUSocialAPI.Models;
using EMUSocialAPI.Models.Enums.User;
using Microsoft.EntityFrameworkCore;

namespace EMUSocialAPI.Services.Auth
{
    public class AuthService : IAuthService
    {
        private readonly List<UserModel> users = new List<UserModel>{

           new UserModel{
            Firstname =  "Mustafa",
            Lastname = "Guner",
            Email = "legend123412@outlook.com",
            ProfileImage =  "avatar.png",
            Password = "asdf1234",
            Dob =  new DateTime(1999,9,28),
            Gender = GenderType.Male,
            Role = UserRole.User,
            Country = "Cyprus",
            UserType= UserType.Student,
            }
        };
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
                var user = await _dbContext.Users.FirstOrDefaultAsync(u => u.Email == registerCredentials.Email);
                if (user is not null) throw new Exception("User already exists with the given email.");
                var mappedUser = _mapper.Map<UserModel>(registerCredentials);
                await _dbContext.Users.AddAsync(mappedUser);
                await _dbContext.SaveChangesAsync();
                serviceResponse.Data = _mapper.Map<GetUserDTO>(mappedUser);
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
                if (user is null) throw new Exception("User account with the email is not found.");
                if (user.IsActive is not true) throw new Exception("Your account has not activated yet. Please get in touch with admin.");
                serviceResponse.Data = _mapper.Map<GetUserDTO>(loginCredentials);
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