const multer = require("multer");
const CustomError = require("../Helpers/CustomError");
const path = require("path");

//multers disk storage setting //KAYIT AYARLARI / KAYDETME AYARLARI
const storage = multer.diskStorage({
    //DETERMINES THE FILE NAME (best choice is give names according to user id)
    destination: function(req, file, cb) {
        cb(null, path.join(__dirname, "../public/uploads"));
    },
    filename: function(req, file, cb) {
        req[file.fieldname] =
            Date.now() + "-" + file.fieldname + "-" + file.originalname;

        cb(null, req[file.fieldname]);
    },
});

//Multer Settings //MULTER AYARLARI / FILTRELEME vs
const upload = multer({
    storage: storage,
    //Restrict the file extension (png,jpeg,jpg and giff only valid ones)
    fileFilter: function(req, file, cb) {
        //Declaring the extension of the file
        //path.extname => Returns the file extension no matter how long the file root is. (e.g C:/deneme/users/uploads/deneme.js) => .js
        const extension = path.extname(file.originalname);
        const validExtensions = [".png", ".jpeg", ".jpg", ".gif", ".jfif"];
        if (!validExtensions.includes(extension)) {
            return cb(
                new CustomError("Please provide valid image extension.", 400),
                false
            );
        } else {
            return cb(null, true);
        }
    },
});

module.exports = {
    //Middleware
    imageUpload: multer(upload),
};