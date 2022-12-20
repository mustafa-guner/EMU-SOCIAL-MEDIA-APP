namespace EMUSocialAPI.Models
{
    public class LoginResponse
    {
        public string Token { get; set; } = null!;
        public bool Success { get; set; } = true;
        public string Message { get; set; } = string.Empty;

    }
}