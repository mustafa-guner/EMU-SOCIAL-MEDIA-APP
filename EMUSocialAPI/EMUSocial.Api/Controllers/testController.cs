namespace EMUSocialAPI.EMUSocial.Api;
using Microsoft.AspNetCore.Mvc;

[ApiController]
[Route("test")]
public class testController : ControllerBase
{
    [HttpGet("health")]
    public IActionResult healthCheck()
    {
        return Ok("success");
    }
}
