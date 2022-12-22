using System.ComponentModel.DataAnnotations;

namespace EMUSocialAPI.Models.DTOs.Auth
{
    public class LoginRequestDTO
    {
        [Required]
        public string? Email { get; set; }
        [Required]
        public string? Password { get; set; }
    }
}