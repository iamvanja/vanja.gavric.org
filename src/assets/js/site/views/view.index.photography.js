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
        classNames = {
            hideHeaders: "hide-headers",
            fullScreenControl: "full-screen-control",
            iconFullScreenBase: "icon-fullscreen-",
            directionControl: "direction-control",
            paused: "paused",
            playing: "playing",
        },
        backstretchImages = [
            // "http://farm8.staticflickr.com/7035/6464821765_36a618a812_o.jpg", /* Paris opera */
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
        backstretchOptions = {
            duration: 5000,
            fade: 750,
            preload: 1,
        },
        initBackstretch = function(){
            if ($.fn.backstretch){
                // init backstrect plugin
                $backstretchEl.backstretch(prepareImages(backstretchImages), backstretchOptions);

                // init events
                initEvents();
            }
            else {
                console.warn("Backstretch init failed");
            }
        },
        initEvents = function(){
            $(ui.el).on("click", function(e){
                e.preventDefault();
                var $el = $(this),
                    $target = $(e.target);

                if ($target.is("."+classNames.fullScreenControl)) {
                    // running in the blind here, but there does not seem to be a reliable/trivial method
                    // to figure out the fullscreen state
                    var isEnabled = $target.hasClass(classNames.iconFullScreenBase+"on");

                    // trigger fullscreen or close it
                    site.views.run("common", "fullScreen" + (isEnabled ? "Request" : "Exit"), {element: this});

                    // trigger resize just in case
                    $backstretchEl.backstretch("resize");

                    // take care of the presentation
                    $target.toggleClass(classNames.iconFullScreenBase+"on", !isEnabled)
                            .toggleClass(classNames.iconFullScreenBase+"off", isEnabled);

                    window.setTimeout(function(){
                        $el.toggleClass(classNames.hideHeaders, isEnabled);
                    }, 3*1000);
                }
                else if ($target.is("."+classNames.directionControl)) {
                    var direction = $target.attr("data-direction");
                    $backstretchEl.backstretch(direction);

                    $el.removeClass("prev next");
                    this.getClientRects(); // trigger layout
                    $el.addClass(direction);
                }
                else {
                    var isPaused = $el.hasClass(classNames.paused);
                    $el.toggleClass(classNames.paused, !isPaused)
                        .toggleClass(classNames.playing, isPaused);

                    $backstretchEl.backstretch(isPaused ? "resume" : "pause");
                }
            });
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
            classNames: classNames,
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
