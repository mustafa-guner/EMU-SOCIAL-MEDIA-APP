using EMUSocialAPI.EMUSocial.Application.Common.Interfaces.Persistance;
using EMUSocialAPI.EMUSocial.Domain;

namespace EMUSocialAPI.EMUSocial.Infrastructure.Persistance;

public class UserRepository : IUserRepository
{
    private static readonly List<User> _users = new();

    public void Add(User user)
    {
        _users.Add(user);
    }

    public User? GetUserByEmail(string email)
    {
        return _users.SingleOrDefault(user => user.email == email);
    }
}