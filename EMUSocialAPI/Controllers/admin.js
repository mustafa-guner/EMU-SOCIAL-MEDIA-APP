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
    getAllStudents: async(req, res, next) => {
        try {
            const studentsResponse = await mongooseAdminService.getAllStudents();
            return res.status(200).json({...studentsResponse });
        } catch (error) {
            return next(error);
        }
    },
    getAllStaffs: async(req, res, next) => {
        try {
            const staffsResponse = await mongooseAdminService.getAllStaffs();
            return res.status(200).json({...staffsResponse });
        } catch (error) {
            return next(error);
        }
    },
    getStudentByID: async(req, res, next) => {
        try {
            const studentResponse = await mongooseAdminService.getStudentByID(req);
            return res.status(200).json({...studentResponse });
        } catch (error) {
            return next(error);
        }
    },
    getStaffByID: async(req, res, next) => {
        try {
            const staffResponse = await mongooseAdminService.getStaffByID(req);
            return res.status(200).json({...staffResponse });
        } catch (error) {
            return next(error);
        }
    },
    getUserByID: async(req, res, next) => {
        try {
            const userResponse = await mongooseAdminService.getUserByID(req);
            return res.status(200).json({...userResponse });
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