namespace EMUSocialAPI.EMUSocial.Infrastructure;

using EMUSocialAPI.EMUSocial.Application.Common.Interfaces.Authentication;
using EMUSocialAPI.EMUSocial.Application.Common.Interfaces.Persistance;
using EMUSocialAPI.EMUSocial.Application.Common.Services;
using EMUSocialAPI.EMUSocial.Infrastructure.Authentication;
using EMUSocialAPI.EMUSocial.Infrastructure.Persistance;
using EMUSocialAPI.EMUSocial.Infrastructure.Services;
using Microsoft.Extensions.DependencyInjection;


public static class DependencyInjection
{
    public static IServiceCollection AddInfrastructure(this IServiceCollection services, Microsoft.Extensions.Configuration.ConfigurationManager configuration)
    {
        //dotnet add package Microsoft.Extensions.Options.ConfigurationExtensions for the following service
        services.Configure<JwtSettings>(configuration.GetSection(JwtSettings.SectionName));
        services.AddSingleton<IJwtTokenGenerator, JwtTokenGenerator>();
        services.AddSingleton<IDateTimeProvider, DateTimeProvider>();
        services.AddScoped<IUserRepository, UserRepository>();
        return services;
    }
}

//WHY DO WE USE "service.AddSingleton" & "AddScoped" (Differences and when to use each)
