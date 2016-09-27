(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        viewName = "index",
        ui = {
            el: ".index",
            mainNav: "#main-nav",
        },
        isLoaded = $.Deferred(),
        onLoad = function(){
            $(window).on("load", function(e) {
                isLoaded.resolve();
            });
        },
        initHashClick = function(){
            $("a[href^=\"#\"]").on("click", function(e){
                e.preventDefault();
                var $this = $(this),
                    hash = $this.attr("href"),
                    offset = 0;

                if (!$("body").hasClass("last-section-smaller-than-viewport") && hash === "#contact") {
                    offset = site.views.run("common", "getDocumentHeight") - site.views.run("common", "getViewportDimensions").height;
                }
                else if (hash !== "#top") {
                    offset = $(hash).offset().top;
                    offset += offset * 0.01;
                }

                $("html, body").stop().animate({
                    scrollTop: offset
                }, 1000, function(){
                    e.preventDefault();
                    window.location.hash = hash !== "#top" ? hash : "";
                });
            });
        },
        triggerHash = function(){
            if (window.location.hash) {
                $("a[href=\""+ window.location.hash +"\"]").trigger("click");
            }
        },
        hideLoader = function(){
            var timer = $.Deferred();
            // show timer for at least 3.4s seconds
            window.setTimeout(function(){
                timer.resolve();
            }, 500);

            // when timer is finished and the page is loaded, remove loader
            $.when(timer, isLoaded).done(function(){
                $(window).on("view.common.showLoading.removed", function(){
                    $("body").addClass("animate-on-load");
                    triggerHash();
                });
                site.views.run("common", "showLoading", {toShow: false});
            });
        },
        exports = {
            init: function(){
                site.views.run("common", "showLoading", {toShow: true});
                $("body").removeClass("state-before-loader");

                onLoad();
                initHashClick();

                site.views.run("index.scrollspy", "init");
                site.views.run("index.developer", "init");
                site.views.run("index.photography", "init");
                site.views.run("index.writing", "init");
                site.views.run("index.contact", "init");

                hideLoader();
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
