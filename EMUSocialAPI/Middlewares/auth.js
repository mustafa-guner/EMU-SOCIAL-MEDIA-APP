const jwt = require("jsonwebtoken");
const CustomError = require("../Helpers/CustomError");
const User = require("../Models/Mongoose/User");

module.exports = {
    verifyJWT: async(req, res, next) => {
        if (
            req.cookies == undefined ||
            (req.cookies == null &&
                ((req.cookies && !req.cookies.accessToken) ||
                    (req.cookies && !req.cookies.sessionToken)))
        )
            return next(new CustomError("You are not authorized.", 401));

        const token = req.cookies.accessToken + req.cookies.sessionToken;

        try {
            const decoded = jwt.verify(token, process.env.JWT_SECRET);
            req.user = decoded;
            return next();
        } catch (error) {
            res.clearCookie("accessToken");
            res.clearCookie("sessionToken");
            console.log(error.message);
            return next(
                new CustomError("Your session is expired.Please log in.", 401)
            );
        }
    },

    verifyAdminRoute: async(req, res, next) => {
        try {
            const user = await User.findById(req.user.id);
            if (user.role !== "admin" && user.role != "superadmin")
                return next(
                    new CustomError(
                        "You need admin permission to access this route.",
                        401
                    )
                );
            return next();
        } catch (error) {
            return next(new CustomError(error.message, 401));
        }
    },
};