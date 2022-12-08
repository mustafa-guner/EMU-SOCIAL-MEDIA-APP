namespace EMUSocialAPI.EMUSocial.Application.Services.Authentication;

public interface IAuthenticationService
{
    AuthenticationResult Register(string firstname,
     string lastname, string email, string password,
     string countryID, string gender, string dob, string profileImage, string role);
    AuthenticationResult Login(string email, string password);
}