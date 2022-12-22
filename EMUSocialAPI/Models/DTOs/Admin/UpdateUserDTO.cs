using EMUSocialAPI.Models.Enums.User;

namespace EMUSocialAPI.Models.DTOs.Admin
{
    public class UpdateUserDTO
    {
        public string Firstname { get; set; } = string.Empty;
        public string Lastname { get; set; } = string.Empty;
        public string Email { get; set; } = string.Empty;
        public string ProfileImage { get; set; } = string.Empty;
        public string Password { get; set; } = string.Empty;
        public DateTime Dob { get; set; }
        public GenderType Gender { get; set; }
        public UserRole Role { get; set; } = UserRole.User;
        public string Country { get; set; } = string.Empty;
        public UserType UserType { get; set; }
        public bool IsActive { get; set; } = false;
        public DateTime RegisteredAt { get; set; } = DateTime.Now;
        public DateTime ActivatedAt { get; set; }
    }
}