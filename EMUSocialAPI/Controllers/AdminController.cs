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

    public class AdminController : ControllerBase
    {
        private readonly IAdminService _adminService;
        public AdminController(IAdminService adminService)
        {
            _adminService = adminService;
        }


        [Route("/admin/toggle-active-account/{id}")]
        [HttpPut]
        public async Task<ActionResult<ServiceResponse<GetUserDTO>>> ToggleActiveAccount([FromRoute] int id)
        {
            return Ok(await _adminService.ToggleActiveUserAccount(id));
        }


        [Route("/admin/remove-user/{id}")]
        [HttpDelete]
        public async Task<ActionResult<ServiceResponse<GetUserDTO>>> RemoveUserByID([FromRoute] int id)
        {

            return Ok(await _adminService.RemoveUserAccount(id));
        }


        [Route("/admin/update-user/{id}")]
        [HttpPut]
        public async Task<ActionResult<ServiceResponse<GetUserDTO>>> UpdateUser([FromRoute] int id, [FromBody] UpdateUserDTO updateUser)
        {
            return Ok(await _adminService.UpdateUserByID(id, updateUser));
        }
    }
}