using AutoMapper;
using EMUSocialAPI.Data;
using EMUSocialAPI.Models;
using EMUSocialAPI.Models.DTOs.Admin;
using EMUSocialAPI.Models.DTOs.Users;
using Bcrypt = BCrypt.Net.BCrypt;

namespace EMUSocialAPI.Services.Admin
{
    public class AdminService : IAdminService
    {
        private IMapper _mapper;
        private readonly DataContext _dbContext;
        public AdminService(IMapper mapper, DataContext dbContext)
        {
            _mapper = mapper;
            _dbContext = dbContext;
        }
        public async Task<ServiceResponse<GetUserDTO>> ToggleActiveUserAccount(int id)
        {
            var serviceResponse = new ServiceResponse<GetUserDTO>();
            try
            {
                var user = await _dbContext.Users.FindAsync(id);
                if (user is null) throw new Exception("User is not found to update active status.");
                user.IsActive = !user.IsActive;
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
                if (user is null) throw new Exception("User is not found to update.");

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
                    if (existedEmail && user.Email == updateUser.Email) throw new Exception("Email should be different from the previous one.");
                    else if (existedEmail) throw new Exception("Email is already taken.");
                    else user.Email = updateUser.Email;
                }

                // hash password if it was entered
                if (!string.IsNullOrEmpty(updateUser.Password))
                    user.Password = Bcrypt.HashPassword(updateUser.Password);

                user.Dob = updateUser.Dob;
                user.Gender = updateUser.Gender;
                user.UserTypeID = updateUser.UserTypeID;


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