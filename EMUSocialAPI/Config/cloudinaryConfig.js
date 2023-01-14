const cloudinary = require("cloudinary").v2;
const path = require("path");
const dotenv = require("dotenv");
dotenv.config({ path: path.join(__dirname, "/dotenv/.env") });

const {
    NODE_ENV,
    CLOUDINARY_CLOUD_NAME,
    CLOUDINARY_API_SECRET,
    CLOUDINARY_API_KEY,
} = process.env;

const options = {
    use_filename: true,
    unique_filename: false,
    overwrite: false,
};

cloudinary.config({
    secure: NODE_ENV && "production",
    cloud_name: CLOUDINARY_CLOUD_NAME,
    api_key: CLOUDINARY_API_KEY,
    api_secret: CLOUDINARY_API_SECRET,
});

module.exports = {
    options,
    cloudinary,
};

// further reference link if we need anything else:https://cloudinary.com/documentation/node_quickstart