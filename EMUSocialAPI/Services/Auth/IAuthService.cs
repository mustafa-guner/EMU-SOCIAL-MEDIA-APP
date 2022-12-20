using EMUSocialAPI.DTOs.User;
using EMUSocialAPI.Models;

namespace EMUSocialAPI.Services.Auth
{
    public interface IAuthService
    {
        Task<ServiceResponse<GetUserDTO>> Register(RegisterUserDTO newUser);
        Task<LoginResponse> Login(LoginUserDTO user);

    }
}