namespace EMUSocialAPI.Data
{
    public class AppDBInitializer
    {
        public static void Seed(IApplicationBuilder applicationBuilder)
        {
            using (var serviceScope = applicationBuilder.ApplicationServices.CreateScope())
            {
                var context = serviceScope.ServiceProvider.GetService<DataContext>();
                //Make sure that database is created
                if (context != null)
                {
                    context.Database.EnsureCreated();
                    // if (!context.UserTypes.Any())
                    // {
                    //     context.UserTypes.AddRange(new List<UserType>{

                    //     new UserType(){
                    //         UserTypeID = 1,
                    //         UserTypeTitle = "Staff"
                    //     },

                    //       new UserType(){
                    //         UserTypeID = 2,
                    //         UserTypeTitle = "Student"
                    //     },

                    // });

                    //     context.SaveChanges();
                    // }

                    // if (!context.StaffTypes.Any())
                    // {
                    //     context.StaffTypes.AddRange(new List<StaffType>{

                    //     new StaffType(){
                    //         StaffTypeID = 1,
                    //         StaffTypeTitle = "Instructor"
                    //     },

                    //       new StaffType(){
                    //         StaffTypeID = 2,
                    //         StaffTypeTitle = "Servant"
                    //     }

                    // });

                    //     context.SaveChanges();
                    // }

                    // if (!context.Users.Any())
                    // {
                    //     context.Users.AddRange(new List<UserModel>{

                    //     new UserModel(){
                    //         Firstname = "John",
                    //         Lastname = "Doe",
                    //         Email = "joe@outlook.com",
                    //         ProfileImage = "profile.jpeg",
                    //         Password=   "asdf1234",
                    //         Dob=DateTime.Now,
                    //         Gender= Models.Enums.User.GenderType.Male,
                    //         Country = "Cyprus",
                    //         UserTypeID = 1

                    //     },
                    //     new UserModel(){
                    //         Firstname = "Jane",
                    //         Lastname = "Doe",
                    //         Email = "jane@outlook.com",
                    //         ProfileImage = "profile.jpeg",
                    //         Password=   "asdf1234",
                    //         Dob=DateTime.Now,
                    //         Gender= Models.Enums.User.GenderType.Female,
                    //         Country = "Russia",
                    //         UserTypeID = 1

                    //     },

                    //     new UserModel(){
                    //         Firstname = "Jade",
                    //         Lastname = "Doe",
                    //         Email = "jade@outlook.com",
                    //         ProfileImage = "profile.jpeg",
                    //         Password=   "asdf1234",
                    //         Dob= DateTime.Now,
                    //         Gender= Models.Enums.User.GenderType.Male,
                    //         Country = "Usa",
                    //         UserTypeID = 1

                    //     },

                    //         new UserModel(){
                    //         Firstname = "Daniel",
                    //         Lastname = "Doe",
                    //         Email = "daniel@outlook.com",
                    //         ProfileImage = "profile.jpeg",
                    //         Password=   "asdf1234",
                    //         Dob= DateTime.Now,
                    //         Gender= Models.Enums.User.GenderType.Male,
                    //         Country = "Egypt",
                    //         UserTypeID = 1

                    //     },

                    //         new UserModel(){
                    //         Firstname = "Jamal",
                    //         Lastname = "Doe",
                    //         Email = "jamal@outlook.com",
                    //         ProfileImage = "profile.jpeg",
                    //         Password=   "asdf1234",
                    //         Dob= DateTime.Now,
                    //         Gender= Models.Enums.User.GenderType.Male,
                    //         Country = "Africa",
                    //         UserTypeID = 2

                    //     },

                    //          new UserModel(){
                    //         Firstname = "Pamela",
                    //         Lastname = "Doe",
                    //         Email = "pam@outlook.com",
                    //         ProfileImage = "profile.jpeg",
                    //         Password=   "asdf1234",
                    //         Dob= DateTime.Now,
                    //         Gender= Models.Enums.User.GenderType.Male,
                    //         Country = "Usa",
                    //         UserTypeID = 2

                    //     },


                    // });

                    //     context.SaveChanges();
                    // }


                    // if (!context.Staffs.Any())
                    // {
                    //     context.Staffs.AddRange(new List<StaffModel>{

                    //     new StaffModel(){
                    //         UserId = 1,
                    //         RetirementDate = DateTime.Now,
                    //         IsRetired = false,
                    //         StaffTypeID = 1,

                    //     },

                    //       new StaffModel(){
                    //         UserId = 2,
                    //         RetirementDate = DateTime.Now,
                    //         IsRetired = true,
                    //         StaffTypeID =2,
                    //     },

                    //         new StaffModel(){
                    //          UserId = 3,
                    //         RetirementDate = DateTime.Now,
                    //         IsRetired = false,
                    //         StaffTypeID = 1,
                    //     },

                    //         new StaffModel(){
                    //         UserId = 4,
                    //         RetirementDate = DateTime.Now,
                    //         IsRetired = true,
                    //         StaffTypeID =2,
                    //     },

                    // });

                    //     context.SaveChanges();
                    // }

                    // if (!context.Students.Any())
                    // {
                    //     context.Students.AddRange(new List<StudentModel>{

                    //     new StudentModel(){
                    //         UserId = 5,
                    //         GraduationDate = DateTime.Now,
                    //         IsGraduated = false,
                    //         DegreeType = Models.Enums.User.DegreeType.Graduate,
                    //         StudentNumber = 17330118
                    //     },

                    //       new StudentModel(){
                    //          UserId = 6,
                    //         GraduationDate =DateTime.Now,
                    //         IsGraduated = true,
                    //         DegreeType = Models.Enums.User.DegreeType.Graduate,
                    //         StudentNumber = 17330267
                    //      },

                    // });

                    //     context.SaveChanges();
                    // }


                }

            }
        }
    }
}