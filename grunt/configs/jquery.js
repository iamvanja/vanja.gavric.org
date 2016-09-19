"use strict";

module.exports = {
    dev: {
      options: {
        prefix: "jquery-",
        minify: false
      },
      output: "src/assets/js/vendor",
      versions: {
        // Remove everything we don't need from 2.x versions
        "2.1.1": [ "ajax", "deprecated", "wrap", ],
      }
    }
};
