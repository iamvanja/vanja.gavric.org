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
                    scrollTop: offset,
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
        onHashChange = function(){
            $(window).on("hashchange", function(e){
                // setTimeout to ensure it fires after the scroll events
                // that might override this
                window.setTimeout(function(){
                    exports.setMainNavCategoryActive({
                        $el: $(ui.mainNav),
                        categoryName: window.location.hash.replace("#", ""),
                    });
                }, 150);
            });
        },
        hideLoader = function(){
            var timer = $.Deferred();
            var initiatePostLoader = function() {
                $("body").addClass("animate-on-load");
                triggerHash();
            };
            // show timer for at least 500ms seconds
            window.setTimeout(function(){
                timer.resolve();
            }, 500);

            // if loader is not shown
            if (!$("#loader").length) {
                initiatePostLoader();
            }
            else {
                // when timer is finished and the page is loaded, remove loader
                $.when(timer, isLoaded).done(function(){
                    $(window).on("view.common.showLoading.removed", function(){
                        initiatePostLoader();
                    });
                    site.views.run("common", "showLoading", {toShow: false});
                });
            }

        },
        exports = {
            init: function(){
                onLoad();
                onHashChange();
                initHashClick();

                site.views.run("index.scrollspy", "init");
                site.views.run("index.developer", "init");
                site.views.run("index.photography", "init");
                site.views.run("index.writing", "init");
                site.views.run("index.contact", "init");

                hideLoader();
            },
            setMainNavCategoryActive: function(options) {
                options.categoryName = options.categoryName ? "."+options.categoryName : "";
                options.$el.find("li"+options.categoryName)
                    .addClass("active")
                    .siblings().removeClass("active");
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
