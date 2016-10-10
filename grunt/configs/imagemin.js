"use strict";
var mozjpeg = require("imagemin-mozjpeg");
var webp = require("imagemin-webp");
var extend = require("extend");

module.exports = function(grunt, data) {
    var options = {
        cache: false,
        optimizationLevel: 6,
    },
    useJpg = [
        mozjpeg({
            quality: 95,
        }),
    ],
    useWebp = [
        webp({
            quality: 90
        }),
    ],
    config = {
        productionJpg: {
            options: {},
            files:[
                {
                    expand: true,
                    cwd: "src/assets/images/",
                    src: [
                        "**/*.{png,jpg,gif}"
                    ],
                    dest: "build/assets/images/"
                },
                {
                    expand: true,
                    cwd: "src/v1/images/",
                    src: [
                        "**/*.{png,jpg,gif}"
                    ],
                    dest: "build/v1/images/"
                },
            ]
        },
        productionWebp: {
            options: {},
            files: [],
        }
    };

    // use mozjpeg for jpg images
    extend(config.productionJpg.options, options, {use: useJpg});

    // use webp for webp images
    extend(config.productionWebp.options, options, {use: useWebp});

    // exclude v1 images from webp build
    config.productionWebp.files.push(config.productionJpg.files[0]);

    return config;
};