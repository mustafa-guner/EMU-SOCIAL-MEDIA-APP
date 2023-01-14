const mongoose = require("mongoose");
const profileSchema = mongoose.Schema({
    userId: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "User",
    },
    coverImage: {
        type: String,
        default: "avatar.png",
    },
    description: {
        type: String,
        max: 255,
    },
});

module.exports = mongoose.model("Profile", profileSchema);