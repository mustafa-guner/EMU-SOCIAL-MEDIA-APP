namespace EMUSocialAPI.EMUSocial.Api;
using Microsoft.AspNetCore.Mvc;
using EMUSocialAPI.EMUSocial.Contracts.Authentication;
using EMUSocialAPI.EMUSocial.Application.Services.Authentication;
[ApiController]
[Route("auth")]
public class AuthenticationController : ControllerBase
{

    private readonly IAuthenticationService _authenticationService;

    public AuthenticationController(IAuthenticationService authenticationService)
    {
        _authenticationService = authenticationService;
    }

    [HttpPost("register")]
    public IActionResult Register(RegisterRequest request)
    {

        var registerResult = _authenticationService.Register(request.firstname, request.lastname, request.email, request.password);
        var registerResponse = new AuthenticationResponse(registerResult.id, registerResult.firstname, registerResult.lastname, registerResult.email, registerResult.token);
        return Ok(registerResponse);
    }

    [HttpPost("login")]
    public IActionResult Login(LoginRequest request)
    {
        var loginResult = _authenticationService.Login(request.email, request.password);
        var loginResponse = new AuthenticationResponse(loginResult.id, loginResult.firstname, loginResult.lastname, loginResult.email, loginResult.token);
        return Ok(loginResponse);
    }

    [HttpPost("forgot-password")]

    public IActionResult ForgotPassword()
    {
        return Ok();
    }

    [HttpPost("reset-password")]
    public IActionResult ResetPassword()
    {
        return Ok();
    }

}
