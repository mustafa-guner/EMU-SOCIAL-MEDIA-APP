using AutoMapper;
using EMUSocialAPI.Data;
using EMUSocialAPI.Models;
using EMUSocialAPI.Models.DTOs.Users;
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

        public async Task<GetUserDTO> GetUserByID(int Id)
        {
            var user = await _dbContext.Users.FindAsync(Id);
            if (user is null) throw new KeyNotFoundException("User not found");
            var mappedUser = _mapper.Map<GetUserDTO>(user);
            return mappedUser;
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