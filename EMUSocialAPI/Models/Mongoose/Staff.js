const mongoose = require("mongoose");

const staffSchema = mongoose.Schema({
    userId: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "User",
    },
    staffType: {
        type: String,
        enum: ["instructor", "servant"],
        required: [true, "Staff type is required."],
    },
    isRetired: {
        type: Boolean,
        required: [true, "Please enter your retirement status."],
    },
    retirementDate: {
        type: Date,
        required: [true, "Please enter your retirement date."],
    },
});

module.exports = mongoose.model("Staff", staffSchema);