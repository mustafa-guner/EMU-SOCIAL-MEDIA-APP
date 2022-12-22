using System.ComponentModel.DataAnnotations;
using EMUSocialAPI.Models.Enums.User;

namespace EMUSocialAPI.Models.DTOs.Auth
{
    public class RegisterRequestDTO
    {
        [Required]
        public string Firstname { get; set; } = null!;
        [Required]
        public string Lastname { get; set; } = null!;
        [Required]
        public string Email { get; set; } = null!;
        // public byte[] ProfileImage { get; set; } = null!;
        [Required]
        public string ProfileImage { get; set; } = null!;
        [Required]
        public string Password { get; set; } = null!;
        [Required]
        public DateTime Dob { get; set; }
        [Required]
        public GenderType Gender { get; set; }
        [Required]
        public UserRole Role { get; set; }
        [Required]
        public string Country { get; set; } = null!;
        [Required]
        public UserType UserType { get; set; }
        [Required]
        public DateTime RegisteredAt { get; set; } = DateTime.Now;
    }
}