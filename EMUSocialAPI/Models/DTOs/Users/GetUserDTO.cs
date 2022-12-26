using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using EMUSocialAPI.Models.Enums.User;
using EMUSocialAPI.Models.Users;

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
        [DataType(DataType.Date)]
        public DateTime Dob { get; set; }
        [Column(TypeName = "nvarchar(20)")]
        public GenderType Gender { get; set; }
        [Column(TypeName = "nvarchar(20)")]
        public UserRole Role { get; set; }
        public string Country { get; set; } = null!;
        public DateTime ResetPasswordTokenExpiry { get; set; }
        public string ResetPasswordToken { get; set; } = string.Empty;
        [Column(TypeName = "nvarchar(20)")]
        // public UserType UserType { get; set; }
        public bool IsActive { get; set; } = false;
        public DateTime RegisteredAt { get; set; } = DateTime.Now;
        public DateTime ActivatedAt { get; set; }

        //Programming Logic for relationship

        public int UserTypeID { get; set; }
        public UserType? UserType { get; set; }
    }
}