"use strict";

module.exports = function(grunt, data) {
    var extend = require("extend"),
        defaults = {
            options: {
                // httpPath: "/",
                cssDir: "src/assets/css",
                sassDir: "src/assets/scss",
                imagesDir: "src/assets/images",
                javascriptsDir: "src/assets/js",
                outputStyle: "expanded",
                relativeAssets: true,
                raw: "Sass::Script::Number.precision = 3\n",
                importPath: "node_modules/foundation-sites/scss/",
                require: [
                    "ceaser-easing"
                ]
            }
        },
        config = {
            watch: {},
            production: {}
        };

    extend(true, config.watch, defaults);
    extend(true, config.production, defaults);
    config.production.options.outputStyle = "compressed";

    var propertiesToReplace = ["cssDir", "sassDir", "imagesDir", "javascriptsDir"];
    propertiesToReplace.forEach(function(element) {
        config.production.options[element] = config.production.options[element].replace("src/", "build/");
    });

    // console.log(config);

    return config;
};

