using EMUSocialAPI.Models.DTOs.Auth;

namespace EMUSocialAPI.Services.Auth
{
    public interface IAuthService
    {
        Task<RegisterResponse> Register(RegisterRequestDTO newUser);
        Task<LoginResponse> Login(LoginRequestDTO user);

    }
}