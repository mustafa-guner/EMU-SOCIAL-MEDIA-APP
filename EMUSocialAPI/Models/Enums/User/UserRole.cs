using System.Text.Json.Serialization;
namespace EMUSocialAPI.Models.Enums.User
{
    [JsonConverter(typeof(JsonStringEnumConverter))]
    public enum UserRole
    {
        SuperAdmin = 1,
        Admin = 2,
        User = 3
    }
}