"use strict";

module.exports = {
    productionPre: [
        "build"
    ],
    productionPost: [
        "build/assets/scss/**",
        "build/assets/js/**/*.js",
        "!build/assets/js/all.js",
        "build/assets/js/site/",
        "build/assets/pug-*/**",
        "build/assets/fonts/*.json"
    ]
};
