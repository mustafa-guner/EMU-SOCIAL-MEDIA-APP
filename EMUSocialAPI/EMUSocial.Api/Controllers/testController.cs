namespace EMUSocialAPI.EMUSocial.Api;
using EMUSocialAPI.EMUSocial.Application.Services.Authentication;
using Microsoft.AspNetCore.Mvc;

[ApiController]
[Route("test")]
public class testController : ControllerBase
{

    private readonly TestService _testService;

    public testController(TestService testService)
    {
        _testService = testService;
    }

    [HttpGet("health")]
    public IActionResult healthCheck()
    {
        return Ok("success");
    }

    [Route("{email}")]
    public IActionResult me(string email)
    {
        var testUserResult = _testService.getProfileByEmail(email);
        return Ok(testUserResult);
    }
}
