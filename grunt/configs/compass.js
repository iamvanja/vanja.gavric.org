"use strict";

module.exports = {
    watch: {
        options: {
            // httpPath: "/",
            cssDir: "src/assets/css",
            sassDir: "src/assets/scss",
            imagesDir: "src/assets/images",
            javascriptsDir: "src/assets/js",
            outputStyle: "expanded",
            relativeAssets: true,
            raw: 'Sass::Script::Number.precision = 3\n',
        }
    },
    production: {
        options: {
            // httpPath: "/",
            cssDir: "build/assets/css",
            sassDir: "build/assets/scss",
            imagesDir: "build/assets/images",
            javascriptsDir: "build/assets/js",
            outputStyle: "compressed",
            relativeAssets: true,
            raw: 'Sass::Script::Number.precision = 3\n',
        }
    }
};
