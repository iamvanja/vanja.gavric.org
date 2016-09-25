"use strict";

module.exports = {
    "dev": {
        // output location
        "dest": "src/assets/js/vendor/lodash.build.js",
        "options": {
            // modifiers for prepared builds
            // modern, strict, compat
            // also accepts an array to allow combination with "strict"
            // "modifier": "modern",
            // "modularize": true,
            "include": ["throttle", "debounce"],
            // "category": ["collection", "function"],
            // "exports": ["global"],
            // "iife": "!function(window,undefined){%output%}(this)",
            // "minus": ["result", "shuffle"],
            // "plus": ["random", "template"],
            // "template": "./*.jst",
            // "settings": "{interpolate:/\\{\\{([\\s\\S]+?)\\}\\}/g}",
            // "moduleId": "underscore",
            // with or without the --
            // these are the only tested options,
            // as the others don’t make sense to use here
            // "flags": [
            //   "--stdout",
            //   "development",
            //   "--production",
            //   "source-map"
            // ],
        }
    }
};
