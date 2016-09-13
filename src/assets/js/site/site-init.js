/*
* SITE control
* Version 1.1
*
* VG
*
*/

(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        $html = $("html"),
        getSettings = function(settings){
            var finalSettings = $.extend(true, {
                    controllerCallbacks: {},
                }, settings);

            return finalSettings;
        },
        getEnvVariables = function(settings) {
            settings.isProduction = $("meta[name=environment]").attr("content") !== "development";
            settings.isDbg = site.helpers.getParameterByName("isDbg") === "1";

            if (!settings.isProduction) {
                console.warn("You are in the development mode. Before publishing make sure to run %c\"grunt production\"", "background: #222; color: #31c50f");
            }

            settings.lang = $html.attr("lang");
            settings.locale = $html.attr("locale");
            settings.assetsUrl = {
                local: $("meta[name=local-url]").attr("content"),
                remote: $("meta[name=remote-url]").attr("content"),
            };
            // https://davidwalsh.name/css-animation-callback (comments)
            // https://coderwall.com/p/ey5a1w/standarise-transitionend
            // https://gist.github.com/depoulo/9dc8f59d791ec8f8e40c
            settings.transitionEnd = (!!window.WebKitAnimationEvent) ? "webkitTransitionEnd" : "transitionend";

            return settings;
        },
        init = function(settings){
            // extend settings
            site.settings = getSettings(settings);
            site.settings = getEnvVariables(site.settings);

            site.data = {};

            // kick it all off here
            $(document).ready(site.controller.loadEvents);
        };

    site.init = init;

})(this, this.document, jQuery);
