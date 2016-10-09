(function(window, document, $, undefined) {
    "use strict";
    var site = window.SITE,
        viewName = "common",
        // ui = {},
        exports = {
            showLoading: function(options) {
                // @todo: fallback for no animation support
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
                    $loader.html("<div></div><div></div><div></div><div></div><h1 class=\"default\">"+ loadingText +"</h1><h1 class=\"alternative\">" + loadingTextAlt + "</h1>");
                    $loader.attr({
                        id: loaderId,
                        class: loaderId + " animate",
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
                    // remove loader in case transitionEnd event did not fire
                    window.setTimeout(function(){
                        $loader = $("#"+loaderId);
                        if ($loader.length) {
                            callback();
                        }
                    }, 3000);

                    $loader.removeClass("animate").addClass("exit");
                }
            },
            getViewportDimensions: function(){
                var e = window, a = "inner";

                if ( !( "innerWidth" in window ) ) {
                    a = "client";
                    e = document.documentElement || document.body;
                }

                return {
                    width : e[ a+"Width" ],
                    height : e[ a+"Height" ],
                };
            },
            getDocumentHeight: function() {
                var d = document;
                return Math.max(
                    d.body.scrollHeight, d.documentElement.scrollHeight,
                    d.body.offsetHeight, d.documentElement.offsetHeight,
                    d.body.clientHeight, d.documentElement.clientHeight
                );
            },
            lazyLoadImages: function(options){
                var $el = $(options.el) || $("body"),
                    isWebpSupported = $("html").hasClass("webp"),
                    src;
                $el.find("img.lazy").each(function(){
                    var $this = $(this);
                    src = $this.attr("data-lazysrc");
                    if ($this.attr("data-use-webp") === "true" && isWebpSupported) {
                        src = src.replace(".jpg", ".webp");
                    }

                    $this.attr("src", src);
                    $this.on("load", function(){
                        $this.addClass("loaded");
                    });
                });
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
