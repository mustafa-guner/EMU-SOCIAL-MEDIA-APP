using System.ComponentModel.DataAnnotations;
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
        public DateTime EditedAt { get; set; } = DateTime.Now;

        public int UserTypeID { get; set; }

        //Student Model
        public int StudentNumber { get; set; }

        [Required]
        [DataType(DataType.Date)]
        [DisplayFormat(DataFormatString = "{0:yyyy-MM-dd}", ApplyFormatInEditMode = true)]
        public DateTime GraduationDate { get; set; }
        [Required]
        public bool IsAssistant { get; set; }
        [Required]
        public bool IsGraduated { get; set; }
        [Required]
        public DegreeType DegreeType { get; set; }


        //Staff Model
        [Required]
        public int StaffTypeID { get; set; }
        [DataType(DataType.Date)]
        [Required]
        public DateTime RetirementDate { get; set; }
        [Required]
        public bool IsRetired { get; set; }
    }
}