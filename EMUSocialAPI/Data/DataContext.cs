using EMUSocialAPI.Models;
using Microsoft.EntityFrameworkCore;

namespace EMUSocialAPI.Data
{
    public class DataContext : DbContext
    {
        public DataContext(DbContextOptions<DataContext> options) : base(options)
        {

        }
        public DbSet<UserModel> Users => Set<UserModel>();
    }
}