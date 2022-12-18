using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using AutoMapper;
using EMUSocialAPI.DTOs.User;
using EMUSocialAPI.Models;
using EMUSocialAPI.Models.Enums.User;

namespace EMUSocialAPI.Services.Auth
{
    public class AuthService : IAuthService
    {
        private readonly List<UserModel> users = new List<UserModel>(){

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

        public AuthService(IMapper mapper)
        {
            _mapper = mapper;
        }

        public async Task<ServiceResponse<GetUserDTO>> Register(CreateUserDTO newUser)
        {
            var serviceResponse = new ServiceResponse<GetUserDTO>();
            var mappedUser = _mapper.Map<UserModel>(newUser);
            users.Add(mappedUser);
            serviceResponse.Data = _mapper.Map<GetUserDTO>(mappedUser);
            return serviceResponse;
        }


        public async Task<ServiceResponse<GetUserDTO>> Login(LoginUserDTO user)
        {
            var serviceResponse = new ServiceResponse<GetUserDTO>();
            var doesUserExist = users.FirstOrDefault(u => u.Email == user.Email);
            serviceResponse.Data = _mapper.Map<GetUserDTO>(doesUserExist);
            return serviceResponse;
        }
    }
}