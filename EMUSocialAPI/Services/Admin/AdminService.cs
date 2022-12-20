using AutoMapper;
using EMUSocialAPI.Data;
using EMUSocialAPI.DTOs.Admin;
using EMUSocialAPI.DTOs.User;
using EMUSocialAPI.Models;
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
                user.Firstname = updateUser.Firstname;
                user.Lastname = updateUser.Lastname;
                user.Email = updateUser.Email;
                user.Password = Bcrypt.HashPassword(updateUser.Password);
                user.Dob = updateUser.Dob;
                user.Gender = updateUser.Gender;
                user.Role = updateUser.Role;
                user.Country = updateUser.Country;
                user.UserType = updateUser.UserType;



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