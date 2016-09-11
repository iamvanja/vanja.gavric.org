"use strict";

module.exports = {
    options: {
        cache: false
    },

    production: {
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
    }
};
