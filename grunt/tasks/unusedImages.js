"use strict";

module.exports = function(grunt) {
    // Find unused images
    grunt.registerTask("unusedImages", function(){
        var assets = [],
            links = [];

        // Get list of images
        grunt.file.expand({
            filter: "isFile",
            cwd: "build/assets/images/" // Change this to your images dir
        }, ["**/*"]).forEach(function(file){
            assets.push(file);
        });

        // Find images in content
        grunt.file.expand({
            filter: "isFile",
        }, ["build/assets/js/all.js", "build/assets/css/*.css", "build/*.html", ]).forEach(function(file){ // Change this to narrow down the search
            var content = grunt.file.read(file);
            assets.forEach(function(asset){
                if(content.search(asset) !== -1){
                    links.push(asset);
                }
            });
        });

        // Output unused images
        var unused = grunt.util._.difference(assets, links);
        console.log("Found "+ unused.length +" unused images:\n");
        unused.forEach(function(el){
            console.log(el);
        });
    });
};


