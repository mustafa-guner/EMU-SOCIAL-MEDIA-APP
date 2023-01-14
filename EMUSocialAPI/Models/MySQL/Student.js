const sequelize = require("../../Config/sequelizeConfig");
const { DataTypes } = require("sequelize");
const User = require("./User");

const Student = sequelize.define(
    "students", {
        userId: {
            type: DataTypes.INTEGER,
            references: {
                model: "users",
                key: "id",
            },
        },
        studentNumber: {
            type: DataTypes.NUMBER,
            allowNull: false,
            unique: true,
        },
        isGraduated: {
            type: DataTypes.BOOLEAN,
            allowNull: false,
            defaultValue: false,
        },
        isAssistant: {
            type: DataTypes.BOOLEAN,
            allowNull: false,
            defaultValue: false,
        },
        graduationDate: {
            type: DataTypes.DATE,
            defaultValue: Date.now,
            allowNull: false,
        },
        degreeType: {
            type: DataTypes.ENUM("associate", "bachelor", "graduate ", "doctorate "),
            allowNull: false,
        },

        registeredAt: {
            type: DataTypes.DATE,
            defaultValue: Date.now,
        },
    }, { timestamps: false }
);

//Associations - Relationships
Student.belongsTo(User);

module.exports = Student;