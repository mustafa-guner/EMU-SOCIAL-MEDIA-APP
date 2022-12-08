
using EMUSocialAPI.EMUSocial.Infrastructure;
using EMUSocialAPI.EMUSocial.Application;

var builder = WebApplication.CreateBuilder(args);

// Add services to the container.
builder.Services.AddApplication().AddInfrastructure(builder.Configuration);
builder.Services.AddControllers();
// builder.Services.AddControllers(options => options.Filters.Add<ErrorHandlingFilterAttribute>()); //errorHandler filters (kinda middleware) for controllers. It catches not resolved errors.
// Learn more about configuring Swagger/OpenAPI at https://aka.ms/aspnetcore/swashbuckle
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();

var app = builder.Build();

// Configure the HTTP request pipeline.
if (app.Environment.IsDevelopment())
{
    app.UseSwagger();
    app.UseSwaggerUI();
}

//This is one of the approaches for error handling
//app.UseMiddleware<ErrorHandlingMiddleware>();

app.UseExceptionHandler("/error");

app.UseHttpsRedirection();

app.UseAuthorization();

app.MapControllers();

app.Run();
