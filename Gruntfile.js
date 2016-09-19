"use strict";

var path = require("path"),
    shell = require("shelljs");

module.exports = function(grunt) {
    var settings = grunt.file.readJSON("settings.json"),
        credentials = grunt.file.readJSON(".credentials.json"),
        helpers = {
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

    require("load-grunt-config")(grunt, {
        configPath: path.join(process.cwd(), "grunt/configs"),
        data: {
            settings: settings,
            helpers: helpers,
            credentials: credentials
        },
        jitGrunt: {
            // here you can pass options to jit-grunt (or just jitGrunt: true)
            staticMappings: {
                // here you can specify static mappings, for example:
                removelogging: "grunt-remove-logging",
                jquery: "grunt-jquery-builder",
            },
            customTasksDir: "grunt/tasks"
        },
    });
};
