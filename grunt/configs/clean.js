"use strict";

module.exports = {
    productionPre: [
        "build"
    ],
    productionPost: [
        "build/assets/css/scss/**",
        "build/assets/js/foundation.min.js",
        "build/assets/js/main.js",
        "build/assets/pug-*/**"
    ]
};
