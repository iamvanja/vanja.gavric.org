(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        viewName = "index.scrollspy",
        processedClass = "spy-processed",
        ui = {
            el: window,
            scrollUi: {
                mainNav: {
                    selector: "#main-nav",
                },
                backToTop: {
                    selector: "#back-to-top",
                },
                intro: {
                    selector: "#intro",
                },
                articles: {
                    selector: "#content .main-article",
                },
                animateOnScroll: {
                    selector: ".spy:not(."+ processedClass +")",
                },
                // parallax: {
                //     selector: "#photography .backstretch-wrap",
                // },
            },
        },
        isUiCached = false,
        cachedUi = {},
        previousScrollTop = 0,
        scrollDirection = "down",
        updateMainNavPerSection = function(scrollTop, isIntroShown) {
            var lastArticleId = cachedUi.articles[cachedUi.articles.length-1].id,
                activeArticleClass = "";

            if (!isIntroShown) {
                cachedUi.articles.forEach(function(el, i, arr){
                    if (scrollTop >= el.offset.top && scrollTop < el.offset.bottom) {
                        activeArticleClass = el.id;
                    }
                });

                // take care of the contact section (or last section)
                // if the element top does not hit the viewport top
                if (scrollTop + cachedUi._general.viewport.height >= cachedUi._general.documentHeight - 100 && activeArticleClass !== lastArticleId) {
                    activeArticleClass = lastArticleId;
                }
            }

            site.views.run("index", "setMainNavCategoryActive", {
                $el: cachedUi.mainNav.$el,
                categoryName: activeArticleClass,
            });
        },
        showHideMainNav = function(scrollTop) {
            // Further decrease unnecessary computation
            if (Math.abs(previousScrollTop - scrollTop) <= 5) {
                return;
            }

            var isScrollingDown = scrollDirection === "down";
            cachedUi.mainNav.$el.toggleClass("scroll-down", isScrollingDown)
                                .toggleClass("scroll-up", !isScrollingDown);
        },
        animateOnScroll = function(scrollTop) {
            var namespace = "animateOnScroll",
                elements = cachedUi[namespace];

            if (!elements) {
                console.log("All elements are already animated.");
                return;
            }

            elements = $.isArray(elements) ? elements : [elements];

            elements.forEach(function(element, i, arr){
                if (scrollTop + cachedUi._general.viewport.height - element.userOffset >= element.offset.top && scrollTop < element.offset.bottom) {
                    element.$el.addClass(element.$el.attr("data-spy-class") + " " + processedClass);
                    $(ui.el).trigger("recacheUi");
                }
            });
        },
        // cssTransform = Modernizr.prefixed("transform"),
        // doParallax = function(scrollTop) {
        //     var element = cachedUi.parallax,
        //         yAxis = 0,
        //         cssObj = {};

        //     // for this to be functional, set .backstretch-wrap to `height:130%` in index.photography.scss
        //     if (scrollTop + cachedUi._general.viewport.height >= element.offset.top && scrollTop < element.offset.bottom) {

        //         yAxis = (0 - ((scrollTop - element.offset.top) * -0.1))+"px";
        //         cssObj[cssTransform] = "translate3d(0,"+yAxis+",0)";
        //         element.$el.css(cssObj);
        //     }
        // },
        onScroll = function(scrollTop) {
            var isIntroShown = scrollTop <= cachedUi.intro.height;

            scrollDirection = scrollTop >= previousScrollTop ? "down" : "up";

            // back-to-top
            cachedUi.backToTop.$el.toggleClass("fade-in", !isIntroShown);

            // sections
            updateMainNavPerSection(scrollTop, isIntroShown);

            // hide main nav when scrolling down
            // show main nav when scrolling up
            showHideMainNav(scrollTop);

            // animations on scroll
            animateOnScroll(scrollTop);

            // do parallax
            // doParallax(scrollTop);

            previousScrollTop = scrollTop;
        },
        scrollHandler = function(e){
            if (isUiCached) {
                onScroll($(ui.el).scrollTop());
            }
        },
        cacheUi = function(){
            var getOptions = function($el) {
                    var obj = {
                        $el: $el,
                        offset: $el.offset(),
                        height: $el.outerHeight(),
                        id: $el.attr("id"),
                        userOffset: parseInt($el.attr("data-spy-offset"), 10) || 0,
                    };
                    obj.offset.bottom = obj.offset.top + obj.height;

                    return obj;
                },
                pushToArray = function($singleEl, elName) {
                    $singleEl.each(function(i, el){
                        cachedUi[elName].push(getOptions($(el)));
                    });
                },
                $singleEl, elOptions;

            isUiCached = false;
            cachedUi = {};

            for (var elName in ui.scrollUi) {
                $singleEl = $(ui.scrollUi[elName].selector);

                if ($singleEl.length) {
                    if ($singleEl.length > 1) {
                        cachedUi[elName] = [];
                        pushToArray($singleEl, elName);
                    }
                    else {
                        cachedUi[elName] = getOptions($singleEl);
                    }
                }
                else {
                    console.log("skipping "+ui.scrollUi[elName].selector +". Not found.");
                }
            }

            cachedUi._general = {
                viewport: site.views.run("common", "getViewportDimensions"),
                documentHeight: site.views.run("common", "getDocumentHeight"),
            };

            evaluateLastArticle();
            // console.log(cachedUi);
            isUiCached = true;
        },
        evaluateLastArticle = function(){
            var lastSectionClass = "last-section-smaller-than-viewport",
                isViewportBigger = cachedUi._general.viewport.height <= $("#developer").outerHeight() + $("#footer").outerHeight();

            $("body").toggleClass(lastSectionClass, isViewportBigger);
        },
        initScroll = function(){
            // http://kristerkari.github.io/adventures-in-webkit-land/blog/2013/08/30/fixing-a-parallax-scrolling-website-to-run-in-60-fps/
            $(window).on("scroll.scrollspy", _.throttle(function(e){
                site.settings.requestAnimationFrame.call(window, scrollHandler);
            }, 250));
        },
        exports = {
            init: function(){
                $(ui.el).on("load resize recacheUi", _.debounce(function(e){
                    cacheUi();
                }, 200));

                $(ui.el).on("load", function(e) {
                    initScroll();
                });
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
