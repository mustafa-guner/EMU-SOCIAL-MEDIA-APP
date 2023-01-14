const mongooseProfileService = require("../Service/Mongoose/profile");
module.exports = {
    getMyProfile: async(req, res, next) => {
        try {
            const myProfileResponse = await mongooseProfileService.myProfile(req);
            return res.status(200).json({...myProfileResponse });
        } catch (error) {
            return next(error);
        }
    },
    getAllProfiles: async(req, res, next) => {
        try {
            const allProfileResponse = await mongooseProfileService.allProfiles(req);
            return res.status(200).json({...allProfileResponse });
        } catch (error) {
            return next(error);
        }
    },
    editMyProfile: async(req, res, next) => {
        try {
            const editMyProfileResponse = await mongooseProfileService.editProfile(
                req
            );
            return res.status(200).json({...editMyProfileResponse });
        } catch (error) {
            return next(error);
        }
    },
};