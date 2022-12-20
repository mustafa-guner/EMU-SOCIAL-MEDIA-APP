using EMUSocialAPI.DTOs.User;
using EMUSocialAPI.Models;
using EMUSocialAPI.Services.User;
using Microsoft.AspNetCore.Mvc;

namespace EMUSocialAPI.Controllers
{
    [ApiController]
    [Route("users")]
    public class UserController : ControllerBase
    {
        private readonly IUserService _userService;
        public UserController(IUserService userService)
        {
            _userService = userService;
        }


        [HttpGet("/")]
        public async Task<ActionResult<ServiceResponse<List<GetUserDTO>>>> GetUsers()
        {
            return Ok(await _userService.GetAllUsers());
        }

        [HttpGet("/{id}")]
        public async Task<ActionResult<List<GetUserDTO>>> GetUserByID(int id)
        {
            return Ok(await _userService.GetUserByID(id));
        }

    }
}