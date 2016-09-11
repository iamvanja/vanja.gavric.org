"use strict";

module.exports = {
    watch: {
        options: {
            // httpPath: "/",
            cssDir: "src/assets/css",
            sassDir: "src/assets/css/scss",
            imagesDir: "src/assets/images",
            javascriptsDir: "src/assets/js",
            outputStyle: "expanded",
            relativeAssets: true,
        }
    },
    production: {
        options: {
            // httpPath: "/",
            cssDir: "build/assets/css",
            sassDir: "build/assets/css/scss",
            imagesDir: "build/assets/images",
            javascriptsDir: "build/assets/js",
            outputStyle: "compressed",
            relativeAssets: true,
        }
    }
};
