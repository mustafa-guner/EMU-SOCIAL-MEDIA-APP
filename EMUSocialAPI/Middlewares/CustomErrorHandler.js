const CustomError = require("../Helpers/CustomError");
module.exports = {
    customErrorHandler: (err, req, res, next) => {
        //New error class from the CustomError class. (errorTest) middleware
        let customError = err;
        if (process.env.NODE_ENV !== "production") {
            console.log(customError.name);
            console.log(customError.message);
            console.log(customError);
        }

        switch (customError.name) {
            case "Error":
                customError = new CustomError(customError.message, customError.status);
                break;

            case "SyntaxError":
                customError = new CustomError("Unexpected Syntax", 400);
                break;

            case "ValidationError":
                let validationErrors = [];
                Object.keys(customError.errors).forEach((key) =>
                    validationErrors.push(customError.errors[key].message)
                );

                customError = new CustomError(validationErrors, 400);
                break;

                //MongoDB ObjectID error
            case "CastError":
                customError = new CustomError("Please provide a valid id.", 400);
                break;

                //MongoDB Error
            case "MongoError":
                if (customError.message.includes("E1100")) {
                    customError = new CustomError("Duplicated data!", 400);
                }
                break;

            default:
                customError = new CustomError("Internal Service Error", 500);
        }

        //400=> BAD STATUS
        return res.status(customError.status).json({
            success: false,
            error: [...customError.message.split(",")],
        });
    },
};