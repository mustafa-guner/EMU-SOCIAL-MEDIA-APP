const mongoose = require("mongoose");

const connectionSchema = mongoose.Schema({
    userId: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "User",
    },
    friendId: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "User",
    },
    requestId: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "Request",
    },
    status: {
        type: String,
        enum: ["accepted", "ignored", "pending"],
    },
});

module.exports = mongoose.model("Connection", connectionSchema);