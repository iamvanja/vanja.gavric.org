"use strict";

module.exports = {
    "default": [],

    "production": [
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
    ],

    "postPush": [
        // "rollBarSourceMaps",
        // "rollBarDeploy",
        "gitPushCommit",
        "postPushInfo"
    ],

    "push": [
        "setEnvironmentVars",
        "gitIsDirty",
        "production",
        "choose"
    ]
};
