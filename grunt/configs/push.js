"use strict";

module.exports = function(grunt) {
    grunt.registerTask("push", [
        "setEnvironmentVars",
        "gitIsDirty",
        "production",
        "choose"
    ]);
};
