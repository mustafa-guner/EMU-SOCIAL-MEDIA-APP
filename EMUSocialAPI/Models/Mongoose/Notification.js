const mongoose = require("mongoose");
const notificationSchema = mongoose.Schema({
    likeId: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "User",
    },
});

module.exports = mongoose.model("Notification", notificationSchema);