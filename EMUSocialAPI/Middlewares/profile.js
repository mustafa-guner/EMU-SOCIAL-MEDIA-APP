const Profile = require("../Models/Mongoose/Profile");
const CustomError = require("../Helpers/CustomError");
const User = require("../Models/Mongoose/User");
module.exports = {
    validateProfileOwner: async(req, res, next) => {
        try {
            const currentUser = await User.findById(req.user.id);
            const currentUserProfile = await Profile.findOne({
                userId: currentUser.id,
            });
            const profileToEdit = req.params.profileID;
            if (currentUserProfile.id !== profileToEdit)
                throw new CustomError(
                    "You are not allowed to edit someone else's profile."
                );
            req.currentUser = currentUser;
            req.currentProfile = currentUserProfile;
            return next();
        } catch (error) {
            return next(new CustomError(error.message, 401));
        }
    },
};