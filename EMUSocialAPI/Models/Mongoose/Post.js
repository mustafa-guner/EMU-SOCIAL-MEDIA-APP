const mongoose = require("mongoose");

const postSchema = mongoose.Schema({
    ownerId: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "User",
    },
    title: {
        type: String,
        trim: true,
        min: 3,
        max: 160,
        required: [true, "Title is required."],
    },
    postType: {
        type: String,
        enum: ["announcement", "blog", "jobPost"],
        required: [true, "Please select your post type."],
    },
    // clubId: {
    //     type: mongoose.Schema.Types.ObjectId,
    //     ref: "User",
    // },
    slug: {
        type: String,
        unique: true,
        index: true,
    },
    // category: {
    //     type: String,
    //     required: [true, "Category is required."],
    // },
    content: {
        type: String,
        required: [true, "Content is required."],
    },
    thumbnail: {
        image: String,
        description: String,
    },
    publishedAt: {
        type: Date,
        default: Date.now(),
    },
    updatedAt: Date,
    likesId: [{ type: mongoose.Schema.Types.ObjectId, ref: "User" }],
    commentId: [{ type: mongoose.Schema.Types.ObjectId, ref: "User" }],
});

module.exports = mongoose.model("Post", postSchema);