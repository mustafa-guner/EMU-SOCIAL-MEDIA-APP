using AutoMapper;
using EMUSocialAPI.Authorization;
using EMUSocialAPI.Data;
using EMUSocialAPI.Helpers;
using EMUSocialAPI.Models;
using EMUSocialAPI.Models.DTOs.Auth;
using EMUSocialAPI.Models.Enums.User;
using EMUSocialAPI.Models.Users;
using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.Options;
using Bcrypt = BCrypt.Net.BCrypt;


namespace EMUSocialAPI.Services.Auth
{
    public class AuthService : IAuthService
    {

        private readonly IMapper _mapper;
        private readonly DataContext _dbContext;
        private IJwtUtils _jwtUtils;
        private readonly AppSettings _appSettings;
        public AuthService(IMapper mapper, DataContext dbContext, IJwtUtils jwtUtils, IOptions<AppSettings> appSettings)
        {
            _mapper = mapper;
            _dbContext = dbContext;
            _jwtUtils = jwtUtils;
            _appSettings = appSettings.Value;
        }

        public async Task<RegisterResponse> Register(RegisterRequestDTO registerCredentials)
        {
            var registerResponse = new RegisterResponse();
            //Check if the user is already exists
            if (_dbContext.Users.Any(u => u.Email == registerCredentials.Email))
                throw new AppException("Email '" + registerCredentials.Email + "' is already taken.");

            var user = _mapper.Map<UserModel>(registerCredentials);

            //Hash password before add it to Databse
            user.Password = Bcrypt.HashPassword(registerCredentials.Password);
            user.UserTypeID = registerCredentials.UserTypeID;


            //Add To Database
            await _dbContext.Users.AddAsync(user);

            //Creating user type model
            await CreateUserByType(user.Id, registerCredentials);

            //Save Database
            await _dbContext.SaveChangesAsync();

            registerResponse.Message = "Congrulations! Your account has been added to queue for confirmation process.";
            return registerResponse;
        }

        public async Task<LoginResponse> Login(LoginRequestDTO loginCredentials)
        {
            var loginResponse = new LoginResponse();
            var user = await _dbContext.Users.FirstOrDefaultAsync(u => u.Email == loginCredentials.Email);
            //check if user already registered before or not
            if (user is null) throw new Exception("User account with the email is not found.");
            //Check if passwords are matched or not. (Compare it with the hashed one in database)
            if (!Bcrypt.Verify(loginCredentials.Password, user.Password)) throw new Exception("Password is not correct.");
            //Check user's account if it is active or not.
            if (user.IsActive is not true) throw new Exception("Your account is not active. Please get in touch with admin.");

            loginResponse.Token = _jwtUtils.GenerateJwtToken(user);

            return loginResponse;

        }

        //Helpers for creating models

        public async Task CreateUserByType(int userId, RegisterRequestDTO registerCredentials)
        {
            int typeID = registerCredentials.UserTypeID;

            switch (typeID)
            {
                case (int)_UserType.Student:
                    await CreateStudentModel(userId, registerCredentials);
                    break;


                case (int)_UserType.Staff:
                    await CreateStaffModel(userId, registerCredentials);
                    break;

                default:
                    throw new ApplicationException("Error occured while registering your account. Please select valid user type and try again.");
            }

        }

        public async Task CreateStudentModel(int userId, RegisterRequestDTO registerCredentials)
        {
            StudentModel newStudent = new StudentModel()
            {
                UserId = userId,
                StudentNumber = registerCredentials.StudentNumber,
                GraduationDate = registerCredentials.GraduationDate,
                IsAssistant = registerCredentials.IsAssistant,
                IsGraduated = registerCredentials.IsGraduated,
                DegreeType = registerCredentials.DegreeType
            };
            if (_dbContext.Students.Any(s => s.StudentNumber == newStudent.StudentNumber)) throw new Exception("Student Number should be unique.");
            await _dbContext.Students.AddAsync(newStudent);

        }

        public async Task CreateStaffModel(int userId, RegisterRequestDTO registerCredentials)
        {
            StaffModel newStaff = new StaffModel()
            {
                UserId = userId,
                RetirementDate = registerCredentials.RetirementDate,
                IsRetired = registerCredentials.IsRetired,
                StaffTypeID = registerCredentials.StaffTypeID
            };

            await _dbContext.Staffs.AddAsync(newStaff);

        }
    }
}