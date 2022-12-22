namespace EMUSocialAPI.Models.DTOs.Auth
{
    public class LoginResponse
    {
        public string? Token { get; set; } = null!;
        public bool Success { get; set; } = true;
    }
}