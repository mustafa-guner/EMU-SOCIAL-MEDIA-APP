using System.Text.Json.Serialization;
namespace EMUSocialAPI.Models.Enums.User
{

    [JsonConverter(typeof(JsonStringEnumConverter))]
    public enum UserType
    {
        Instructor = 11,
        Servant = 12,
        Student = 22,
        Assistant = 23
    }
}