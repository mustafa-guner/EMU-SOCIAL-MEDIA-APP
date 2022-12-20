using EMUSocialAPI.Models.Enums.User;
namespace EMUSocialAPI.Models
{


    public class StudentModel : UserModel
    {
        public int StudentNumber { get; set; }
        public bool IsGraduated { get; set; } = false;
        public bool IsAssistant { get; set; } = false;
        public DegreeType DegreeType { get; set; }
        public DateTime GraduationDate { get; set; }
    }
}