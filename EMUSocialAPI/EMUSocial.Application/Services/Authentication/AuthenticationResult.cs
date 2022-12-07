namespace EMUSocialAPI.EMUSocial.Application.Services.Authentication;

public record AuthenticationResult(
    Guid id,
    string firstname,
    string lastname,
    string email,
    string token

);