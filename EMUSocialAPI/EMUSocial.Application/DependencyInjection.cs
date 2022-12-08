
namespace EMUSocialAPI.EMUSocial.Application;
using EMUSocialAPI.EMUSocial.Application.Services.Authentication;
using Microsoft.Extensions.DependencyInjection;

public static class DependencyInjection
{

    public static IServiceCollection AddApplication(this IServiceCollection services)
    {
        services.AddScoped<IAuthenticationService, AuthenticationService>();

        //TEST SERVICE
        services.AddScoped<TestService, TestService>();
        return services;
    }
}