"use strict";

module.exports = function(grunt, data) {
    var config = {
        watch: {
            options: {
                "tag-pair": true,
                "tagname-lowercase": true,
                "attr-lowercase": true,
                "attr-value-double-quotes": true,
                "doctype-first": true,
                "spec-char-escape": true,
                "id-unique": true
            },
            src: data.settings.htmlWatchFiles
        },
        production: {
            options: "<%= htmlhint.watch.options %>",
            src: data.helpers.getProductionFiles(data.settings.htmlWatchFiles)
        }
    };

    return config;
};
