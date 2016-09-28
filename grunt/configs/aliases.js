"use strict";

module.exports = {
    "default": [],

    "production": [
        "setEnvironmentVars",
        "eslint",
        "clean:productionPre",
        "copy:production",
        "imagemin:production",
        "compass:production",
        "postcss:production",
        "modernizr:production",
        "jquery:production",
        "removelogging:production",
        "uglify:production",
        "pug:production",
        "clean:productionPost",
        "htmlhint:production",
        "sitemap:production"
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
