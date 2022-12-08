namespace EMUSocialAPI.EMUSocial.Contracts.Authentication;

public record RegisterRequest(
    string firstname,
    string lastname,
    string email,
    string password,
    string countryID,
    string gender,
    string dob,
    string profileImage,
    string role
);
