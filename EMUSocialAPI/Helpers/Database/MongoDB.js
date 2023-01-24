const mongoose = require("mongoose");

const connectToMongoDB = async() => {
    try {
        const {
            MONGO_DB_CONNECTION_URL,
            MONGO_DB_CONNECTION_PRODUCTION_URL,
            NODE_ENV,
        } = process.env;
        const MONGO_DB_CONNECTION =
            NODE_ENV === "production" ?
            MONGO_DB_CONNECTION_PRODUCTION_URL :
            MONGO_DB_CONNECTION_URL;

        mongoose.set("strictQuery", false);
        await mongoose.connect(MONGO_DB_CONNECTION, {
            useNewUrlParser: true,
            useUnifiedTopology: true,
        });

        console.log("Connected to MongoDB");
    } catch (error) {}
};

module.exports = connectToMongoDB;