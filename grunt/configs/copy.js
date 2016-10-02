"use strict";

module.exports = {
    production: {
        files: [
            {
                expand: true,
                cwd: "src/",
                src: [
                    "**",
                    ".htaccess",
                    "!old/**",
                    "!assets/js/foundation/**",
                    "!**/*.psd",
                    "!assets/css/**",
                    "!assets/js/all.js",
                ],
                dest: "build/"
            }
        ]
    },
    npmAssetsDev: {
        files: [
            {
                expand: true,
                flatten: true,
                cwd: "node_modules/",
                src: [
                    "jquery.backstretch/jquery.backstretch.js"
                ],
                dest: "src/assets/js/vendor/"
            }
        ]
    }
};
