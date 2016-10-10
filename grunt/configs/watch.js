"use strict";
module.exports = {
    options: {
        atBegin: true
    },
    onInit: {
        files: [],
        tasks: ["copy:npmAssetsDev", "jquery:dev", "lodash:dev", "modernizr:dev"]
    },
    pug: {
        files: [
            "src/assets/pug-templates/**/*.pug",
            "src/assets/pug-templates/**/*.html",
            "src/*.pug",
            "src/assets/pug-data/locales/*.json",
            "settings.json"
        ],
        tasks: ["pug:watch"],
        options: {
            // Start a live reload server on the default port 35729
            // livereload: true
        }
    },
    html: {
        files: "<%= settings.htmlWatchFiles %>",
        tasks: ["htmlhint:watch"],
        options: {
            // Start a live reload server on the default port 35729
            livereload: true
        }
    },
    css: {
        files: ["src/assets/scss/**/*.scss"],
        tasks: ["compass:watch", "postcss:watch"],
        options: {
            // Start a live reload server on the default port 35729
            livereload: true
        }
    },
    js: {
        files: "<%= settings.jsFiles %>",
        tasks: ["eslint", "concat:watch"],
        options: {
            // Start a live reload server on the default port 35729
            livereload: true
        }
    }
};
