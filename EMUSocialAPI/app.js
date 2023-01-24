const express = require("express");
const bp = require("body-parser");
const logger = require("morgan");
const path = require("path");
const dotenv = require("dotenv");
const cors = require("cors");
const cookieParser = require("cookie-parser");

dotenv.config({ path: path.join(__dirname, "./Config/dotenv/.env") });

const app = express();

const { NODE_ENV, CLIENT_DEV_URL, CLIENT_PRODUCT_URL } = process.env;
const mappedClientURL = () =>
    NODE_ENV !== "production" ? CLIENT_DEV_URL : CLIENT_PRODUCT_URL;

//Index Route
const appRouter = require("./Routes/index.js");
//Custom Error Handler
const { customErrorHandler } = require("./Middlewares/CustomErrorHandler");

//Connect to MY SQL Database (sequelize + mysql)
// const connectToMySQL = require("./Helpers/Database/MySQL");
// connectToMySQL();

const connectToMongoDB = require("./Helpers/Database/MongoDB");

app.use(cors({ origin: mappedClientURL(), credentials: true }));
app.use(cookieParser());
app.use(logger(NODE_ENV == "production" ? "combined" : "dev"));
app.use(bp.urlencoded({ extended: true })); //form data
app.use(bp.json());

connectToMongoDB();

app.use("/api/v1/", appRouter);
app.use(customErrorHandler);

module.exports = app;