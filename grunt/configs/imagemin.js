"use strict";
var mozjpeg = require("imagemin-mozjpeg");
var webp = require("imagemin-webp");
var extend = require("extend");

module.exports = function(grunt, data) {
    var options = {
        cache: false,
        optimizationLevel: 6,
        use: [
            mozjpeg({
                quality: 90,
            }),
            webp({
                quality: 90
            }),
        ]
    },
    config = {
        productionAll: {
            options: {},
            files:[
                {
                    expand: true,
                    cwd: "build/assets/images/",
                    src: [
                        "**/*.{png,jpg,gif}"
                    ],
                    dest: "build/assets/images/"
                },
                {
                    expand: true,
                    cwd: "build/v1/images/",
                    src: [
                        "**/*.{png,jpg,gif}"
                    ],
                    dest: "build/v1/images/"
                },
            ]
        },
    };

    extend(config.productionAll.options, options);

    return config;
};
