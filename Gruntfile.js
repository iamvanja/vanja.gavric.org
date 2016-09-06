module.exports = function(grunt){
    require("jit-grunt")(grunt, {
        pug: "grunt-pug-i18n"
    });

    var settings = grunt.file.readJSON("settings.json"),
        helpers = {
            pugData: function(options) {
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
            }
        };

    grunt.initConfig({
        pkg: grunt.file.readJSON("package.json"),

        settings: settings,

        helpers: helpers,

        // HTML
        pug: {
            watch: {
                getLocale: function(){
                    console.log("getLocale");
                   return "src/assets/pug-data/locales/"+ (grunt.option("locale") || "*") +".json";
                },
                options: {
                    data: function(){
                        return helpers.pugData({ isProduction: false });
                    },
                    pretty: "    ",
                    // pug i18n specific options
                    i18n: {
                        locales: "<%= pug.watch.getLocale() %>",
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
                        return helpers.pugData({ isProduction: true });
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
        },

        // JS
        concat: {
            // options: {
            //     separator: ";",
            // },
            watch: {
                dest: "src/assets/js/main.min.js",
                src: settings.jsFiles
            }
        },

        // CSS
        compass: {
            watch: {
                options: {
                    // httpPath: "/",
                    cssDir: "src/assets/css",
                    sassDir: "src/assets/css/scss",
                    imagesDir: "src/assets/images",
                    javascriptsDir: "src/assets/js",
                    outputStyle: "expanded",
                    relativeAssets: true
                }
            },
            production: {
                options: {
                    // httpPath: "/",
                    cssDir: "build/assets/css",
                    sassDir: "build/assets/css/scss",
                    imagesDir: "build/assets/images",
                    javascriptsDir: "build/assets/js",
                    outputStyle: "compressed",
                    relativeAssets: true
                }
            }
        },

        postcss: {
            options: {
                processors: [
                    require("autoprefixer")({
                        browsers: [
                            "> 1%",
                            "last 5 versions"
                        ]
                    })
                ]
            },
            watch: {
                src: "src/assets/css/main.css"
            },
            production: {
                src: "build/assets/css/main.css"
            }
        },

        watch: {
            // options: {
            //     atBegin: true
            // },
            // onInit: {
            //     files: [],
            //     tasks: ["clean:preWatch"]
            // },
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
                    livereload: true
                }
            },
            // html: {
            //     files: "<%= htmlWatchFiles.watch %>",
            //     tasks: ["htmlhint:watch"],
            //     options: {
            //         // Start a live reload server on the default port 35729
            //         livereload: true
            //     }
            // },
            css: {
                files: ["src/assets/css/scss/**/*.scss"],
                tasks: ["compass:watch", "postcss:watch"],
                // tasks: ["compass:watch"],
                options: {
                    // Start a live reload server on the default port 35729
                    livereload: true
                }
            },
            js: {
                files: "<%= settings.jsFiles %>",
                // tasks: ["eslint", "concat:watch"],
                tasks: ["concat:watch"],
                options: {
                    // Start a live reload server on the default port 35729
                    livereload: true
                }
            }
        }
    });
}
