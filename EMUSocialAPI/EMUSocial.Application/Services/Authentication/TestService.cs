namespace EMUSocialAPI.EMUSocial.Application.Services.Authentication;
using EMUSocialAPI.EMUSocial.Application.Common.Interfaces.Persistance;
using EMUSocialAPI.EMUSocial.Domain;

public class TestService
{
    private readonly IUserRepository _userRepository;
    public TestService(IUserRepository userRepository)
    {
        _userRepository = userRepository;
    }
    public User getProfileByEmail(string email)
    {
        var user = _userRepository.GetUserByEmail(email);
        if (user is not User)
        {
            throw new Exception("User with given email is not found.");
        }

        return user;
    }

}