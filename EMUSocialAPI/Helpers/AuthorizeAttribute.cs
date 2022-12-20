using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using EMUSocialAPI.Models;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Filters;

namespace EMUSocialAPI.Helpers
{
    [AttributeUsage(AttributeTargets.Class | AttributeTargets.Method)]
    public class AuthorizeAttribute : Attribute, IAuthorizationFilter
    {
        public void OnAuthorization(AuthorizationFilterContext context)
        {
            var user = (UserModel)context.HttpContext.Items["User"];
            if (user == null)
            {
                // not logged in
                context.Result = new JsonResult(new { message = "You are not authorized! Please log in." }) { StatusCode = StatusCodes.Status401Unauthorized };
            }
        }
    }
}