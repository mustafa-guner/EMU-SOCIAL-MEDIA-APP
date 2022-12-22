using System.Text.Json.Serialization;
namespace EMUSocialAPI.Models.Enums.User
{

    [JsonConverter(typeof(JsonStringEnumConverter))]
    public enum UserType
    {
        Instructor,
        Servant,
        Student,

    }
}