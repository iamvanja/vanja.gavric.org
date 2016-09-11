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
                    dest: "build/assets/js/all.js",
                    src: data.helpers.getProductionFiles(data.settings.jsFiles)
                }
            ]
        }
    };

    return config;
};



