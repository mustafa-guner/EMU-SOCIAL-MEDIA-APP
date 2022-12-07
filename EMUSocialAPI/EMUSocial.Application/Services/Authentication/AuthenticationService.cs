namespace EMUSocialAPI.EMUSocial.Application.Services.Authentication;
using EMUSocialAPI.EMUSocial.Application.Common.Interfaces.Authentication;
using EMUSocialAPI.EMUSocial.Application.Common.Interfaces.Persistance;
using EMUSocialAPI.EMUSocial.Domain;

public class AuthenticationService : IAuthenticationService
{
    private readonly IJwtTokenGenerator _jwtTokenGenerator;
    private readonly IUserRepository _userRepository;
    public AuthenticationService(IJwtTokenGenerator jwtTokenGenerator, IUserRepository userRepository)
    {
        _jwtTokenGenerator = jwtTokenGenerator;
        _userRepository = userRepository;
    }

    public AuthenticationResult Register(string firstname,
     string lastname, string email, string password,
     string countryID, string gender, string dob, string profileImage, string role
     )
    {

        //CHECK IF USER ALREADY Exists
        if (_userRepository.GetUserByEmail(email) is not null)
        {
            throw new Exception("User with given email already exists.");
        }
        //CREATE USER (GENERATE UNIQE ID)
        var user = new User
        {
            firstname = firstname,
            lastname = lastname,
            email = email,
            countryID = countryID,
            gender = gender,
            dob = dob,
            profileImage = profileImage,
            password = password,
            role = role
        };

        _userRepository.Add(user);

        //GENERATE JWT TOKEN

        var token = _jwtTokenGenerator.GenerateToken(user);
        return new AuthenticationResult(user, token);

    }

    public AuthenticationResult Login(string email, string password)
    {


        //Validate if user already exists or not (if not throw error)
        if (_userRepository.GetUserByEmail(email) is not User user)
        {
            throw new Exception("User with given email is not found.");
        }

        //Validate the password is correct;
        if (user.password != password)
        {
            throw new Exception("Password is not correct.");
        }

        //Create token
        var token = _jwtTokenGenerator.GenerateToken(user);
        return new AuthenticationResult(user, token);
    }

    public AuthenticationResult Register(string firstname, string lastname, string email, string password, string countryID, string gender, string dob, string profileImage)
    {
        throw new NotImplementedException();
    }
}