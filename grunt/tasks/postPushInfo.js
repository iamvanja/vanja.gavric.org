"use strict";

module.exports = function(grunt) {
    var settings = grunt.config.get("settings");
    grunt.registerTask("postPushInfo", "Displays deployment URL", function(){
        grunt.log.oklns("Your files are in -> " + settings.deploy.domainName + "/" + grunt.config.get("remoteAssetLocation") + "/");
    });
};
