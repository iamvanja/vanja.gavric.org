"use strict";

module.exports = {
    production: {
        pattern: [
            "build/**/*.html",
            "!build/v1/**/*",
            "build/v1/index.php"
        ],
        siteRoot: "build/",
        changefreq: "monthly"
    }
};
