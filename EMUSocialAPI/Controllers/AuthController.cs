using Microsoft.AspNetCore.Mvc;
using EMUSocialAPI.Services.Auth;
using EMUSocialAPI.Authorization;
using EMUSocialAPI.Models.DTOs.Auth;

namespace EMUSocialAPI.Controllers
{

    [Authorize]
    [ApiController]
    public class AuthController : ControllerBase
    {
        private readonly IAuthService _authService;
        public AuthController(IAuthService authService)
        {
            _authService = authService;
        }


        [AllowAnonymous]

        [HttpPost("/auth/register")]
        public async Task<ActionResult<RegisterResponse>> Register(RegisterRequestDTO registerRequest)
        {
            var registerResult = await _authService.Register(registerRequest);
            return Ok(registerResult);
        }

        [AllowAnonymous]

        [HttpPost("/auth/login")]
        public async Task<ActionResult<LoginResponse>> Authenticate(LoginRequestDTO loginRequest)
        {
            var loginResponse = await _authService.Login(loginRequest);
            return Ok(loginResponse);
        }


    }
}