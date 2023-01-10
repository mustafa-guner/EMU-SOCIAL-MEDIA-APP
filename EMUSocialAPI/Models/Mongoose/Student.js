const mongoose = require("mongoose");

const studentSchema = mongoose.Schema({
    userId: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "User",
    },
    studentNumber: {
        type: Number,
        required: [true, "Student number is required."],
        unique: [true, "Student number should be unique."],
        index: true,
    },
    degreeType: {
        type: String,
        enum: ["associate", "bachelor", "graduate", "doctorate"],
        required: [true, "Degree type is required."],
    },
    isGraduated: {
        type: Boolean,
        required: [true, "Please enter your graduation status."],
    },
    graduationDate: {
        type: Date,
        required: [true, "Please enter your retirement date."],
    },
});

module.exports = mongoose.model("Student", studentSchema);