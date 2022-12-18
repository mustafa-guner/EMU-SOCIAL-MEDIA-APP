using AutoMapper;
using EMUSocialAPI.DTOs.User;
using EMUSocialAPI.Models;

namespace EMUSocialAPI
{
    public class AutoMapperProfile : Profile
    {
        public AutoMapperProfile()
        {
            CreateMap<UserModel, GetUserDTO>();
            CreateMap<CreateUserDTO, UserModel>();
        }
    }
}