namespace EMUSocialAPI.EMUSocial.Contracts.Authentication;

public record LoginRequest(
    string email, string password
);