(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        viewName = "index",
        ui = {
            el: ".index",
            mainNav: "#main-nav",
        },
        isSkrollrAllowed = false,
        skrollrInstance = false,
        skrollInitObj = {},
        isLoaded = $.Deferred(),
        initSkrollr = function(){
            if (window.skrollr){
                isSkrollrAllowed = Modernizr.csstransforms3d;
                skrollInitObj = {
                    forceHeight : false,
                    mobileDeceleration : 1,
                    render : function(info){
                        // console.log(info);
                        //Console log
                        // $("#console").empty().append("Scrolled: " + info.curTop + "<br /> Total: " + info.maxTop);

                        // when header is shown
                        // if (info.curTop <= $(ui.intro).outerHeight()) {
                        //     // hide any active nav item
                        //     App.elements.$mainNav.find("li").removeClass("active");

                        //     // hide back to top arrow
                        //     App.elements.$backToTop.fadeOut();

                        //     // show menu
                        //     App.elements.$mainNavUl.css({
                        //         "margin-left" : 0
                        //     });
                        // }
                        // // header is hidden
                        // else {
                        //     // show back to top arrow
                        //     App.elements.$backToTop.fadeIn();

                        //     // hide menu
                        //     App.elements.$mainNavUl.css({
                        //         "margin-left" : "-100%"
                        //     });
                        // }

                        // // when developer is shown
                        // if (info.curTop >= this.relativeToAbsolute(document.getElementById("developer"), "top", "top")) {
                        //     // show developer active in the menu
                        //     App.elements.$mainNav.find("li:eq(0)").addClass("active").siblings().removeClass("active");
                        // }
                        // if (info.curTop >= this.relativeToAbsolute(document.getElementById("photography"), "top", "top")) {
                        //     App.elements.$mainNav.find("li:eq(1)").addClass("active").siblings().removeClass("active");
                        // }
                        // if (info.curTop+10 >= this.relativeToAbsolute(document.getElementById("writing"), "top", "top")) {
                        //     App.elements.$mainNav.find("li:eq(2)").addClass("active").siblings().removeClass("active");
                        // }
                        // if (info.curTop === info.maxTop) {
                        //     App.elements.$mainNav.find("li:eq(3)").addClass("active").siblings().removeClass("active");
                        // }
                    }
                };
            }

            if (isSkrollrAllowed) {
                skrollrInstance = skrollr.init( skrollInitObj );
            }
        },
        onLoad = function(){
            $(window).on("load", function(e) {
                isLoaded.resolve();
            });
        },
        initHashClick = function(){
            $("a[href^=\"#\"]").on("click", function(e){
                e.preventDefault();
                // alert($(this).attr("href"));
                var $this = $(this),
                    hash = $this.attr("href"),
                    offset = 0,
                    parent = $this.parent("li");
                    // isMobile = $("html").hasClass("skrollr-mobile");

                // if (isMobile) {
                //     if (App.variables.skrollrInstance !== false && hash === "#top"){
                //         App.variables.skrollrInstance.setScrollTop(offset);
                //     }
                //     return;
                // }

                if (hash === "#contact") {
                    var viewport = site.views.run("common", "viewPortDimensions");
                    offset = $(document).height() - viewport.height;
                }
                else if (hash !== "#top") {
                    offset = $(hash).offset().top;
                }

                if (!$("html, body").is(":animated")) {
                    $("html, body").animate({
                        scrollTop: offset
                    }, 1600).promise().done(function(){
                        // alert("done")
                        $(ui.mainNav).find("li").removeClass("active");
                        if (parent.length) {
                            parent.addClass("active");
                        }

                        window.location.hash = hash !== "#top" ? hash : "";
                    });
                }
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

                onLoad();
                // initSkrollr();
                initHashClick();

                site.views.run("index.developer", "init");
                site.views.run("index.photography", "init");
                site.views.run("index.writing", "init");
                site.views.run("index.contact", "init");

                hideLoader();
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
