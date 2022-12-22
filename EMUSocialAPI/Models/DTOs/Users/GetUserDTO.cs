using EMUSocialAPI.Models.Enums.User;

namespace EMUSocialAPI.Models.DTOs.Users
{
    public class GetUserDTO
    {
        public int Id { get; set; }
        public string Firstname { get; set; } = null!;
        public string Lastname { get; set; } = null!;
        public string Email { get; set; } = null!;
        // public byte[] ProfileImage { get; set; } = null!;
        public string ProfileImage { get; set; } = null!;
        public string Password { get; set; } = null!;
        public DateTime Dob { get; set; }
        public GenderType Gender { get; set; }
        public UserRole Role { get; set; }
        public string Country { get; set; } = null!;
        public DateTime ResetPasswordTokenExpiry { get; set; }
        public string ResetPasswordToken { get; set; } = string.Empty;
        public UserType UserType { get; set; }
        public bool IsActive { get; set; } = false;
        public DateTime RegisteredAt { get; set; } = DateTime.Now;
        public DateTime ActivatedAt { get; set; }
    }
}