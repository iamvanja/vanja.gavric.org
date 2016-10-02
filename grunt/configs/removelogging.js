"use strict";

module.exports = {
    production: {
        src: [
            "build/assets/js/**/*.js",
            "!build/assets/js/vendor/*.js",
        ]
    }
};
