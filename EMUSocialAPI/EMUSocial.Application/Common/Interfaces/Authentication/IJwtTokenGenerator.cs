using EMUSocialAPI.EMUSocial.Domain;

namespace EMUSocialAPI.EMUSocial.Application.Common.Interfaces.Authentication;

public interface IJwtTokenGenerator
{
    string GenerateToken(User User);

}