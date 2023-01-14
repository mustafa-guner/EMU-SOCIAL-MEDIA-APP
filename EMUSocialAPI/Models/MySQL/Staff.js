const sequelize = require("../../Config/sequelizeConfig");
const { DataTypes } = require("sequelize");
const User = require("./User");

const Staff = sequelize.define(
    "staffs", {
        userId: {
            type: DataTypes.INTEGER,
            references: {
                model: "users",
                key: "id",
            },
        },
        isRetired: {
            type: DataTypes.BOOLEAN,
            allowNull: false,
            defaultValue: false,
        },

        retirementDate: {
            type: DataTypes.DATE,
            allowNull: false,
            defaultValue: Date.now,
        },
        staffType: {
            type: DataTypes.ENUM("instructor", "faculty servant"),
            allowNull: false,
        },
    }, { timestamps: false }
);

//Associations - Relationships
Staff.belongsTo(User);

module.exports = Staff;