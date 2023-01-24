const User = require("../../Models/Mongoose/User");
const Staff = require("../../Models/Mongoose/Staff");
const Profile = require("../../Models/Mongoose/Profile");
const Student = require("../../Models/Mongoose/Student");
const CustomError = require("../../Helpers/CustomError");
const { options, cloudinary } = require("../../Config/cloudinaryConfig");
const {
    updateRequiredUserTypeModel,
    getUserByID,
    getStaffByID,
    getStudentByID,
} = require("../../Helpers/admin");
const { sendActivationConfirmEmail } = require("../../Helpers/email");
module.exports = {
    toggleActivateUser: async(req) => {
        const user = await getUserByID(req.params.id);
        user.isActive = !user.isActive;
        user.activatedById = req.user.id;
        user.activatedAt = Date.now();
        await user.save();
        //if (user.isActive) await sendActivationConfirmEmail(user);
        return {
            success: true,
            message: `${
        user.isActive ? "Account is activated." : "Account is de-activated."
      }`,
        };
    },
    getAllStudents: async(req) => {
        const students = await Student.find({});
        return { success: true, students: students };
    },
    getAllStaffs: async(req) => {
        const staffs = await Staff.find({});
        return { success: true, staffs: staffs };
    },
    getStudentByID: async(req) => {
        const student = await getStudentByID(req.params.id);
        return { success: true, student: student };
    },
    getStaffByID: async(req) => {
        const staff = await getStaffByID(req.params.id);
        return { success: true, staff: staff };
    },
    getUserByID: async(req) => {
        const user = await getUserByID(req.params.id);
        return { success: true, user: user };
    },
    getAllUsers: async() => {
        const users = await User.find();
        return { success: true, users };
    },

    /*@TODO:UPDATE USER */
    updateUser: async(req) => {
        const user = await getUserByID(req.params.id);

        let updatedUserTypeModel;
        //if request has user type with different than the current user's type
        if (req.body.userType == "student" && user.userType == "staff") {
            const {
                isGraduated,
                graduationDate,
                degreeType,
                isAssistant,
                studentNumber,
            } = req.body;
            const newStudent = new Student({
                userId: req.params.id,
                isGraduated,
                graduationDate,
                degreeType,
                isAssistant,
                studentNumber,
            });
            await newStudent.save();
            updatedUserTypeModel = newStudent;
            await Staff.findOneAndDelete({ userId: req.params.id });
            //remove staff then create student
        }

        //if request has user type with different than the current user's type
        else if (req.body.userType == "staff" && user.userType == "student") {
            const { isRetired, retirementDate, staffType } = req.body;
            const newStaff = new Staff({
                userId: req.params.id,
                isRetired,
                retirementDate,
                staffType,
            });
            await newStaff.save();
            updatedUserTypeModel = newStaff;
            await Student.findOneAndDelete({ userId: req.params.id });
            //remove student then create staff
        } else if (req.body.userType === user.userType) {
            updatedUserTypeModel = await updateRequiredUserTypeModel(
                user.userType,
                req
            );
        }

        let userField = { editedById: req.user.id };
        if (req.body.firstname) userField["firstname"] = req.body.firstname;
        if (req.body.lastname) userField["lastname"] = req.body.lastname;
        if (req.body.country) userField["country"] = req.body.country;
        if (req.body.dob) userField["dob"] = req.body.dob;
        if (req.body.email) {
            const isEmailAlreadyInUse = await User.findOne({ email: req.body.email });
            if (isEmailAlreadyInUse && req.body.email !== isEmailAlreadyInUse.email)
                throw new CustomError(
                    "Email is already in use.Please try different one.",
                    400
                );
            else userField["email"] = req.body.email;
        }
        if (req.body.password) userField["password"] = req.body.password;
        if (req.body.role) userField["role"] = req.body.role;
        if (req.body.userType) userField["userType"] = req.body.userType;
        if (req.body.isActive) userField["isActive"] = req.body.isActive;
        if (req.file) userField["profileImage"] = req.file.path;

        userField.editedById = req.user.id;
        let updatedProfileImage;

        if (req.file) {
            updatedProfileImage = await cloudinary.uploader.upload(req.file.path, {
                ...options,
                folder: "GraduationProject/ProfileImages",
            });
            if (process.env.NODE_ENV == "production")
                userField.profileImage = updatedProfileImage.secure_url;
            else userField.profileImage = updatedProfileImage.url;
        }

        const updatedUser = await User.findByIdAndUpdate(
            req.params.id, {
                ...userField,
            }, { new: true }
        );
        return { success: true, user: { updatedUser }, updatedUserTypeModel };
    },
    removeUser: async(req) => {
        const user = await getUserByID(req.params.id);
        if (req.params.id == req.user.id)
            throw new CustomError("You are not allowed to remove yourself.", 400);

        if (user.userType == "student")
            await Student.findOneAndRemove({ userId: req.params.id });

        if (user.userType == "staff")
            await Staff.findOneAndRemove({ userId: req.params.id });

        await Profile.findOneAndRemove({ userId: req.params.id });
        await User.findByIdAndDelete(req.params.id);
        return { success: true, message: `${user.email} is removed.` };
    },
};