const mongoose = require("mongoose");

const userSchema = mongoose.Schema({
    firstname: {
        type: String,
        required: [true, "Firstname is required."],
    },
    lastname: {
        type: String,
        required: [true, "Lastname is required."],
    },
    email: {
        type: String,
        required: [true, "Firstname is required."],
        unique: [true, "Email should be unique"],
        index: true,
    },
    profileImage: {
        type: String,
        required: [true, "Please upload your profile image."],
    },
    password: {
        type: String,
        required: [true, "Firstname is required."],
        select: false,
    },

    role: {
        type: String,
        enum: ["superadmin", "admin", "user"],
        default: "user",
    },
    userType: {
        type: String,
        enum: ["student", "staff"],
    },

    isActive: {
        type: Boolean,
        default: false,
    },
    resetPasswordToken: String,
    resetPasswordTokenExpiry: Date,

    editedAt: Date,

    editedById: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "User",
    },

    registeredAt: {
        type: Date,
        default: Date.now(),
    },
});

module.exports = mongoose.model("User", userSchema);