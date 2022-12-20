using EMUSocialAPI.DTOs.User;
using EMUSocialAPI.Models;

namespace EMUSocialAPI.Services.User
{
    public interface IUserService
    {
        Task<ServiceResponse<GetUserDTO>> GetUserByID(int Id);
        Task<ServiceResponse<List<GetUserDTO>>> GetAllUsers();



    }
}