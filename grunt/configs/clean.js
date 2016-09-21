"use strict";

module.exports = {
    productionPre: [
        "build"
    ],
    productionPost: [
        "build/assets/scss/**",
        "build/assets/js/foundation.min.js",
        "build/assets/js/main.js",
        "build/assets/js/site/**",
        "build/assets/pug-*/**",
        "build/assets/fonts/*.json"
    ]
};
