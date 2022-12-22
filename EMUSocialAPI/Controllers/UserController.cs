using EMUSocialAPI.Authorization;
using EMUSocialAPI.Models;
using EMUSocialAPI.Models.DTOs.Users;
using EMUSocialAPI.Models.Enums.User;
using EMUSocialAPI.Services.User;
using Microsoft.AspNetCore.Mvc;


namespace EMUSocialAPI.Controllers
{

    [Authorize]
    [ApiController]

    public class UserController : ControllerBase
    {
        private readonly IUserService _userService;
        public UserController(IUserService userService)
        {
            _userService = userService;
        }


        [Authorize(UserRole.Admin)]
        [HttpGet("/users")]
        public async Task<ActionResult<ServiceResponse<List<GetUserDTO>>>> GetAllUsers()
        {
            return Ok(await _userService.GetAllUsers());
        }
        // [Authorize(UserRole.User)]
        // [HttpGet("/{id}")]
        // public async Task<ActionResult<List<GetUserDTO>>> GetUserByID(int id)
        // {
        //     return Ok(await _userService.GetUserByID(id));
        // }

    }
}