using EMUSocialAPI.Models.Enums.User;

namespace EMUSocialAPI.DTOs.User
{
    public class RegisterUserDTO
    {
        public string Firstname { get; set; } = null!;
        public string Lastname { get; set; } = null!;
        public string Email { get; set; } = null!;
        public string ProfileImage { get; set; } = null!;
        public string Password { get; set; } = null!;
        public DateTime Dob { get; set; }
        public GenderType Gender { get; set; }
        public UserRole Role { get; set; } = UserRole.User;
        public string Country { get; set; } = null!;
        public UserType UserType { get; set; }
        public bool IsActive { get; set; } = false;
        public DateTime RegisteredAt { get; set; } = DateTime.Now;

    }
}