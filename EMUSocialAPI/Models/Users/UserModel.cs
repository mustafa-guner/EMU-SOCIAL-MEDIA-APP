using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using EMUSocialAPI.Models.Enums.User;
using EMUSocialAPI.Models.Users;

namespace EMUSocialAPI.Models
{
    public class UserModel
    {
        [Key]
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
        [Column(TypeName = "nvarchar(20)")] // to save role type as string in sql
        public UserRole Role { get; set; } = UserRole.User;
        public string Country { get; set; } = null!;
        public DateTime ResetPasswordTokenExpiry { get; set; }
        public string ResetPasswordToken { get; set; } = string.Empty;
        public bool IsActive { get; set; } = false;
        public DateTime RegisteredAt { get; set; } = DateTime.Now;
        public DateTime EditedAt { get; set; }


        //Programming Logic for relationship

        public int UserTypeID { get; set; }


        public StudentModel? StudentModel { get; set; }
        public StaffModel? StaffModel { get; set; }

    }
}