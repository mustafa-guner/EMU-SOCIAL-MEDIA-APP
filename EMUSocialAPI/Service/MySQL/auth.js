const User = require("../../Models/MySQL/User");
const Student = require("../../Models/MySQL/Student");
const Staff = require("../../Models/MySQL/Staff");

const { generateJWT } = require("../../Helpers/auth");
const CustomError = require("../../Helpers/CustomError");
const bcrypt = require("bcryptjs");
const {
    STUDENT_TYPE,
    STAFF_TYPE,
} = require("../../Models/MySQL/Types/UserType");

const isUserExists = async(email) => {
    try {
        const user = await User.findOne({
            where: { email: email },
        });
        return user;
    } catch (error) {
        throw new CustomError(error.message, 400);
    }
};

const createStudent = async() => {
    try {
        const student = await Student.create({});
        return student;
    } catch (error) {
        throw new CustomError(error.message, 400);
    }
};

const createStaff = (async = async() => {
    try {
        const staff = await Staff.create({});
        return staff;
    } catch (error) {
        throw new CustomError(error.message, 400);
    }
});

const createAssociatedModel = async(userTypeID) => {
    switch (userTypeID) {
        case STUDENT_TYPE:
            await createStudent(userTypeID);
            break;
        case STAFF_TYPE:
            await createStaff(userTypeID);
            break;
        default:
            throw new CustomError("Please choose valid user type.", 400);
    }
};

module.exports = {
    registerNewUser: async(req, res, next) => {
        try {
            const user = await isUserExists(req.body.email);
            if (user) throw new Error(`${req.body.email} is already taken.`);
            await User.create({...req.body });
            await createAssociatedModel(req.body.userTypeID);
            return {
                success: true,
                message: "Congrulations! Your account has been added to queue for confirmation process.",
            };
        } catch (error) {
            throw new CustomError(error.message, 400);
        }
    },
    authenticate: async(req, res, next) => {
        const { email, password } = req.body;
        const user = await isUserExists(email);
        if (!user)
            return next(
                new CustomError(
                    `Account with ${loginRequest.email} is not exists.`,
                    400
                )
            );
        if (!bcrypt.compareSync(password, user.password))
            throw new CustomError("Passwords did not match with the account.", 400);

        const token = generateJWT(user);

        const enableSecureFlag = process.env.NODE_ENV == "development" && true;

        const [header, payload, signature] = token.split(".");
        const accessToken = header + "." + payload + ".";
        const sessionToken = signature;
        return { accessToken, sessionToken, enableSecureFlag };
    },
};