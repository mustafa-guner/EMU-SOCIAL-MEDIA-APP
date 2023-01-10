const Staff = require("./Models/Staff");
const Student = require("./Models/Student");
const User = require("./Models/User");
const fs = require("fs");
const dotenv = require("dotenv");
const path = require("path");

dotenv.config({
    path: path.join(__dirname, "./Config/dotenv/.env"),
});

const sequelize = require("./Config/sequelize");
const connectToDB = require("./Helpers/Database/MySQL");

const DataFolderPath = "./Data/";

//Dumb Datas
const users = JSON.parse(fs.readFileSync(DataFolderPath + "users.json"));
const staffs = JSON.parse(fs.readFileSync(DataFolderPath + "staffs.json"));
const students = JSON.parse(fs.readFileSync(DataFolderPath + "students.json"));

connectToDB();

const importAllData = async function() {
    try {
        await sequelize.sync({ force: true }); //drop it than re create
        users.map(async(userData) => await User.create(userData));
        staffs.map(async(staffData) => await Staff.create(staffData));
        students.map(async(studentData) => await Student.create(studentData));

        // await User.bulkCreate(users);
        // await Question.create(questions);
        // await Answer.create(answers);

        console.log(`Database tables are created successfully.`);
    } catch (err) {
        console.log(err);
        console.err("There is a problem with import process");
    } finally {
        process.exit();
    }
};

const deleteAllData = async function() {
    try {
        await User.deleteMany();
        await Question.deleteMany();
        await Answer.deleteMany();
        console.log("Delete Process Successful");
    } catch (err) {
        console.log(err);
        console.err("There is a problem with delete process");
    } finally {
        process.exit();
    }
};

if (process.argv[2] == "--import") {
    importAllData();
} else if (process.argv[2] == "--delete") {
    deleteAllData();
}