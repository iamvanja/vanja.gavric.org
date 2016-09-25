(function(window, document, $, undefined) {
    "use strict";
    var site = window.SITE,
        viewName = "common",
        // ui = {},
        // https://github.com/Josh-Miller/isInViewport
        // used by `isInView` and `inView`
        // forked due to module.exports
        _inView = function(el, offset) {
            var bounds = el.getBoundingClientRect();
            offset = offset || 0;
            // console.log("offset", offset);
            return bounds.top + offset < window.innerHeight && bounds.bottom > 0;
        },
        exports = {
            showLoading: function(options) {
                // @todo: fallback for not animation support
                var loaderId = "loader",
                    loadingText = $("meta[name=loading-text]").attr("content"),
                    loadingTextAlt = $("meta[name=loading-text-alt]").attr("content"),
                    $loader;

                if (options.toShow) {
                    if (document.getElementById("loader")){
                        console.log("Loader already shown!");
                        return;
                    }
                    $loader = $("<div />").addClass(loaderId);
                    $loader.html("<div></div><div></div><div></div><div></div><h1 class=\"default\">"+ loadingText +"...</h1><h1 class=\"alternative\">" + loadingTextAlt + "</h1>");
                    $loader.attr({
                        id: loaderId,
                        class: loaderId + " animate"
                    });
                    // append loader and trigger layout
                    $("body").append($loader).height();

                    $loader.addClass("animate-headers");
                }
                else {
                    $loader = $("#"+loaderId);
                    var callback = function(){
                        $loader.remove();
                        $(window).trigger("view.common.showLoading.removed");
                    };
                    $loader.one(site.settings.transitionEnd, function(){
                        callback();
                    });
                    window.setTimeout(function(){
                        $loader = $("#"+loaderId);
                        if ($loader.length) {
                            callback();
                        }
                    }, 3000);

                    $loader.removeClass("animate").addClass("exit");
                }
            },
            viewPortDimensions: function(){
                var e = window, a = "inner";

                if ( !( "innerWidth" in window ) ) {
                    a = "client";
                    e = document.documentElement || document.body;
                }

                return {
                    width : e[ a+"Width" ],
                    height : e[ a+"Height" ]
                };
            },
            lazyLoadImages: function(options){
                var $el = $(options.el) || $("body");
                $el.find("img.lazy").each(function(){
                    $(this).attr("src", $(this).attr("data-lazysrc"));
                });
            },
            inView: function(options) {
                for (var i=0; i<options.el.length; i++) {
                    if (_inView(options.el[i], options.offset)) {
                        return options.cb(options.el);
                    }
                }
            },
            isInView: function(options) {
                for (var i=0; i<options.el.length; i++) {
                    return _inView(options.el[i], options.offset);
                };
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
