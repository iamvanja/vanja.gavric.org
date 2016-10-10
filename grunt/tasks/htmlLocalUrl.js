"use strict";

module.exports = function(grunt) {
    // Find unused images
    grunt.registerTask("htmlLocalUrl", "Dynamically updates assets url to fix grunt-critical output of inlined css", function(environment) {
        var fs = require("fs"),
            settings = grunt.config.get("settings"),
            file = "build/index.html",
            content, editedContent;

        grunt.log.oklns("Updating local asset on file: "+ file);
        // read file
        content = fs.readFileSync(file, "utf8");
        // fix path - replaces `url(/build/assets/` with local path
        editedContent = content.replace(/url\(\/build\/assets\//g, `url(${settings.assetsUrl.local}`);

        // save file
        fs.writeFileSync(file, editedContent, "utf8");
    });
};


