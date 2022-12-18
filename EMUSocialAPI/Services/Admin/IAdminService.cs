using EMUSocialAPI.DTOs.User;
using EMUSocialAPI.Models;

namespace EMUSocialAPI.Services.Admin
{
    public interface IAdminService
    {
        Task<ServiceResponse<GetUserDTO>> ActivateUserAccount(Guid id);
        Task<ServiceResponse<GetUserDTO>> DeActivateUserAccount(Guid Id);
        Task<ServiceResponse<GetUserDTO>> UpdateUserAccount(Guid Id);


    }
}