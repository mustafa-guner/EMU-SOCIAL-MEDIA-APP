const jwt = require("jsonwebtoken");

module.exports = {
    generateJWT: (user) => {
        const { JWT_SECRET } = process.env;

        const payload = {
            id: user.id,
            email: user.id,
        };
        const token = jwt.sign(payload, JWT_SECRET);

        return token;
    },
};