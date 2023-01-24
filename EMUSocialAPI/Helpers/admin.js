const Student = require("../Models/Mongoose/Student");
const User = require("../Models/Mongoose/User");
const Staff = require("../Models/Mongoose/Staff");
const CustomError = require("./CustomError");

const updateStudentModel = async(req) => {
    const studentUser = await Student.findOne({ userId: req.params.id });
    let studentField = {};
    if (req.body.studentNumber)
        studentField.studentNumber = req.body.studentNumber;
    if (req.body.degreeType) studentField.degreeType = req.body.degreeType;
    if (req.body.graduationDate)
        studentField.graduationDate = req.body.graduationDate;
    if (req.body.isGraduated != null || req.body.isGraduated != undefined)
        studentField.isGraduated = req.body.isGraduated;
    if (req.body.isAssistant) studentField.isAssistant = req.body.isAssistant;
    return await Student.findByIdAndUpdate({ _id: studentUser.id }, {...studentField }, { new: true });
};

const updateStaffModel = async(req) => {
    const staffUser = await Staff.findOne({ userId: req.params.id });
    let staffField = {};
    if (req.body.isRetired) staffField["isRetired"] = req.body.isRetired;
    if (req.body.retirementDate)
        staffField["retirementDate"] = req.body.retirementDate;
    if (req.body.staffType) staffField["staffType"] = req.body.staffType;

    return await Staff.findByIdAndUpdate({ _id: staffUser.id }, {...staffField }, { new: true });
};

module.exports = {
    updateRequiredUserTypeModel: async(userType, requestBody) => {
        let updatedModel;
        switch (userType) {
            case "student":
                updatedModel = await updateStudentModel(requestBody);
                break;
            case "staff":
                updatedModel = await updateStaffModel(requestBody);
                break;
            default:
                throw new CustomError("Please enter valid user type.", 400);
        }
        return updatedModel;
    },

    getUserByID: async(id) => {
        const user = await User.findById(id).populate([
            "editedById",
            "activatedById",
        ]);
        if (!user)
            throw new CustomError("User is not found with associated ID.", 404);
        return user;
    },
    getStudentByID: async(id) => {
        const student = await Student.findOne({ userId: id });
        if (!student)
            throw new CustomError("Student is not found with associated ID.", 404);
        return student;
    },
    getStaffByID: async(id) => {
        const staff = await Staff.findOne({ userId: id });
        if (!staff)
            throw new CustomError("Staff is not found with associated ID.", 404);
        return staff;
    },
};