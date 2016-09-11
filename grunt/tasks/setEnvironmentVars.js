"use strict";

var shell = require("shelljs");

module.exports = function(grunt) {
    grunt.registerTask("setEnvironmentVars", "Sets environment variables", function() {
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
};
