"use strict";

module.exports = function(grunt, data) {
    var settings = data.settings,
        pugData = function(options) {
            options = options || {};
            var data = settings,
                preparedData = {},
                keys = {
                    environment: "development"
                };

            if (options.isProduction) {
                keys.environment = "production";
            }

            // deep copy our new obj
            for (var prop in data) {
                preparedData[prop] = data[prop];
            }

            preparedData.slider = data.products;
            // preparedData.camelProductName = grunt.config.data.helpers.camelize(data.productName);

            preparedData.environment = options.isProduction ? grunt.config.get("environment") : "development";
            preparedData.gitHash = grunt.config.get("gitHash");

            // console.log("done", preparedData, data);
            return preparedData;
        },
        getLocale = function(){
           return "src/assets/pug-data/locales/"+ (grunt.option("locale") || "*") +".json";
        },
        config = {
            watch: {
                options: {
                    data: function(){
                        return pugData({ isProduction: false });
                    },
                    pretty: "    ",
                    // pug i18n specific options
                    i18n: {
                        locales: getLocale(),
                        namespace: "$i18n"
                    }
                },
                files: [{
                    expand: true,
                    cwd: "src/assets/pug-templates/pages",
                    src: settings.htmlPages,
                    dest: "src/"
                }]
            },
            production: {
                options: {
                    data: function(){
                        return pugData({ isProduction: true });
                    },
                    pretty: false,
                    // pug i18n specific options
                    i18n: {
                        locales: "src/assets/pug-data/locales/*.json",
                        namespace: "$i18n"
                    }
                },
                files: [{
                    expand: true,
                    cwd: "build/assets/pug-templates/pages",
                    src: settings.htmlPages,
                    dest: "build/"
                }]
            }
    };

    return config;
};
