using EMUSocialAPI.Models;
using EMUSocialAPI.Models.DTOs.Admin;
using EMUSocialAPI.Models.DTOs.Users;

namespace EMUSocialAPI.Services.Admin
{
    public interface IAdminService
    {
        Task<ServiceResponse<GetUserDTO>> ToggleActiveUserAccount(int id);

        Task<ServiceResponse<GetUserDTO>> RemoveUserAccount(int id);

        Task<ServiceResponse<GetUserDTO>> UpdateUserByID(int id, UpdateUserDTO updateUser);


    }
}