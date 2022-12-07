namespace EMUSocialAPI.EMUSocial.Application.Common.Interfaces.Persistance;
using EMUSocialAPI.EMUSocial.Domain;

public interface IUserRepository
{
    User? GetUserByEmail(string email);
    void Add(User user);
}