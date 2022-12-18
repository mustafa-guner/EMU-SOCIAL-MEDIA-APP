using Microsoft.AspNetCore.Mvc;
using EMUSocialAPI.Services.Auth;
using EMUSocialAPI.DTOs.User;
using EMUSocialAPI.Models;

namespace EMUSocialAPI.Controllers
{
    [ApiController]
    [Route("auth")]
    public class AuthController : ControllerBase
    {
        private readonly IAuthService _authService;
        public AuthController(IAuthService authService)
        {
            _authService = authService;
        }

        [HttpPost("/register")]
        public async Task<ActionResult<ServiceResponse<GetUserDTO>>> Register(CreateUserDTO registerRequest)
        {
            var registerResult = await _authService.Register(registerRequest);
            return Ok(registerResult);
        }

        [HttpPost("/login")]
        public async Task<ActionResult<ServiceResponse<GetUserDTO>>> Login(LoginUserDTO loginRequest)
        {
            var loginResponse = await _authService.Login(loginRequest);
            return Ok(loginResponse);
        }


    }
}