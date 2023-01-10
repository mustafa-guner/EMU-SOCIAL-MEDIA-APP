const sequelize = require("../../Config/sequelizeConfig");
const { DataTypes } = require("sequelize");

const User = sequelize.define(
    "users", {
        firstname: {
            type: DataTypes.STRING,
            allowNull: false,
        },
        lastname: {
            type: DataTypes.STRING,
            allowNull: false,
        },
        email: {
            type: DataTypes.STRING,
            allowNull: false,
            unique: true,
        },
        password: {
            type: DataTypes.STRING,
            allowNull: false,
        },
        profileImage: {
            type: DataTypes.STRING,
            allowNull: false,
        },
        dob: {
            type: DataTypes.DATEONLY,
            allowNull: false,
        },
        gender: {
            type: DataTypes.STRING,
            allowNull: false,
        },
        country: {
            type: DataTypes.STRING,
            allowNull: false,
        },
        role: {
            type: DataTypes.ENUM("superadmin", "admin", "user"),
            allowNull: false,
            defaultValue: "user",
        },
        resetPasswordTokenExpiry: {
            type: DataTypes.DATE,
            allowNull: true,
        },
        resetPasswordToken: {
            type: DataTypes.STRING,
            allowNull: true,
        },
        userType: {
            type: DataTypes.ENUM("student", "staff"),
            allowNull: false,
        },
        isActive: {
            type: DataTypes.BOOLEAN,
            allowNull: false,
            defaultValue: false,
        },
        registeredAt: {
            type: DataTypes.DATE,
            allowNull: false,
            defaultValue: Date.now,
        },
        activatedAt: {
            type: DataTypes.DATE,
        },
    }, { timestamps: false }
);

module.exports = User;