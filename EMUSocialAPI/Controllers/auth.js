const mysqlAuthService = require("../Service/MySQL/auth");
const mongooseAuthService = require("../Service/Mongoose/auth");

module.exports = {
    register: async(req, res, next) => {
        try {
            const registerResponse = await mongooseAuthService.registerNewUser(req);
            return res.status(201).json(registerResponse);
        } catch (error) {
            return next(error);
        }
    },
    login: async(req, res, next) => {
        try {
            const loginResponse = await mongooseAuthService.authenticate(req);
            const { accessToken, sessionToken } = loginResponse;
            const isEnvironmentProduction = () =>
                process.env.NODE_ENV == "production";
            console.log(accessToken + sessionToken);
            return res
                .cookie("accessToken", accessToken, {
                    sameSite: true,
                    secure: isEnvironmentProduction(),
                    maxAge: 30 * 30 * 1000, //30 mins
                })
                .cookie("sessionToken", sessionToken, {
                    secure: isEnvironmentProduction(),
                    sameSite: true,
                    httpOnly: true,
                })
                .json({
                    success: true,
                });
        } catch (error) {
            return next(error);
        }
    },
    logout: async(req, res, next) => {
        try {
            res.clearCookie("accessToken");
            res.clearCookie("sessionToken");
            return res.status(200).json({
                success: true,
                message: "Logged out successfully",
            });
        } catch (error) {
            return next(error);
        }
    },
};