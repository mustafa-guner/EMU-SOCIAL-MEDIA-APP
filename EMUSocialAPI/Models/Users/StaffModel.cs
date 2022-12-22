namespace EMUSocialAPI.Models.Users
{
    public class StaffModel : UserModel
    {
        public bool IsRetired { get; set; } = false;
        public DateTime RetirementDate { get; set; }
    }
}