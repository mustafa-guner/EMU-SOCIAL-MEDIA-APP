const express = require("express");
const postRouter = express.Router();
const postController = require("../Controllers/post");
const { imageUpload } = require("../Helpers/multer");
const { verifyJWT } = require("../Middlewares/auth");

postRouter.get("/", postController.getAllPosts);
postRouter.get("/post/:postID", postController.getPostByID);
postRouter.post(
    "/new-post", [imageUpload.single("thumbnail")],
    postController.createPost
);
postRouter.delete("/remove-post/:postID", postController.removePostByID);

module.exports = postRouter;