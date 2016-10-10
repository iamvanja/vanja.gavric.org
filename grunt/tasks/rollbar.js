"use strict";
var shell = require("shelljs");

module.exports = function(grunt, data) {
    grunt.registerTask("rollbar", "Executes Rollbar tasks if requested", function(){
            if (grunt.config.data.credentials.rollbarServerToken) {
                grunt.task.run(["rollBarSourceMaps", "rollBarDeploy"]);
            }
            else {
                grunt.log.oklns("Skipping pushing source maps to Rollbar...");
            }
            grunt.log.ok();
    });

    grunt.registerTask("rollBarSourceMaps", "Upload source map files to Rollbar", function() {
        var config = grunt.config.get(),
            getCommandString = function(filename) {
                var command = `curl -s https://api.rollbar.com/api/1/sourcemap/ \
                    -F access_token="${config.credentials.rollbarServerToken}" \
                    -F version="${config.gitHash}" \
                    -F minified_url=https://${config.settings.deploy.domainName}/${config.remoteAssetLocation}assets/js/${filename.replace('.map', '')} \
                    -F source_map=@build/assets/js/${filename} > /dev/null`;

                return command;
            },
            sourceMaps = [];

        // get source map files
        grunt.file.recurse("build/assets/js/", function(abspath, rootdir, subdir, filename) {
            if (!subdir && filename && (/\.(js.map)$/i).test(filename)) {
                sourceMaps.push(filename);
            }
        });
        grunt.log.ok("Found "+ sourceMaps.length +" source maps.");

        for (var i=0, len = sourceMaps.length; i < len; i++) {
            grunt.log.writeln("\n");
            grunt.log.oklns("Uploading "+ sourceMaps[i]);
            shell.exec(getCommandString(sourceMaps[i]));
            // console.log(getCommandString(sourceMaps[i]));
            // grunt.log.oklns("\n\n\n");
        }
        grunt.log.ok();
    });


    grunt.registerTask("rollBarDeploy", "Post deploy record to Rollbar", function() {
        var config = grunt.config.get(),
            command = `curl -s https://api.rollbar.com/api/1/deploy/ \
              -F access_token="${config.credentials.rollbarServerToken}" \
              -F environment="${config.environment}" \
              -F revision="${config.gitHash}" \
              -F local_username="${config.currentUser}" > /dev/null`;

        // console.log(command);
        shell.exec(command);
        grunt.log.ok();
    });
};


