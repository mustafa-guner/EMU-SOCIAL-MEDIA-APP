using System.Text.Json.Serialization;

namespace EMUSocialAPI.Models.Enums.User

{
    [JsonConverter(typeof(JsonStringEnumConverter))]
    public enum DegreeType
    {

        Associate, // (2 yrs - 3yrs)
        Bachelor, // (4 yrs - 5yrs)
        Graduate, // Master (1.5 yrs - 2 yrs)
        Doctorate  // Doctorate (5 yrs - 7 yrs)
    }
}