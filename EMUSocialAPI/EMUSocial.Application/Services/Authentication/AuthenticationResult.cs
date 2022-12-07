using EMUSocialAPI.EMUSocial.Domain;

namespace EMUSocialAPI.EMUSocial.Application.Services.Authentication;

public record AuthenticationResult(
    User User,
    string token
);

