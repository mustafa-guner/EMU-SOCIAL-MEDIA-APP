using System.ComponentModel.DataAnnotations;
using EMUSocialAPI.Models.Enums.User;

namespace EMUSocialAPI.Models.DTOs.Users
{
    public class StudentDTO
    {
        //Student Model
        [Required]
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
    }
}