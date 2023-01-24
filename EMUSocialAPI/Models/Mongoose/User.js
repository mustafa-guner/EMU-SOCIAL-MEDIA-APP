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
        required: [true, "Email is required."],
        unique: [true, "Email should be unique"],
        index: true,
    },
    profileImage: {
        type: String,
        required: [true, "Please upload your profile image."],
    },
    password: {
        type: String,
        required: [true, "Password is required."],
        select: false,
    },
    dob: {
        type: Date,
        required: [true, "Please provide your birthdate"],
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
    gender: {
        type: String,
        enum: ["male", "female"],
        required: [true, "Please select your gender."],
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

    activatedById: { type: mongoose.Schema.Types.ObjectId, ref: "User" },
    activatedAt: Date,
    country: {
        type: String,
        required: [true, "Please select your country"],
    },
    registeredAt: {
        type: Date,
        default: Date.now(),
    },
});

// userSchema.pre("save", async function(next) {
//     try {
//         if (!this.isModified("password")) return next();
//         const password = await bcrypt.hash(this.password, 10);
//         this.password = password;
//         return next();
//     } catch (error) {
//         console.log(error);
//     }
// });

module.exports = mongoose.model("User", userSchema);