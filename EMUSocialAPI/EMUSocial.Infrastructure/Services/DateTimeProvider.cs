namespace EMUSocialAPI.EMUSocial.Infrastructure.Services;
using EMUSocialAPI.EMUSocial.Application.Common.Services;

public class DateTimeProvider : IDateTimeProvider
{
    public DateTime UtcNow => DateTime.UtcNow;
}