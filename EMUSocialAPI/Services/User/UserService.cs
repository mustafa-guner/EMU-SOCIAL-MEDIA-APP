using AutoMapper;
using EMUSocialAPI.Data;
using EMUSocialAPI.DTOs.User;
using EMUSocialAPI.Models;
using Microsoft.EntityFrameworkCore;

namespace EMUSocialAPI.Services.User
{
    public class UserService : IUserService
    {
        private readonly DataContext _dbContext;
        private readonly IMapper _mapper;


        public UserService(IMapper mapper, DataContext dbContext)
        {
            _mapper = mapper;
            _dbContext = dbContext;

        }

        public async Task<ServiceResponse<GetUserDTO>> GetUserByID(int Id)
        {
            var serviceResponse = new ServiceResponse<GetUserDTO>();
            try
            {
                var user = await _dbContext.Users.FindAsync(Id);
                if (user is null) throw new Exception("User is not found with the given ID.");

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
        public async Task<ServiceResponse<List<GetUserDTO>>> GetAllUsers()
        {
            var serviceResponse = new ServiceResponse<List<GetUserDTO>>();
            var users = await _dbContext.Users.ToListAsync();
            serviceResponse.Data = users.Select(u => _mapper.Map<GetUserDTO>(u)).ToList();
            return serviceResponse;
        }



    }
}