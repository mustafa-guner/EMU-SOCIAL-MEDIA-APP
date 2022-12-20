using EMUSocialAPI.DTOs.Admin;
using EMUSocialAPI.DTOs.User;
using EMUSocialAPI.Models;

namespace EMUSocialAPI.Services.Admin
{
    public interface IAdminService
    {
        Task<ServiceResponse<GetUserDTO>> ToggleActiveUserAccount(int id);

        Task<ServiceResponse<GetUserDTO>> RemoveUserAccount(int id);

        Task<ServiceResponse<GetUserDTO>> UpdateUserByID(int id, UpdateUserDTO updateUser);


    }
}