using System.ComponentModel.DataAnnotations;

namespace EMUSocialAPI.Models.Users
{
    public class StaffModel
    {
        [Key]
        public int StaffId { get; set; }

        public bool IsRetired { get; set; } = false;
        [Required]
        [DataType(DataType.Date)]

        public DateTime RetirementDate { get; set; }
        [Required]
        public int StaffTypeID { get; set; }


        public int UserId { get; set; }
        public UserModel User { get; set; } = null!;

    }
}
