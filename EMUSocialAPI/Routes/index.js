const express = require("express");
const router = express.Router();

//routes
const authRouter = require("./auth");
const adminRouter = require("./admin");
const profileRouter = require("./profile");
const postRouter = require("./post");

// auth middlewares ~ authorized only
const { verifyJWT, verifyAdminRoute } = require("../Middlewares/auth");

router.use("/auth", authRouter);
router.use("/admin", verifyJWT, verifyAdminRoute, adminRouter);
router.use("/profiles", verifyJWT, profileRouter);
router.use("/posts", verifyJWT, postRouter);

module.exports = router;