const mongoosePostService = require("../Service/Mongoose/post");
module.exports = {
    createPost: async(req, res, next) => {
        try {
            const createPostResponse = await mongoosePostService.createNewPost(req);
            return res.status(201).json({...createPostResponse });
        } catch (error) {
            return next(error);
        }
    },
    getAllPosts: async(req, res, next) => {
        try {
            const allPostsResponse = await mongoosePostService.getAllPosts(req);
            return res.status(200).json({...allPostsResponse });
        } catch (error) {
            return next(error);
        }
    },
    getPostByID: async(req, res, next) => {
        try {
            const getPostResponse = await mongoosePostService.getPostByID(req);
            return res.status(200).json({...getPostResponse });
        } catch (error) {
            return next(error);
        }
    },
    removePostByID: async(req, res, next) => {
        try {
            const removePostResponse = await mongoosePostService.removePostByID(req);
            return res.status(200).json({...removePostResponse });
        } catch (error) {
            return next(error);
        }
    },
};