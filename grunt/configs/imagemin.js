"use strict";
var mozjpeg = require("imagemin-mozjpeg");
var extend = require("extend");

module.exports = function(grunt, data) {
    var options = {
        cache: false,
        optimizationLevel: 6,
        use: [mozjpeg({
            quality: 90,
        })]
    },
    config = {
        productionAll: {
            options: {},
            files:[
                {
                    expand: true,
                    cwd: "build/assets/images/",
                    src: [
                        "**/*.{png,jpg,gif}",
                        "!profile.jpg"
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
        productionProfile: {
            options: {},
            files: {
               "build/assets/images/profile.jpg": "build/assets/images/profile.jpg",
            }
        }
    };

    extend(config.productionAll.options, options);
    extend(config.productionProfile.options, options, {use: [mozjpeg({quality: 32})]});

    return config;
};
