(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        viewName = "index.scrollspy",
        ui = {
            el: window,
            scrollWatch: ["#contact-circles-wrap", "#writing .article-items", "#intro"]
        },
        processedClass = "scrollspy-done",
        isUiCached = false,
        previousScrollTop = 0,
        previousDirection,
        cachedUi = {
            // developer: {
            //     el: "#developer",
            //     offset: null,
            //     _states: {}
            // }
            // writing: {
            //     trackEl: "#writing .article-items",
            // },
            // contact: {
            //     trackEl: "#contact-circles-wrap",
            //     offset: "elementHalf",
            //     onClass: "roll-in-right"
            // },
            // backToTop: {
            //     trackEl: "#intro",
            //     targetEl: "#back-to-top",
            //     offset: 0,
            //     onClass: "fade-in"
            // },
            // mainNav: {
            //     trackEl: "#content .main-article",
            //     targetEl: "#main-nav li",
            //     offset: 0,
            //     onClass: "active"
            // },
        },
        initSkrollr = function(){
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
        },
        // $(window).height();   // returns height of browser viewport
        // $(document).height(); // returns height of HTML document
        getTop = function(scrollTop){
            var watcher;
            for (var watcherName in cachedUi) {
                if (watcherName === "_general") {
                    return;
                }
                watcher = cachedUi[watcherName];
                // console.log("each", watcher, cachedUi);
                watcher._isPartiallyInViewPort = watcher.offset.top-scrollTop < cachedUi._general.viewport.height && watcher.offset.bottom-scrollTop > 0;

                // console.log(scrollTop, )
                if (watcher._ignore && !watcher._isPartiallyInViewPort) {
                    return;
                }

                if (watcher._isPartiallyInViewPort) {
                    watcher._ignore = false;
                    if (!watcher._triggers.isPartiallyInViewPort) {
                        console.log("trigger true for ", watcher.el);
                        watcher._triggers.isPartiallyInViewPort = true;
                        watcher.el.trigger("visibilityChanged", true);
                    }
                }
                else {
                    watcher._ignore = true;
                    watcher._triggers = {};
                    console.log("trigger false for ", watcher.el);
                    watcher.el.trigger("visibilityChanged", false);
                    return;
                }
            }
            // var viewportHeight = cachedUi._general.viewport.height,
            //     watcher = cachedUi["#photography"],
            //     elOffset = watcher.offset,
            //     elHeight = watcher.height;
                        // direction = scrollTop > previousScrollTop ? "down" : "up";
            // var registerPreviousScroll = function(){
            //     previousScrollTop = scrollTop;
            // };

                        // var bounds = el.getBoundingClientRect();
                        // offset = offset || 0;
                        // // console.log("offset", offset);
                        // return bounds.top + offset < window.innerHeight && bounds.bottom > 0;
            // var el = document.getElementById("developer").getBoundingClientRect();
                        // console.log("getTop", scrollTop, elOffset);
            // bounds.top < window.innerHeight && bounds.bottom > 0;

            // bound.top = elOffset-scrollTop;
            // console.log("bounds.top", el.top, elOffset-scrollTop);

            // window.innerHeight = viewportHeight
            // console.log("window.innerHeight", window.innerHeight, viewportHeight);

            // bounds.bottom = el.height + viewportHeight;
            // console.log("bounds.bottom", el.bottom, elOffset-scrollTop+cachedUi.developer.height);
            // console.log("isInViewPort", elOffset-scrollTop < viewportHeight && elOffset-scrollTop+cachedUi.developer.height > 0);

            // console.log("direction", direction);


            //
            // todo: compose if statements based on previous states (tochedTop, tochedBottom);
            // if (elOffset.top-scrollTop < viewportHeight) {
            //     console.log("what1");
            // }
            // if (elOffset.bottom-scrollTop > 0) {
            //     if (direction === "down") {
            //         if (!watcher._triggers.touchedTop) {
            //             console.log("touched top edge");
            //             watcher._triggers.touchedTop = true;
            //         }
            //     }
            //     if (direction === "up") {
            //         if (!watcher._triggers.touchedBottom) {
            //             console.log("touched bottom edge");
            //             watcher._triggers.touchedBottom = true;
            //         }
            //     }
            // }

            // console.log(elOffset.top - scrollTop, viewportHeight);
            // if (elOffset.top - scrollTop < viewportHeight) {
            //     console.log("above viewport");
            // }

            // this.isAboveViewport = this.top < exports.viewportTop;
            // this.isBelowViewport = this.bottom > exports.viewportBottom;

            // this.isInViewport = (this.top <= exports.viewportBottom && this.bottom >= exports.viewportTop);
            // this.isFullyInViewport = (this.top >= exports.viewportTop && this.bottom <= exports.viewportBottom) ||
            //                      (this.isAboveViewport && this.isBelowViewport);


                        // bottom vieport touched element top
                        // if (scrollTop+viewportHeight >= elOffset.top) {
                        //     console.log(direction, scrollTop, previousScrollTop);
                        //     if (!watcher._triggers.bottomViewportTouchedElTop && direction === "down") {
                        //         console.log("bottom viewport-el top");
                        //         watcher._triggers.bottomViewportTouchedElTop = true;
                        //     }
                        //     if (!watcher._triggers.topViewportTouchedElBottom && direction === "up") {
                        //         console.log("top viewport-el bottom");
                        //         watcher._triggers.topViewportTouchedElBottom = true;
                        //     }
                        // }
                        // // bottom viewport touched element bottom
                        // if (scrollTop+viewportHeight>= elOffset.top+elHeight) {
                        //     if (!watcher._triggers.touchedBottom) {
                        //         console.log("el bottom");
                        //         watcher._triggers.touchedBottom = true;
                        //     }
                        // }

                        // top viewport touched element top
                        // if (scrollTop >= elOffset.top && scrollTop < elOffset.top + elHeight * 0.3) {
                        //     // console.log("top viewport, el top, partially in viewport");
                        //     if (!watcher._triggers.touchedTop) {
                        //         console.log("el top");
                        //         watcher._triggers.touchedTop = true;
                        //     }
                        //     // cachedUi.developer._states.topViewportTouchedElTop = true;
                        //     // cachedUi.developer._states.partiallyInViewport = true;
                        //     // cachedUi.developer._states.fullyInViewport = false;
                        // }

                        // // top viewport touched element bottom
                        // if (scrollTop>= elOffset.top+cachedUi.developer.height && cachedUi.developer._states.partiallyInViewport) {
                        //     console.log("top viewport, el bottom, not in viewport");
                        //     cachedUi.developer._states.partiallyInViewport = false;
                        // }

                        // if (cachedUi.developer._states.touchedTop && cachedUi.developer._states.touchedBottom) {
                        //     console.log("fully in viewport");
                        // }
                        // if (cachedUi.developer._states.touchedTop || cachedUi.developer._states.touchedBottom) {
                        //     console.log("partially in viewport");
                        // }




            // registerPreviousScroll();

        },
        scrollHandler = function(){
            if (isUiCached) {
                getTop($(ui.el).scrollTop());
            }
        },
        cacheUi = function(){
            isUiCached = false;
            // console.log("cacheUi");
            var singleEl;
            cachedUi = {};
            // console.log(ui.scrollWatch);
            for (var i=0, len=ui.scrollWatch.length; i < len; i++) {
                singleEl = ui.scrollWatch[i];
                cachedUi[singleEl] = {};
                cachedUi[singleEl].el = $(singleEl);
                cachedUi[singleEl].height = cachedUi[singleEl].el.outerHeight();
                cachedUi[singleEl].offset = cachedUi[singleEl].el.offset();
                cachedUi[singleEl].offset.bottom = cachedUi[singleEl].offset.top + cachedUi[singleEl].height;
                cachedUi[singleEl]._ignore = true;
                cachedUi[singleEl]._triggers = {};
                // console.log(ui.scrollWatch[i]);
            }
            // for (var el in cachedUi) {
            //     singleEl = cachedUi[el];
            //     singleEl.el = $(singleEl.el);
            //     singleEl.offset = singleEl.el.offset();
            //     singleEl.height = singleEl.el.outerHeight();
            //     singleEl._states = {
            //         touchedTop: false,
            //         touchedBottom: false,
            //         isFullyInViewPort: false,
            //         isPartiallyInViewPort: false,
            //         // elementWatcher.isAboveViewport - true if any part of the element is above the viewport.
            //         // elementWatcher.isBelowViewport
            //     };
            // }
            cachedUi._general = {
                viewport: site.views.run("common", "viewPortDimensions")
            };

            console.log(cachedUi);
            isUiCached = true;

            // var elements = $(".scroll-spy");
            // elements.each(function(i, el){
            //     console.log(i, el);

            // });
        },
        onScroll = function(){
            // create a separate view with inView method
            // one scroll and shift processed element from the $el array?
            // none of that, use this - http://kristerkari.github.io/adventures-in-webkit-land/blog/2013/08/30/fixing-a-parallax-scrolling-website-to-run-in-60-fps/
            $(window).on("scroll.scrollspy", _.throttle(function(e){
                site.settings.requestAnimationFrame.call(window, scrollHandler);
            }, 500));

        },
        exports = {
            init: function(){
                $(ui.el).on("load resize", _.debounce(function(e){
                    cacheUi();
                }, 200));

                $(ui.el).on("load", function(e) {
                    onScroll();
                });

                $("#contact-circles-wrap").on("visibilityChanged", function(e, isVisible){
                    $("#contact-circles-wrap").addClass("roll-in-right");
                    if (isVisible) {
                        // ui.scrollWatch.splice(ui.scrollWatch.indexOf("#contact-circles-wrap"), 1);
                        // cacheUi();
                    }
                });
                $("#writing .article-items").on("visibilityChanged", function(e, isVisible){
                    $("#writing .article-items").addClass("fade-in-bottom");
                    if (isVisible) {
                        // ui.scrollWatch.splice(ui.scrollWatch.indexOf("#writing .article-items"), 1);
                        // cacheUi();
                    }
                });
                $("#intro").on("visibilityChanged", function(e, isVisible){
                    console.log("triggered intro", isVisible);
                    $("#back-to-top").toggleClass("fade-in", isVisible);
                });
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
