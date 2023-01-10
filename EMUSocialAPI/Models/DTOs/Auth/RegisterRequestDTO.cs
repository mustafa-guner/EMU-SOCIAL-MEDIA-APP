using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
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
        [Column(TypeName = "nvarchar(20)")]
        public GenderType Gender { get; set; }
        [Required]
        [Column(TypeName = "nvarchar(20)")]
        public UserRole Role { get; set; } = UserRole.User;
        [Required]
        public string Country { get; set; } = null!;
        [Required]
        public DateTime RegisteredAt { get; set; } = DateTime.Now;

        [Required]
        public int UserTypeID { get; set; }

        //Student Model
        public int StudentNumber { get; set; }

        [DataType(DataType.Date)]
        [DisplayFormat(DataFormatString = "{0:yyyy-MM-dd}", ApplyFormatInEditMode = true)]
        public DateTime GraduationDate { get; set; }
        public bool IsAssistant { get; set; }
        public bool IsGraduated { get; set; }
        public DegreeType DegreeType { get; set; }


        //Staff Model

        public int StaffTypeID { get; set; }
        [DataType(DataType.Date)]
        public DateTime RetirementDate { get; set; }
        public bool IsRetired { get; set; }


    }
}