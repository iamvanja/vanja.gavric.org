(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        viewName = "index.photography",
        ui = {
            el: "#photography",
            backstretchEl: ".backstretch-wrap",
        },
        $backstretchEl = $(ui.el).find(ui.backstretchEl),
        partialImagesPath = "images/photos/",
        initBackstretch = function(){
            if ($.fn.backstretch){
                var imagesArr = [
                        {
                            url: "stuck-in-traffic",
                        },
                        {
                            url: "hana",
                        },
                        {
                            url: "big-ben",
                            alignY: 0.7,
                        },
                        {
                            url: "cat",
                            alignY: 0,
                        },
                        {
                            url: "double-rainbow-in-paris",
                        },
                        {
                            url: "autumn-in-zrinjevac",
                        },
                        {
                            url: "paris-sunset",
                        },
                        {
                            url: "flowers",
                        },
                        {
                            url: "tower-bridge",
                        },
                        {
                            url: "adriatic-sea",
                        },
                        {
                            url: "dijana",
                            alignY: 1,
                        },
                    ],
                    options = {
                        duration: 5000,
                        fade: 750,
                        preload: 1,
                    };

                // "http://farm8.staticflickr.com/7035/6464821765_36a618a812_o.jpg", /* Paris opera */

                $backstretchEl.backstretch(prepareImages(imagesArr), options);

                $(ui.el).on("click", function(e){
                    e.preventDefault();
                    var $el = $(this),
                        $target = $(e.target),
                        pausedClass = "paused",
                        playingClass = "playing",
                        isPaused = $el.is("."+pausedClass);

                    if ($target.is(".full-screen-control")) {
                        var baseClassName = "icon-fullscreen-";
                        // running in the blind here, but there does not seem to be a reliable/trivial method
                        // to figure out the fullscreen state
                        var isEnabled = $target.hasClass(baseClassName+"on");

                        // trigger fullscreen or close it
                        site.views.run("common", "fullScreen" + (isEnabled ? "Request" : "Exit"), {element: this});

                        // trigger resize just in case
                        $backstretchEl.backstretch("resize");

                        // take care of the presentation
                        $target.toggleClass(baseClassName+"on", !isEnabled)
                                .toggleClass(baseClassName+"off", isEnabled);

                        // @todo: hide headers
                    }
                    else if ($target.is(".direction-control")) {
                        var direction = $target.attr("data-direction");
                        $backstretchEl.backstretch(direction);

                        $el.removeClass("prev next");
                        this.getClientRects(); // trigger layout
                        $el.addClass(direction);
                    }
                    else {
                        $el.toggleClass(pausedClass, !isPaused)
                            .toggleClass(playingClass, isPaused);

                        $backstretchEl.backstretch(isPaused ? "resume" : "pause");
                    }
                });
            }
            else {
                console.warn("Backstretch init failed");
            }
        },
        prepareImages = function(imagesArr){
            var fullImagesPath = site.settings.assetsUrl.local + partialImagesPath,
                isWebPSupported = $("html").hasClass("webp");

            imagesArr.forEach(function(el, i, arr){
                el.url = fullImagesPath + el.url + "." + (isWebPSupported ? "webp" : "jpg");
            });

            return imagesArr;
        },
        exports = {
            init: function(){
                $(window).on("load."+viewName, function(){
                    initBackstretch();
                });
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
