using EMUSocialAPI.Authorization;
using EMUSocialAPI.Models;
using EMUSocialAPI.Models.DTOs.Admin;
using EMUSocialAPI.Models.DTOs.Users;
using EMUSocialAPI.Models.Enums.User;
using EMUSocialAPI.Services.Admin;
using Microsoft.AspNetCore.Mvc;

namespace EMUSocialAPI.Controllers
{
    [Authorize(UserRole.Admin)]
    [ApiController]
    [Route("admin")]
    public class AdminController : ControllerBase
    {
        private readonly IAdminService _adminService;
        public AdminController(IAdminService adminService)
        {
            _adminService = adminService;
        }


        [Route("/toggle-active-account/{id}")]
        [HttpPut]
        public async Task<ActionResult<ServiceResponse<GetUserDTO>>> ToggleActiveAccount(int id)
        {
            return Ok(await _adminService.ToggleActiveUserAccount(id));
        }


        [Route("/remove-user/{id}")]
        [HttpDelete]
        public async Task<ActionResult<ServiceResponse<GetUserDTO>>> RemoveUserByID(int id)
        {
            return Ok(await _adminService.RemoveUserAccount(id));
        }


        [Route("/update-user/{id}")]
        [HttpPut]
        public async Task<ActionResult<ServiceResponse<GetUserDTO>>> UpdateUser(int id, UpdateUserDTO updateUser)
        {
            return Ok(await _adminService.UpdateUserByID(id, updateUser));
        }
    }
}