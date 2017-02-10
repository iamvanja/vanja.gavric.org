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
        "rollbar",
        "gitPushCommit",
        "postPushInfo"
    ],

    "push": [
        "setEnvironmentVars",
        "gitIsDirty",
        "production",
        "webdriver:production",
        "choose"
    ]
};
