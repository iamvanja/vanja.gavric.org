var extend = require("extend");
var wdioConf = require("./wdio.conf.js");
var config = (true, {}, wdioConf.config);

// change baseUrl to the production build
config.baseUrl = config.baseUrl.replace("/src", "/build");

// remove firefox due to error:
// Permission denied to access property "_wrapped"
// (@todo: investigate further)
config.capabilities = config.capabilities.filter(function(browser) {
    return browser.browserName !== "firefox";
});

exports.config = config;
