const mongoose = require("mongoose");

const requestSchema = mongoose.Schema({
    connectedId: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "Connection",
    },
    requestType: {
        type: String,
        enum: ["connectionRequest", "clubRequest"],
    },
    status: {
        type: String,
        enum: ["accepted", "pending"],
        default: "pending",
    },
    userId: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "User",
    },
    sentAt: {
        type: Date,
        default: Date.now(),
    },

    statusChangedAt: Date,
});

module.exports = mongoose.model("Connection", requestSchema);