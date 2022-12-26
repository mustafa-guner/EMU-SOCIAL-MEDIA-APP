using System.Text.Json.Serialization;
using EMUSocialAPI.Authorization;
using EMUSocialAPI.Data;
using EMUSocialAPI.Helpers;
using EMUSocialAPI.Services.Admin;
using EMUSocialAPI.Services.Auth;
using EMUSocialAPI.Services.User;
using Microsoft.EntityFrameworkCore;


var builder = WebApplication.CreateBuilder(args);


// Add services to the container.
var mySqlConnectionString = builder.Configuration.GetConnectionString("TestDBConnection");
//Database connection
builder.Services.AddDbContext<DataContext>(dbContextOptions => dbContextOptions.UseMySql(mySqlConnectionString,
ServerVersion.AutoDetect(mySqlConnectionString), options => options.EnableRetryOnFailure(
                    maxRetryCount: 5,
                    maxRetryDelay: System.TimeSpan.FromSeconds(30),
                    errorNumbersToAdd: null)
                ));
// configure strongly typed settings object
builder.Services.Configure<AppSettings>(builder.Configuration.GetSection("AppSettings"));



builder.Services.AddControllers().AddJsonOptions(x =>
    {
        // serialize enums as strings in api responses (e.g. Role)
        x.JsonSerializerOptions.Converters.Add(new JsonStringEnumConverter());
    });
// Learn more about configuring Swagger/OpenAPI at https://aka.ms/aspnetcore/swashbuckle
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();
builder.Services.AddAutoMapper(typeof(Program).Assembly);
builder.Services.AddHttpContextAccessor();

//Dependency Injection
builder.Services.AddScoped<IAuthService, AuthService>();
builder.Services.AddScoped<IUserService, UserService>();
builder.Services.AddScoped<IAdminService, AdminService>();
builder.Services.AddScoped<IJwtUtils, JwtUtils>();



var app = builder.Build();

app.UseCors(x => x
     .AllowAnyOrigin()
     .AllowAnyMethod()
     .AllowAnyHeader());

app.UseSwaggerUI();
app.UseSwagger();


// global error handler
app.UseMiddleware<ErrorHandlerMiddleware>();

// custom jwt auth middleware
app.UseMiddleware<JwtMiddleware>();

app.UseAuthentication();

app.UseAuthorization();

app.UseHttpsRedirection();

app.UseAuthorization();

app.MapControllers();


//Seeding Datbase in first place (mocking data up)
AppDBInitializer.Seed(app);

app.Run();
