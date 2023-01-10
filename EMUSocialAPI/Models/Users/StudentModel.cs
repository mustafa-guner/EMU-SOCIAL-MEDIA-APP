using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using EMUSocialAPI.Models.Enums.User;
namespace EMUSocialAPI.Models.Users
{


    public class StudentModel
    {
        [Key]
        public int StudentId { get; set; }
        public int UserId { get; set; }
        public int StudentNumber { get; set; }
        public bool IsGraduated { get; set; } = false;
        public bool IsAssistant { get; set; } = false;

        [Column(TypeName = "nvarchar(20)")]
        public DegreeType DegreeType { get; set; }

        [DataType(DataType.Date)]

        public DateTime GraduationDate { get; set; }
    }
}