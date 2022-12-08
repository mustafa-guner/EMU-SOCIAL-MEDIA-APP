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
        //gerekli olanlar alani
        var registerResult = _authenticationService.Register(request.firstname, request.lastname, request.email, request.password, request.countryID, request.gender, request.dob, request.profileImage, request.role);
        var registerResponse = new AuthenticationResponse(registerResult.User.id, registerResult.User.firstname, registerResult.User.lastname, registerResult.User.email, registerResult.token);
        return Ok(registerResponse);
    }

    [HttpPost("login")]
    public IActionResult Login(LoginRequest request)
    {
        var loginResult = _authenticationService.Login(request.email, request.password);
        var loginResponse = new AuthenticationResponse(loginResult.User.id, loginResult.User.firstname, loginResult.User.lastname, loginResult.User.email, loginResult.token);
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
