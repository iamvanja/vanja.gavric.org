"use strict";

module.exports = function(grunt, data) {
    console.log("hahaha", data);
    var defaults = {
            options: {
                prefix: "jquery-",
                minify: false
            },
            output: "/assets/js/vendor",
            versions: {
                // Remove everything we don't need from 2.x versions
                "2.1.1": [ "ajax", "deprecated", "wrap", ],
            }
        },
        config = {
            dev: {
                options: {
                    prefix: defaults.options.prefix,
                    minify: false,
                },
                output: "src" + defaults.output,
                versions: defaults.versions
            },
            production: {
                options: {
                    prefix: defaults.options.prefix,
                    minify: true,
                },
                output: "build" + defaults.output,
                versions: defaults.versions
            }
        };

    return config;
};
