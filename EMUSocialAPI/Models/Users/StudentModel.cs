using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using EMUSocialAPI.Models.Enums.User;
namespace EMUSocialAPI.Models.Users
{


    public class StudentModel
    {
        [Key]
        public int StudentId { get; set; }

        [Required]
        public int StudentNumber { get; set; }
        [Required]
        public bool IsGraduated { get; set; } = false;
        [Required]
        public bool IsAssistant { get; set; } = false;
        [Required]

        [Column(TypeName = "nvarchar(20)")]
        public DegreeType DegreeType { get; set; }

        [Required]
        [DataType(DataType.Date)]

        public DateTime GraduationDate { get; set; }


        [Required]
        public int UserId { get; set; }
        public UserModel User { get; set; } = null!;
    }
}