using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EMUSocialAPI.Models
{
    public class StaffModel : UserModel
    {
        public bool IsRetired { get; set; } = false;
        public DateTime RetirementDate { get; set; }
    }
}