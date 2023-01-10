using EMUSocialAPI.Models;
using EMUSocialAPI.Models.DTOs.Users;

namespace EMUSocialAPI.Services.User
{
    public interface IUserService
    {
        Task<GetUserDTO> GetUserByID(int Id);
        Task<ServiceResponse<List<GetUserDTO>>> GetAllUsers();

    }
}