"use strict";

module.exports = {
    production: {
        options: {
            base: "./",
            css: [
                "build/assets/css/main.css",
            ],
            dimensions: [
                {
                    width: 320,
                    height: 480
                },
                {
                    width: 768,
                    height: 1024
                },
                {
                    width: 1280,
                    height: 960
                }
            ],
            inline: true,
            extract: true,
            minify: true,
            include: [
                /^\.loader/
            ],
        },
        src: "build/index.html",
        dest: "build/index.html",
    }
};
