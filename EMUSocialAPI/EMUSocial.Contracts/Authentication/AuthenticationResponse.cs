namespace EMUSocialAPI.EMUSocial.Contracts.Authentication;

public record AuthenticationResponse(Guid id, string firstname, string lastname, string email, string token);