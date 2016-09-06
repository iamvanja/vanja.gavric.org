module.exports = function(grunt){
    require("jit-grunt")(grunt, {
        pug: "grunt-pug-i18n",
        removelogging: "grunt-remove-logging"
    });

    var settings = grunt.file.readJSON("settings.json"),
        credentials = grunt.file.readJSON(".credentials.json"),
        shell = require("shelljs"),
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
            },
            getExec: function(command) {
                return ""+((shell.exec(command).output).replace("\n", "")).replace(/\\/g, "/");
            },
            getProductionFiles: function(filesArr){
                var prodJsFiles = [];

                for (var i = 0, len = filesArr.length; i < len; i++) {
                    // replaces only first occurence, perfect for our use-case
                    prodJsFiles.push( filesArr[i].replace("src/", "build/") );
                }

                return prodJsFiles;
            },
        };

    grunt.initConfig({
        pkg: grunt.file.readJSON("package.json"),

        settings: settings,

        helpers: helpers,

        // HTML
        pug: {
            watch: {
                getLocale: function(){
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
        htmlhint: {
            watch: {
                options: {
                    "tag-pair": true,
                    "tagname-lowercase": true,
                    "attr-lowercase": true,
                    "attr-value-double-quotes": true,
                    "doctype-first": true,
                    "spec-char-escape": true,
                    "id-unique": true
                },
                src: settings.htmlWatchFiles
            },
            production: {
                options: "<%= htmlhint.watch.options %>",
                src: helpers.getProductionFiles(settings.htmlWatchFiles)
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
        removelogging: {
            production: {
                src: [
                    "build/assets/js/*.js"
                ]
            }
        },
        uglify: {
            options: {
                sourceMap: true,
                sourceMapIncludeSources: true
            },
            production: {
                files: [
                    {
                        dest: "build/assets/js/main.min.js",
                        src: helpers.getProductionFiles(settings.jsFiles)
                    },
                    {
                        expand: true,
                        cwd: "build/",
                        src: [
                            "assets/js/init-*.js",
                        ],
                        dest: "build/"
                    }
                ]
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

        // IMAGES
        imagemin: {
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
        },

        // VARIOUS
        clean: {
            productionPre: [
                "build"
            ],
            productionPost: [
                "build/assets/css/scss/**",
                "build/assets/js/foundation.min.js",
                "build/assets/js/main.js",
                "build/assets/pug-*/**"
            ]
        },
        copy: {
            production: {
                files: [
                    {
                        expand: true,
                        cwd: "src/",
                        src: [
                            "**",
                            ".htaccess",
                            "!old/**",
                            "!assets/js/foundation/**",
                            "!**/*.psd",
                            "!assets/css/main.css",
                            // "!_src/**",
                            // "!assets/_psd_other/**",
                        ],
                        dest: "build/"
                    }
                ]
            }
        },
        choose: {
            target: {
                options: {
                    message: "Please choose where to push:"
                },
                choices: {
                    "test-currentBranch": ["deploy:currentBranch", "postPush"],
                    "----------": "",
                    "production!": ["deploy:build", "postPush"]
                }
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
            html: {
                files: settings.htmlWatchFiles,
                tasks: ["htmlhint:watch"],
                options: {
                    // Start a live reload server on the default port 35729
                    livereload: true
                }
            },
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

    grunt.registerTask("setEnvironmentVars", "set environment variables", function() {
        var getExec = grunt.config.data.helpers.getExec,
            gitBranch = getExec("git rev-parse --abbrev-ref HEAD"),
            gitHash = getExec("git log -n 1 --pretty=format:\"%H\""),
            currentUser = getExec("git config user.name");

        if (gitBranch.trim() === "" || shell.exec("curl").code === 127) {
            grunt.log.errorlns("Please make sure `git` and `curl` are installed and in your $PATH.");
            return grunt.fail.fatal("Pushing without necessary tools is not allowed!");
        }
        grunt.config.set("environment", gitBranch === "master" ? "production" : "test-production ("+ gitBranch +")");
        grunt.config.set("gitBranch", gitBranch);
        grunt.config.set("gitHash", gitHash);
        grunt.config.set("currentUser", currentUser);
    });

    grunt.registerTask("gitIsDirty", "Checks if git staging is empty and ignores untracked files", function(){
        // Checks if there are no files currently in staging (important before doing an automated commit)
        // Fails entire push if that is the case
        var getExec = grunt.config.data.helpers.getExec,
            command = "git status --porcelain -uno",
            isDirty = !!(getExec(command));

        if (isDirty) {
            grunt.log.errorlns("Please make sure you comitted everything. Push is not possible because it creates inconsistency between the repo and the files on production.")
            return grunt.fail.fatal("No dirty pushing is allowed!");
        }

        return true;
    });

    grunt.task.registerTask("deploy", "Deploys using rsync", function(target) {
        var getExec = grunt.config.data.helpers.getExec,
            branch = grunt.config.get("gitBranch"),
            command = "mkdir -p <%=logFilePath%> && touch <%=logFile%> && rsync <%= src %> --rsync-path=\"mkdir -p <%= dest %> && rsync\" <%= user %>@<%= host %>:<%= dest %> --rsh 'ssh -p 2222' <%= args %> <%= exclude %>",
            options = {
                user: credentials.username,
                src: "build/",
                host: settings.deploy.host,
                logFilePath: settings.deploy.logFilePath,
                logFile: "<%=logFilePath%><%=logFilename%>.log",
                args: [
                    "--recursive",
                    "--delete",
                    "--progress",
                    "--compress",
                    "--human-readable",
                    "--log-file=<%=logFile%>",
                    // "--dry-run"
                ],
                exclude: [
                    "*.map",
                    "Thumbs.db",
                    ".DS_Store"
                ]
            },
            exec;

        if (target === "build") {
            if (branch !== "master") {
                grunt.fail.fatal("Pushing to production is only allowed on master branch!");
                return;
            }
            options.remoteAssetLocation = settings.deploy.productionPath;
            options.logFilename = "production";
        }
        else if (target === "currentBranch") {
            options.remoteAssetLocation = branch +"/"+ settings.deploy.productionPath;
            // get rid of the forward slash for Unix-Win consistency how task file is created
            options.logFilename = branch.replace(/\//g, "-");
        }
        else {
            grunt.fail.fatal("No specified target to push");
            return;
        }

        options.exclude.forEach(function(element, i, collection) {
            options.exclude[i] = "--exclude="+element;
        });
        options.args = options.args.join(' ');
        options.exclude = options.exclude.join(' ');
        options.dest = settings.deploy.serverDestination + options.remoteAssetLocation;

        command = grunt.template.process(command, {data: options});
        grunt.log.oklns("rsyncing "+ options.src +" >>>> "+ options.dest+"\n\n");
        grunt.log.oklns("current branch: "+ branch);

        grunt.log.writeln("\nexecuted: " + command);

        exec = shell.exec(command);
        if (exec.code !== 0) {
            grunt.log.writeln("\n"+"Deployment failed!".red);
            exit(1);
        }
        else {
            grunt.config.set("remoteAssetLocation", options.remoteAssetLocation);
            grunt.config.set("logFilename", options.logFilename);
            grunt.log.ok();
        }

        return;
    });

    grunt.registerTask("gitPushCommit", "Commit the ftpush json", function(){
        var command = grunt.template.process('git add <%=logFilePath%><%=logFilename%>.log && git commit -m "<%=environment%> push (from grunt)"', {data: {
                logFilePath: settings.deploy.logFilePath,
                logFilename: grunt.config.get("logFilename"),
                environment: grunt.config.get("environment"),
        }});

        shell.exec(command);
    });

    grunt.registerTask("postPushInfo", "Displays info", function(){
        grunt.log.oklns("Your files are in -> ",  settings.deploy.domainName + "/" + grunt.config.get("remoteAssetLocation") + "/");
    });

    grunt.registerTask("default", []);
    grunt.registerTask("production", [
        "setEnvironmentVars",
        // "jshint",
        "clean:productionPre",
        "copy:production",
        "imagemin:production",
        "compass:production",
        "postcss:production",
        "removelogging:production",
        "uglify:production",
        "pug:production",
        "clean:productionPost",
        "htmlhint:production"
    ]);

    grunt.registerTask("push", [
        "setEnvironmentVars",
        "gitIsDirty",
        "production",
        "choose"
    ]);

    grunt.registerTask("postPush", [
        // "rollBarSourceMaps",
        // "rollBarDeploy",
        "gitPushCommit",
        "postPushInfo"
    ]);
}
