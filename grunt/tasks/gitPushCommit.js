"use strict";

module.exports = function(grunt) {
    var settings = grunt.config.get("settings"),
        shell = require("shelljs")

    grunt.registerTask("gitPushCommit", "Commit the ftpush json", function(){
        var command = grunt.template.process('git add <%=logFilePath%><%=logFilename%>.log && git commit -m "<%=environment%> push (from grunt)"', {data: {
                logFilePath: settings.deploy.logFilePath,
                logFilename: grunt.config.get("logFilename"),
                environment: grunt.config.get("environment"),
        }});

        shell.exec(command);
    });
};
