const express = require("express");
const adminRouter = express.Router();
const { imageUpload } = require("../Helpers/multer");
const adminController = require("../Controllers/admin");

adminRouter.get("/users", adminController.getAllUsers);
adminRouter.get("/staffs", adminController.getAllStaffs);
adminRouter.get("/students", adminController.getAllStudents);
adminRouter.post(
    "/toggle-activation-user/:id",
    adminController.toggleAccountActivation
);
adminRouter.get("/users/:id", adminController.getUserByID);
adminRouter.get("/students/:id", adminController.getStudentByID);
adminRouter.get("/staffs/:id", adminController.getStaffByID);
adminRouter.post(
    "/update-user/:id",
    imageUpload.single("profileImage"),
    adminController.updateUser
);
adminRouter.delete("/remove-user/:id", adminController.removeUser);

module.exports = adminRouter;