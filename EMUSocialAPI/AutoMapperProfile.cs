using AutoMapper;
using EMUSocialAPI.Models;
using EMUSocialAPI.Models.DTOs.Admin;
using EMUSocialAPI.Models.DTOs.Auth;
using EMUSocialAPI.Models.DTOs.Users;

namespace EMUSocialAPI
{
    public class AutoMapperProfile : Profile
    {
        public AutoMapperProfile()
        {
            CreateMap<UserModel, GetUserDTO>();
            CreateMap<RegisterRequestDTO, UserModel>();
            CreateMap<UpdateUserDTO, UserModel>()
            .ForAllMembers(x => x.Condition(
                (src, dest, prop) =>
                {
                    // ignore null & empty string properties
                    if (prop == null) return false;
                    if (prop.GetType() == typeof(string) && string.IsNullOrEmpty((string)prop)) return false;

                    return true;
                }
            ));
        }
    }
}