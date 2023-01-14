const express = require("express");
const profileRouter = express.Router();
const { imageUpload } = require("../Helpers/multer");
const profileController = require("../Controllers/profile");
const { validateProfileOwner } = require("../Middlewares/profile");

profileRouter.get("/", profileController.getAllProfiles);
profileRouter.get("/me", profileController.getMyProfile);
profileRouter.put(
    "/edit/:profileID", [
        imageUpload.fields([
            { name: "profileImage", maxCount: 1 },
            { name: "coverImage", maxCount: 1 },
        ]),
        validateProfileOwner,
    ],
    profileController.editMyProfile
);

module.exports = profileRouter;