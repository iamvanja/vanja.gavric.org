"use strict";

module.exports = function(grunt) {
    grunt.registerTask("gitIsDirty", "Checks if git staging is empty and ignores untracked files", function(){
        // Checks if there are no files currently in staging (important before doing an automated commit)
        // Fails entire push if that is the case
        var getExec = grunt.config.data.helpers.getExec,
            command = "git status --porcelain -uno",
            isDirty = !!(getExec(command));

        if (isDirty) {
            grunt.log.errorlns("Please make sure you comitted everything. Push is not possible because it creates inconsistency between the repo and the files on production.")
            return grunt.fail.fatal("No dirty pushing is allowed!");
        }

        return true;
    });
};
