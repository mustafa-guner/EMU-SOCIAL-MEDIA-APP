using AutoMapper;
using EMUSocialAPI.Data;
using EMUSocialAPI.Models;
using EMUSocialAPI.Models.DTOs.Admin;
using EMUSocialAPI.Models.DTOs.Users;
using EMUSocialAPI.Models.Enums.User;
using EMUSocialAPI.Models.Users;
using Microsoft.EntityFrameworkCore;
using Bcrypt = BCrypt.Net.BCrypt;

namespace EMUSocialAPI.Services.Admin
{
    public class AdminService : IAdminService
    {
        private IMapper _mapper;
        private readonly DataContext _dbContext;
        private readonly IHttpContextAccessor _httpContextAccessor;
        public AdminService(IMapper mapper, DataContext dbContext, IHttpContextAccessor httpContextAccessor)
        {
            _mapper = mapper;
            _dbContext = dbContext;
            _httpContextAccessor = httpContextAccessor;
        }
        public async Task<ServiceResponse<GetUserDTO>> ToggleActiveUserAccount(int id)
        {
            var serviceResponse = new ServiceResponse<GetUserDTO>();
            try
            {
                var user = await _dbContext.Users.FindAsync(id);
                if (user is null) throw new Exception("User is not found to update active status.");
                user.IsActive = !user.IsActive;
                user.EditedAt = DateTime.Now;
                _dbContext.Update(user);
                await _dbContext.SaveChangesAsync();
                serviceResponse.Data = _mapper.Map<GetUserDTO>(user);
                return serviceResponse;
            }
            catch (Exception e)
            {
                serviceResponse.Success = false;
                serviceResponse.Message = e.Message;
                return serviceResponse;
            }
        }

        public async Task<ServiceResponse<GetUserDTO>> RemoveUserAccount(int id)
        {
            var serviceResponse = new ServiceResponse<GetUserDTO>();
            try
            {

                var user = await _dbContext.Users.FindAsync(id);
                if (user is null) throw new Exception("User is not found to remove.");

                if (user.UserTypeID == 2)
                {
                    var student = await _dbContext.Students.FirstOrDefaultAsync(student => student.UserId == id);
                    if (student is not null)
                        _dbContext.Students.Remove(student);
                }
                else if (user.UserTypeID == 1)
                {

                    var staff = await _dbContext.Staffs.FirstOrDefaultAsync(staff => staff.UserId == id);
                    if (staff is not null)
                        _dbContext.Staffs.Remove(staff);
                }



                var currentUser = (GetUserDTO)_httpContextAccessor.HttpContext.Items["User"]!;
                if (currentUser.Id == id) throw new ApplicationException("You are not allowed to remove yourself!");


                serviceResponse.Data = _mapper.Map<GetUserDTO>(user);
                _dbContext.Users.Remove(user);
                await _dbContext.SaveChangesAsync();
                serviceResponse.Message = "User is removed.";
                return serviceResponse;
            }
            catch (Exception e)
            {
                serviceResponse.Success = false;
                serviceResponse.Message = e.Message;
                return serviceResponse;
            }
        }

        public async Task<ServiceResponse<GetUserDTO>> UpdateUserByID(int id, UpdateUserDTO updateUser)
        {
            var serviceResponse = new ServiceResponse<GetUserDTO>();
            try
            {
                var user = await _dbContext.Users.FindAsync(id);
                if (user is null) throw new ApplicationException("User is not found to update.");

                _mapper.Map<UserModel>(updateUser);


                //Update possible fields.
                if (!string.IsNullOrEmpty(updateUser.Firstname))
                    user.Firstname = updateUser.Firstname;

                if (!string.IsNullOrEmpty(updateUser.Lastname))
                    user.Lastname = updateUser.Lastname;

                if (!string.IsNullOrEmpty(updateUser.Country))
                    user.Country = updateUser.Country;

                if (!string.IsNullOrEmpty(updateUser.Email))
                {
                    var existedEmail = _dbContext.Users.Any(x => x.Email == updateUser.Email);
                    if (existedEmail && user.Email == updateUser.Email) throw new ApplicationException("Email should be different from the previous one.");
                    else if (existedEmail) throw new ApplicationException("Email is already taken.");
                    else user.Email = updateUser.Email;
                }

                // hash password if it was entered
                if (!string.IsNullOrEmpty(updateUser.Password))
                    user.Password = Bcrypt.HashPassword(updateUser.Password);

                user.Dob = updateUser.Dob;
                user.Gender = updateUser.Gender;
                user.EditedAt = DateTime.Now;
                user.UserTypeID = updateUser.UserTypeID;



                if (user.UserTypeID != 2 && updateUser.UserTypeID == 2)
                {
                    //Remove staff record and create student
                    var staffRecord = await _dbContext.Staffs.FirstOrDefaultAsync(staff => staff.UserId == user.Id);
                    if (staffRecord is null) throw new ApplicationException("Staff record is not found. It could be removed.");
                    _dbContext.Staffs.Remove(staffRecord);




                    if (_dbContext.Students.Any(std => std.StudentNumber == updateUser.StudentNumber)) throw new ApplicationException("Student Number should be unique.");
                    StudentModel student = new StudentModel()
                    {
                        UserId = user.Id,
                        StudentNumber = (int)updateUser.StudentNumber,
                        GraduationDate = updateUser.GraduationDate,
                        IsAssistant = (bool)updateUser.IsAssistant,
                        IsGraduated = (bool)updateUser.IsGraduated,
                        DegreeType = (DegreeType)updateUser.DegreeType
                    };
                    var mappedStudent = _mapper.Map<StudentDTO>(student);
                    var mappedUser = _mapper.Map<StudentModel>(mappedStudent);
                    await _dbContext.Students.AddAsync(mappedUser);


                }


                var updatedUser = _dbContext.Users.Update(user);
                var updatedMappedUser = _mapper.Map<GetUserDTO>(user);

                await _dbContext.SaveChangesAsync();

                serviceResponse.Data = updatedMappedUser;
                serviceResponse.Message = "User is updated.";
                return serviceResponse;

            }
            catch (Exception e)
            {
                serviceResponse.Success = false;
                serviceResponse.Message = e.Message;
                return serviceResponse;
            }
        }


    }
}