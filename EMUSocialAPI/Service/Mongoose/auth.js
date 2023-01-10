const User = require("../../Models/Mongoose/User");
const Student = require("../../Models/Mongoose/Student");
const Staff = require("../../Models/Mongoose/Staff");
const Profile = require("../../Models/Mongoose/Profile");
const { generateJWT } = require("../../Helpers/auth");
const CustomError = require("../../Helpers/CustomError");
const bcrypt = require("bcryptjs");
const { options, cloudinary } = require("../../Config/cloudinaryConfig");
const mongoose = require("mongoose");

const { NODE_ENV } = process.env;

const createAssociatedModel = async(userId, requestBody) => {
    const TYPES = { STUDENT_TYPE: "student", STAFF_TYPE: "staff" };

    switch (requestBody.userType) {
        case TYPES.STUDENT_TYPE:
            const existedStudent = await Student.findOne({
                studentNumber: requestBody.studentNumber,
            });
            if (existedStudent)
                throw new CustomError("Student number should be unique.", 400);
            const student = new Student({ userId: userId, ...requestBody });
            await student.save();
            break;
        case TYPES.STAFF_TYPE:
            const staff = new Staff({ userId: userId, ...requestBody });
            await staff.save();
            break;
        default:
            throw new CustomError("Please choose valid user type.", 400);
    }
};

module.exports = {
    registerNewUser: async(req) => {
        const user = await User.findOne({ email: req.body.email });

        if (user) throw new CustomError(`${req.body.email} is already taken.`, 400);

        const newUserID = mongoose.Types.ObjectId();
        console.log(req.profileImage);
        const newUser = new User({
            _id: newUserID,
            ...req.body,
            profileImage: req.profileImage,
        });

        const newProfile = new Profile({
            userId: newUserID,
            coverImage: "https://res.cloudinary.com/dnxgeilts/image/upload/v1672618772/GraduationProject/CoverImages/pexels-photo-268941.jpeg_z1ltgh_xqfsnd.jpg",
        });

        // Hash the password
        newUser.password = bcrypt.hashSync(req.body.password, 10);
        try {
            //Validate first then check the other models if any error is thrown catch in catch block
            await newUser.validate();
            await createAssociatedModel(newUserID, req.body);
            const uploadedProfileImage = await cloudinary.uploader.upload(
                req.file.path, {...options, folder: "GraduationProject/ProfileImages" }
            );
            const profileImage =
                NODE_ENV == "development" ?
                uploadedProfileImage.url :
                uploadedProfileImage.secure_url;
            newUser.profileImage = profileImage;

            await newUser.save();
            await newProfile.save();
            return {
                success: true,
                message: "Congrulations! Your account has been added to queue for confirmation process.",
            };
        } catch (err) {
            //remove any created model

            throw new CustomError(err.message, err.status ? err.status : 400);
        }
    },
    authenticate: async(req) => {
        const { email, password } = req.body;
        const user = await User.findOne({ email: email }).select("password");
        if (!user)
            throw new CustomError(
                `Account with ${req.body.email} is not exists.`,
                400
            );
        if (user.isActive === false)
            throw new CustomError(
                "Your account is not activated yet. Please contact with the administrator.",
                400
            );
        if (!bcrypt.compareSync(password, user.password))
            throw new CustomError("Wrong password", 400);

        //generat token based on the user email + id
        const token = generateJWT(user);

        const enableSecureFlag = NODE_ENV === "development" ? false : true;

        const [header, payload, signature] = token.split(".");
        const accessToken = header + "." + payload + ".";
        const sessionToken = signature;
        return { accessToken, sessionToken, enableSecureFlag };
    },
};