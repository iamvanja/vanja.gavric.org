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
                    // "!_src/**",
                    // "!assets/_psd_other/**",
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
                ],
                dest: "src/assets/js/vendor/"
            }
        ]
    }
};
