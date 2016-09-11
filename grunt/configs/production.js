"use strict";

module.exports = function(grunt) {
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
};
