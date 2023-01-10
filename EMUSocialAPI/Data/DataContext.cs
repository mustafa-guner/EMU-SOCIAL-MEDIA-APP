using EMUSocialAPI.Models;
using EMUSocialAPI.Models.Users;
using Microsoft.EntityFrameworkCore;

namespace EMUSocialAPI.Data
{
    public class DataContext : DbContext
    {
        public DataContext(DbContextOptions<DataContext> options) : base(options)
        {

        }


        protected override void OnModelCreating(ModelBuilder modelbuilder)
        {
            /*
                @DESC: 
                A user may have many archive records but one record always belongs to one user
                Relationship -> One To Many
             */
            // modelbuilder.Entity<RecordsModel>().HasOne(record => record.User).WithMany(user => user.RecordsModel);
            modelbuilder.Entity<UserModel>().HasOne(u => u.StudentModel).WithOne(s => s.User).HasForeignKey<StudentModel>(s => s.UserId);
            modelbuilder.Entity<UserModel>().HasOne(u => u.StaffModel).WithOne(s => s.User).HasForeignKey<StaffModel>(s => s.UserId);
            base.OnModelCreating(modelbuilder);
        }
        public DbSet<UserType> UserTypes => Set<UserType>();
        public DbSet<UserModel> Users => Set<UserModel>();
        public DbSet<StaffType> StaffTypes => Set<StaffType>();
        public DbSet<StaffModel> Staffs => Set<StaffModel>();
        public DbSet<StudentModel> Students => Set<StudentModel>();

    }
}