using EMUSocialAPI.DTOs.User;
using EMUSocialAPI.Models;

namespace EMUSocialAPI.Services.Auth
{
    public interface IAuthService
    {
        Task<ServiceResponse<GetUserDTO>> Register(CreateUserDTO newUser);
        Task<ServiceResponse<GetUserDTO>> Login(LoginUserDTO user);
    }
}