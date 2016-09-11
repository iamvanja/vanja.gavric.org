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
                    "!assets/css/main.css",
                    // "!_src/**",
                    // "!assets/_psd_other/**",
                ],
                dest: "build/"
            }
        ]
    }
};
