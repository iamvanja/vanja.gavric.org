"use strict";

module.exports = {
    "default": [],

    "production": [
        "setEnvironmentVars",
        "eslint",
        "clean:productionPre",
        "copy:production",
        "imagemin",
        "compass:production",
        "postcss:production",
        "modernizr:production",
        "jquery:production",
        "removelogging:production",
        "uglify:production",
        "pug:production",
        "clean:productionPost",
        "critical:production",
        "htmlLocalUrl",
        "htmlhint:production",
        "sitemap:production",
        "unusedImages"
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
