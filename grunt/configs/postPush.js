"use strict";

module.exports = function(grunt) {
    grunt.registerTask("postPush", [
        // "rollBarSourceMaps",
        // "rollBarDeploy",
        "gitPushCommit",
        "postPushInfo"
    ]);
};
