"use strict";

var shell = require("shelljs");

module.exports = function(grunt) {
    var settings = grunt.config.get("settings"),
        helpers = grunt.config.get("helpers");

    grunt.task.registerTask("deploy", "Deploys using rsync", function(target) {
        var getExec = helpers.getExec,
            branch = grunt.config.get("gitBranch"),
            command = "mkdir -p <%=logFilePath%> && touch <%=logFile%> && rsync <%= src %> --rsync-path=\"mkdir -p <%= dest %> && rsync\" <%= user %>@<%= host %>:<%= dest %> --rsh 'ssh -p 22' <%= args %> <%= exclude %>",
            options = {
                user: grunt.config.get("credentials").username,
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
                exclude: settings.deploy.exclude,
            },
            exec;

        if (target === "build") {
            if (branch !== "master") {
                grunt.fail.fatal("Pushing to production is only allowed on master branch!");
                return;
            }
            options.remoteAssetLocation = settings.deploy.productionPath;
            options.logFilename = "production";
            // do not delete features dir from features branches
            options.exclude.push("features/");
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
        options.args = options.args.join(" ");
        options.exclude = options.exclude.join(" ");
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
};
