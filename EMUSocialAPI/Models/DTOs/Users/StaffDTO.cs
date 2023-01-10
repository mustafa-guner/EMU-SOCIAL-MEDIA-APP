using System.ComponentModel.DataAnnotations;

namespace EMUSocialAPI.Models.DTOs.Users
{
    public class StaffDTO
    {


        //Staff Model
        [Required]
        public int StaffTypeID { get; set; }
        [Required]
        [DataType(DataType.Date)]
        public DateTime RetirementDate { get; set; }
        [Required]
        public bool IsRetired { get; set; }
    }
}