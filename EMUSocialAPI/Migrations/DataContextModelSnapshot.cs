﻿// <auto-generated />
using System;
using EMUSocialAPI.Data;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Infrastructure;
using Microsoft.EntityFrameworkCore.Storage.ValueConversion;

#nullable disable

namespace EMUSocialAPI.Migrations
{
    [DbContext(typeof(DataContext))]
    partial class DataContextModelSnapshot : ModelSnapshot
    {
        protected override void BuildModel(ModelBuilder modelBuilder)
        {
#pragma warning disable 612, 618
            modelBuilder
                .HasAnnotation("ProductVersion", "6.0.12")
                .HasAnnotation("Relational:MaxIdentifierLength", 64);

            modelBuilder.Entity("EMUSocialAPI.Models.UserModel", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("int");

                    b.Property<DateTime>("ActivatedAt")
                        .HasColumnType("datetime(6)");

                    b.Property<string>("Country")
                        .IsRequired()
                        .HasColumnType("longtext");

                    b.Property<DateTime>("Dob")
                        .HasColumnType("datetime(6)");

                    b.Property<string>("Email")
                        .IsRequired()
                        .HasColumnType("longtext");

                    b.Property<string>("Firstname")
                        .IsRequired()
                        .HasColumnType("longtext");

                    b.Property<string>("Gender")
                        .IsRequired()
                        .HasColumnType("nvarchar(20)");

                    b.Property<bool>("IsActive")
                        .HasColumnType("tinyint(1)");

                    b.Property<string>("Lastname")
                        .IsRequired()
                        .HasColumnType("longtext");

                    b.Property<string>("Password")
                        .IsRequired()
                        .HasColumnType("longtext");

                    b.Property<string>("ProfileImage")
                        .IsRequired()
                        .HasColumnType("longtext");

                    b.Property<DateTime>("RegisteredAt")
                        .HasColumnType("datetime(6)");

                    b.Property<string>("ResetPasswordToken")
                        .IsRequired()
                        .HasColumnType("longtext");

                    b.Property<DateTime>("ResetPasswordTokenExpiry")
                        .HasColumnType("datetime(6)");

                    b.Property<string>("Role")
                        .IsRequired()
                        .HasColumnType("nvarchar(20)");

                    b.Property<int>("UserTypeID")
                        .HasColumnType("int");

                    b.HasKey("Id");

                    b.HasIndex("UserTypeID");

                    b.ToTable("Users");
                });

            modelBuilder.Entity("EMUSocialAPI.Models.Users.StaffModel", b =>
                {
                    b.Property<int>("StaffId")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("int");

                    b.Property<bool>("IsRetired")
                        .HasColumnType("tinyint(1)");

                    b.Property<DateTime>("RetirementDate")
                        .HasColumnType("datetime(6)");

                    b.Property<int>("StaffTypeID")
                        .HasColumnType("int");

                    b.Property<int>("UserId")
                        .HasColumnType("int");

                    b.HasKey("StaffId");

                    b.ToTable("Staffs");
                });

            modelBuilder.Entity("EMUSocialAPI.Models.Users.StaffType", b =>
                {
                    b.Property<int>("StaffTypeID")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("int");

                    b.Property<string>("StaffTypeTitle")
                        .IsRequired()
                        .HasColumnType("longtext");

                    b.HasKey("StaffTypeID");

                    b.ToTable("StaffTypes");
                });

            modelBuilder.Entity("EMUSocialAPI.Models.Users.StudentModel", b =>
                {
                    b.Property<int>("StudentId")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("int");

                    b.Property<string>("DegreeType")
                        .IsRequired()
                        .HasColumnType("nvarchar(20)");

                    b.Property<DateTime>("GraduationDate")
                        .HasColumnType("datetime(6)");

                    b.Property<bool>("IsAssistant")
                        .HasColumnType("tinyint(1)");

                    b.Property<bool>("IsGraduated")
                        .HasColumnType("tinyint(1)");

                    b.Property<int>("StudentNumber")
                        .HasColumnType("int");

                    b.Property<int>("UserId")
                        .HasColumnType("int");

                    b.HasKey("StudentId");

                    b.ToTable("Students");
                });

            modelBuilder.Entity("EMUSocialAPI.Models.Users.UserType", b =>
                {
                    b.Property<int>("UserTypeID")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("int");

                    b.Property<string>("UserTypeTitle")
                        .IsRequired()
                        .HasColumnType("longtext");

                    b.HasKey("UserTypeID");

                    b.ToTable("UserTypes");
                });

            modelBuilder.Entity("EMUSocialAPI.Models.UserModel", b =>
                {
                    b.HasOne("EMUSocialAPI.Models.Users.UserType", "UserType")
                        .WithMany()
                        .HasForeignKey("UserTypeID")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();

                    b.Navigation("UserType");
                });
#pragma warning restore 612, 618
        }
    }
}