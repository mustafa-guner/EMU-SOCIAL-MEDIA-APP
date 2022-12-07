namespace EMUSocialAPI.EMUSocial.Application.Services.Authentication;
using EMUSocialAPI.EMUSocial.Application.Common.Interfaces.Authentication;

public class AuthenticationService : IAuthenticationService
{
    private readonly IJwtTokenGenerator _jwtTokenGenerator;

    public AuthenticationService(IJwtTokenGenerator jwtTokenGenerator)
    {
        _jwtTokenGenerator = jwtTokenGenerator;
    }

    public AuthenticationResult Register(string firstname, string lastname, string email, string password)
    {

        //CHECK IF USER ALREADY EXISTS
        //CREATE USER (GENERATE UNIQE ID)
        //GENERATE JWT TOKEN
        Guid userID = Guid.NewGuid();
        var token = _jwtTokenGenerator.GenerateToken(userID, email);
        return new AuthenticationResult(userID, firstname, lastname, email, token);

    }

    public AuthenticationResult Login(string email, string password)
    {
        return new AuthenticationResult(Guid.NewGuid(), "firstname", "lastname", email, "token");
    }
}