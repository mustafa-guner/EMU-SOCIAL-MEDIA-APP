namespace EMUSocialAPI.EMUSocial.Domain;

public class User
{
    public Guid id { get; set; } = Guid.NewGuid();
    public string firstname { get; set; } = null!;
    public string lastname { get; set; } = null!;
    public string email { get; set; } = null!;
    public string countryID { get; set; } = null!;
    public string gender { get; set; } = null!;
    public string dob { get; set; } = null!;
    public string profileImage { get; set; } = null!;
    public string password { get; set; } = null!;
    public string role { get; set; } = null!;
    public string? resetPasswordToken { get; set; }
    public string? resetPasswordExpiry { get; set; }
    public string isActive { get; set; } = "notActive";
}