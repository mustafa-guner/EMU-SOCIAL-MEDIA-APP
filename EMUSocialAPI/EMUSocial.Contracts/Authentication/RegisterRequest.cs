namespace EMUSocialAPI.EMUSocial.Contracts.Authentication;

public record RegisterRequest(
    string firstname,
    string lastname,
    string email,
    string password
);