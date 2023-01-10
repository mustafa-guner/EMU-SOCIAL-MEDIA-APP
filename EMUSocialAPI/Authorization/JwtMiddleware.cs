using EMUSocialAPI.Helpers;
using EMUSocialAPI.Services.User;
using Microsoft.Extensions.Options;

namespace EMUSocialAPI.Authorization
{
    public class JwtMiddleware
    {
        private readonly RequestDelegate _next;
        private readonly AppSettings _appSettings;

        public JwtMiddleware(RequestDelegate next, IOptions<AppSettings> appSettings)
        {
            _next = next;
            _appSettings = appSettings.Value;
        }

        public async Task Invoke(HttpContext context, IUserService userService, IJwtUtils jwtUtils)
        {
            var token = context.Request.Headers["Authorization"].FirstOrDefault()?.Split(" ").Last();

            if (token is not null)
            {
                var userId = jwtUtils.ValidateJwtToken(token)!;
                // attach user to context on successful jwt validation
                context.Items["User"] = await userService.GetUserByID(userId.Value);
            }

            await _next(context);
        }
    }

}