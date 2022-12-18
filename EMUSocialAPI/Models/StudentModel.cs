using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EMUSocialAPI.Models
{
    public class StudentModel : UserModel
    {
        public bool IsGraduated { get; set; } = false;
        public bool IsAssistant { get; set; } = false;
        public DateTime GradationDate { get; set; }
    }
}