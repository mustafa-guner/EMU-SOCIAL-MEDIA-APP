const User = require("../../Models/Mongoose/User");
const Staff = require("../../Models/Mongoose/Staff");
const Student = require("../../Models/Mongoose/Student");
const CustomError = require("../../Helpers/CustomError");
const { options, cloudinary } = require("../../Config/cloudinaryConfig");
const { updateRequiredUserTypeModel } = require("../../Helpers/admin");

module.exports = {
    toggleActivateUser: async(req) => {
        const user = await User.findById(req.params.id);

        if (!user)
            throw new CustomError("User is not found with associated ID.", 404);
        user.isActive = !user.isActive;
        user.editedById = req.user.id;
        await user.save();
        return {
            success: true,
            message: `${
        user.isActive ? "Account is active." : "Account is inactive."
      }`,
        };
    },

    getAllUsers: async() => {
        const users = await User.find();
        return { success: true, users };
    },

    /*@TODO:UPDATE USER */
    updateUser: async(req) => {
        const user = await User.findById(req.params.id);
        if (!user)
            throw new CustomError("User is not found with associated ID.", 404);

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

        let userField = {};
        if (req.body.firstname) userField["firstname"] = req.body.firstname;
        if (req.body.lastname) userField["lastname"] = req.body.lastname;
        if (req.body.lastname) userField["lastname"] = req.body.lastname;
        if (req.body.dob) userField["dob"] = req.body.dob;
        if (req.body.email) userField["email"] = req.body.email;
        if (req.body.password) userField["password"] = req.body.password;
        if (req.body.role) userField["role"] = req.body.role;
        if (req.body.userType) userField["userType"] = req.body.userType;
        if (req.body.isActive) userField["isActive"] = req.body.isActive;
        if (req.file) userField["profileImage"] = req.file.path;

        userField.editedById = req.user.id;

        const updatedProfileImage = await cloudinary.uploader.upload(
            req.file.path, {...options, folder: "GraduationProject/ProfileImages" }
        );
        const profileImage =
            process.env.NODE_ENV == "development" ?
            updatedProfileImage.url :
            updatedProfileImage.secure_url;
        userField.profileImage = profileImage;

        const updatedUser = await User.findByIdAndUpdate(
            req.params.id, {
                ...userField,
            }, { new: true }
        );
        return { success: true, user: { updatedUser }, updatedUserTypeModel };
    },
    removeUser: async(req) => {
        const user = await User.findById(req.params.id);
        if (!user) throw new Error("User is not found with associated ID.");

        if (user.userType == "student")
            await Student.findOneAndRemove({ userId: user.id });

        if (user.userType == "staff")
            await Staff.findOneAndRemove({ userId: user.id });

        await User.findByIdAndDelete(req.params.id);
        return { success: true, message: `${user.email} is removed.` };
    },
};