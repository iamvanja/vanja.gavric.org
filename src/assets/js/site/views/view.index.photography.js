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
                            url: "stuck-in-traffic.jpg",
                        },
                        {
                            url: "hana.jpg",
                        },
                        {
                            url: "big-ben.jpg",
                            alignY: 0.7,
                        },
                        {
                            url: "cat.jpg",
                            alignY: 0,
                        },
                        {
                            url: "double-rainbow-in-paris.jpg",
                        },
                        {
                            url: "autumn-in-zrinjevac.jpg",
                        },
                        {
                            url: "paris-sunset.jpg",
                        },
                        {
                            url: "flowers.jpg",
                        },
                        {
                            url: "tower-bridge.jpg",
                        },
                        {
                            url: "adriatic-sea.jpg",
                        },
                        {
                            url: "dijana.jpg",
                            alignY: 1,
                        },
                    ],
                    options = {
                        duration: 5000,
                        fade: 750,
                        preload: 1,
                    };

                // "http://farm8.staticflickr.com/7035/6464821765_36a618a812_o.jpg", /* Paris opera */

                $backstretchEl.backstretch(addImagePath(imagesArr), options);

                $(ui.el).on("click", function(){
                    var $el = $(this),
                        pausedClass = "paused",
                        playingClass = "playing",
                        isPaused = $el.is("."+pausedClass);

                    $el.toggleClass(pausedClass, !isPaused);
                    $el.toggleClass(playingClass, isPaused);

                    $backstretchEl.backstretch(isPaused ? "resume" : "pause");
                });
            }
            else {
                console.warn("Backstretch init failed");
            }
        },
        addImagePath = function(imagesArr){
            var fullImagesPath = site.settings.assetsUrl.local + partialImagesPath;

            imagesArr.forEach(function(el, i, arr){
                el.url = fullImagesPath + el.url;
            });

            return imagesArr;
        },
        exports = {
            init: function(){
                initBackstretch();
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
