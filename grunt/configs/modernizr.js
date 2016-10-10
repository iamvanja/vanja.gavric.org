"use strict";

module.exports = function(grunt, data) {
    var extend = require("extend"),
        defaults = {
            "cache" : true,
            "crawl": false,
            "customTests": [],
            "dest": "assets/js/vendor/modernizr.js",
            "tests": [
                "touchevents",
                "cssanimations",
                "cssfilters",
                "fontface",
                "csstransforms",
                "csstransforms3d",
                "csstransitions",
                "webp",
                "fullscreen",
            ],
            "options": [
                "domPrefixes",
                "prefixes",
                "mq",
                "prefixed",
                "prefixedCSS",
                "prefixedCSSValue",
                "testAllProps",
                "testProp",
                "testStyles",
                "html5printshiv",
                "setClasses"
            ],
            "uglify": true
        },
        config = {
            dev: {},
            production: {}
        };

    extend(config.dev, defaults, {uglify: false});
    extend(config.production, defaults, {cache: false});

    config.dev.dest = "src/" + config.dev.dest;
    config.production.dest = "build/" + config.production.dest;

    // console.log(config);

    return config;
};
