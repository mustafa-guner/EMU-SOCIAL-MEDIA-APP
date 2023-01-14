const app = require("../app.js");

const { PORT, NODE_ENV } = process.env || 3200;

app.listen(PORT, () =>
    console.log(
        `Server is up and running on PORT:${PORT}\nEnvironment:${NODE_ENV}`
    )
);