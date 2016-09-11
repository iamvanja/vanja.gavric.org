"use strict";

module.exports = {
    target: {
        options: {
            message: "Please choose where to push:"
        },
        choices: {
            "test-currentBranch": ["deploy:currentBranch", "postPush"],
            "----------": "",
            "production!": ["deploy:build", "postPush"]
        }
    }
};
