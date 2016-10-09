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
            cache: false,
            inline: true,
            // @todo: research why extract does not work
            extract: true,
            minify: false,
            include: [
                /^\.loader/,
            ],
            ignore: [
                /select/,
                /.writing/,
                ".index .back-to-top"
            ],
        },
        src: "build/index.html",
        dest: "build/index.html",
    }
};
