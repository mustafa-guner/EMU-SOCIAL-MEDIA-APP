namespace EMUSocialAPI.EMUSocial.Application.Services.Authentication;

public interface IAuthenticationService
{
    AuthenticationResult Register(string firstname, string lastname, string email, string pasword);
    AuthenticationResult Login(string email, string password);
}