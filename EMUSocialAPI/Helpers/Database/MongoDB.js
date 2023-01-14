const mongoose = require("mongoose");

const connectToMongoDB = async() => {
    try {
        const { MONGO_DB_CONNECTION_URL } = process.env;
        mongoose.set("strictQuery", false);
        await mongoose.connect(MONGO_DB_CONNECTION_URL);

        console.log("Connected to MongoDB");
    } catch (error) {}
};

module.exports = connectToMongoDB;