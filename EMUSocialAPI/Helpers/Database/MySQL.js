const mysql = require("mysql2");
const sequelize = require("../../Config/sequelize");

// const connectToMYSQL = () => {
//     try {
//         const {
//             MYSQL_CONNECTION_LIMIT,
//             MYSQL_HOST,
//             MYSQL_USER,
//             MYSQL_PWD,
//             MYSQL_PORT,
//             MYSQL_DB,
//         } = process.env;

//         const poolConnection = mysql.createPool({
//             connectionLimit: MYSQL_CONNECTION_LIMIT,
//             host: MYSQL_HOST,
//             user: MYSQL_USER,
//             password: MYSQL_PWD,
//             database: MYSQL_DB,
//             port: MYSQL_PORT,
//         });
//         console.log("Connected to MYSQL Successfully.");
//         return poolConnection;
//     } catch (error) {
//         console.error(error.message);
//     }
// };

const connectToDB = () => {
    return sequelize
        .authenticate()
        .then(() => {
            console.log("Connection has been established successfully.");
        })
        .catch((error) => {
            console.error("Unable to connect to the database: ", error);
        });
};

module.exports = connectToDB;