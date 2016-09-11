"use strict";

module.exports = function(grunt, data) {
    var config = {
        options: {
            sourceMap: true,
            sourceMapIncludeSources: true
        },
        production: {
            files: [
                {
                    dest: "build/assets/js/main.min.js",
                    src: data.helpers.getProductionFiles(data.settings.jsFiles)
                },
                {
                    expand: true,
                    cwd: "build/",
                    src: [
                        "assets/js/init-*.js",
                    ],
                    dest: "build/"
                }
            ]
        }
    };

    return config;
};



