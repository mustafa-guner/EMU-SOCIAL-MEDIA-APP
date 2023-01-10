const User = require("../../Models/Mongoose/User");
const Post = require("../../Models/Mongoose/Post");
const CustomError = require("../../Helpers/CustomError");
const { options, cloudinary } = require("../../Config/cloudinaryConfig");
const {
    blogCreationInputValidation,
    smartTrim,
} = require("../../Helpers/post");
const formidable = require("formidable");
const fs = require("fs");
const slugify = require("slugify");

const getFormFieldsFromRequest = (form, req) => {
    return new Promise((resolve, reject) => {
            return form.parse(req, async(err, fields, files) => {
                if (err) return reject(err.message);

                const result = blogCreationInputValidation(fields);

                if (!result.success || result.errors.length > 0)
                    return reject(result.errors);

                const existedBlog = await Post.findOne({ title: fields.title });
                if (existedBlog)
                    return reject(
                        "Blog with the title is already exists. Please try unique one."
                    );
                return resolve({ fields, files });
            });
        })
        .then((formData) => formData)
        .catch((err) => {
            throw new CustomError(err, 400);
        });
};

module.exports = {
    createNewPost: async(req) => {
        try {
            const { content, title, postType } = req.body;
            console.log(req.file);
            const result = blogCreationInputValidation(req.body);
            if (!result.success || result.errors.length > 0)
                throw new CustomError(result.errors, 400);

            // check if there is any photo
            if (
                ((postType == "blog" || postType == "jobPost") && !req.file) ||
                req.file.fieldname !== "thumbnail"
            )
                throw new CustomError(
                    "Please upload at least 1 image for thumbnail.",
                    400
                );

            let post = new Post({
                title,
                slug: slugify(title).toLowerCase(),
                thumbnail: {
                    description: smartTrim(content, 120, " ", "..."),
                },
                content: content,
                postType,
                ownerId: req.user.id,
            });

            if (
                (postType == "blog" || postType == "jobPost") &&
                req.file.fieldname === "thumbnail"
            ) {
                const uploadedBlogThumbnailImage = await cloudinary.uploader.upload(
                    req.file.path, {...options, folder: "GraduationProject/PostImages" }
                );

                const blogThumbnailImage =
                    process.env.NODE_ENV == "development" ?
                    uploadedBlogThumbnailImage.url :
                    uploadedBlogThumbnailImage.secure_url;

                post.thumbnail.image = blogThumbnailImage;
            }
            await post.save();
            return {
                success: true,
                post: post,
                message: "Post is created succesfully.",
            };
        } catch (error) {
            throw new CustomError(error.message, error.status ? error.status : 400);
        }
    },
    getAllPosts: async(req) => {
        try {
            const posts = await Post.find()
                .populate("ownerId", "_id email firstname lastname userType")
                .select("_id title slug thumbnail ownerId publishedAt updatedAt");
            return { success: true, posts };
        } catch (error) {
            throw new CustomError(error.message, error.status ? error.status : 400);
        }
    },
    getPostByID: async(req) => {},
    removePostByID: async(req) => {},
};