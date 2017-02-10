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
            ]
        },
        productionWebp: {
            options: {},
            files: [],
        },
        mainBg: {
            options: {},
            expand: true,
            cwd: "src/assets/images/",
            src: [
                "bg.jpg"
            ],
            dest: "build/assets/images/"
        }
    };

    // use mozjpeg for jpg images
    extend(config.productionJpg.options, options, {use: useJpg});

    // use webp for webp images
    extend(config.productionWebp.options, options, {use: useWebp});

    config.productionWebp.files.push(config.productionJpg.files[0]);

    extend(config.mainBg.options, options, { use: [mozjpeg({quality: 85})] });

    return config;
};
