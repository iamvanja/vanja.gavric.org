"use strict";

module.exports = {
    options: {
        processors: [
            require("autoprefixer")({
                browsers: [
                    "> 1%",
                    "last 5 versions"
                ]
            })
        ]
    },
    watch: {
        src: "src/assets/css/main.css"
    },
    production: {
        src: "build/assets/css/main.css"
    }
};
