
using EMUSocialAPI.Models;
using EMUSocialAPI.Models.DTOs.Users;
using EMUSocialAPI.Models.Enums.User;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Filters;


namespace EMUSocialAPI.Authorization
{

    [AttributeUsage(AttributeTargets.Class | AttributeTargets.Method)]
    public class AuthorizeAttribute : Attribute, IAuthorizationFilter
    {
        private readonly IList<UserRole> _roles;

        public AuthorizeAttribute(params UserRole[] roles)
        {
            _roles = roles ?? new UserRole[] { };
        }

        public void OnAuthorization(AuthorizationFilterContext context)
        {
            // skip authorization if action is decorated with [AllowAnonymous] attribute
            var allowAnonymous = context.ActionDescriptor.EndpointMetadata.OfType<AllowAnonymousAttribute>().Any();
            if (allowAnonymous)
                return;

            // authorization
            var user = (GetUserDTO)context.HttpContext.Items["User"];
            if (user is null || (_roles.Any() && !_roles.Contains(user.Role)))
            {
                // not logged in or role not authorized
                context.Result = new JsonResult(new { message = "You are not authorized. Please log in." }) { StatusCode = StatusCodes.Status401Unauthorized };
            }
        }
    }
}