namespace EMUSocialAPI.EMUSocial.Application.Common.Services;

public interface IDateTimeProvider
{
    DateTime UtcNow { get; }
}