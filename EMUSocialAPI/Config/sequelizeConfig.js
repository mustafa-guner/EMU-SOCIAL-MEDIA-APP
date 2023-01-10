const Sequelize = require("sequelize");
const path = require("path");
const dotenv = require("dotenv");
dotenv.config({ path: path.join(__dirname, "/dotenv/.env") });

const { MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB, MYSQL_PORT } = process.env;

const sequelize = new Sequelize(MYSQL_DB, MYSQL_USER, MYSQL_PWD, {
    host: MYSQL_HOST,
    dialect: "mysql",
    port: MYSQL_PORT,
});

module.exports = sequelize;