const mysqlAuthService = require("../Service/MySQL/auth");
const mongooseAdminService = require("../Service/Mongoose/admin");

module.exports = {
    toggleAccountActivation: async(req, res, next) => {
        try {
            const toggleAccountResponse =
                await mongooseAdminService.toggleActivateUser(req);
            return res.status(200).json({...toggleAccountResponse });
        } catch (error) {
            return next(error);
        }
    },
    updateUser: async(req, res, next) => {
        try {
            const updateResponse = await mongooseAdminService.updateUser(req);
            return res.status(200).json({...updateResponse });
        } catch (error) {
            return next(error);
        }
    },
    getAllUsers: async(req, res, next) => {
        try {
            const usersResponse = await mongooseAdminService.getAllUsers();
            return res.status(200).json({...usersResponse });
        } catch (error) {
            return next(error);
        }
    },
    removeUser: async(req, res, next) => {
        try {
            const removeUserResponse = await mongooseAdminService.removeUser(req);
            return res.status(200).json({...removeUserResponse });
        } catch (error) {
            return next(error);
        }
    },
};