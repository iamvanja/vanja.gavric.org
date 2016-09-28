(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        viewName = "index.photography",
        ui = {
            el: "#photography",
            backstretchEl: ".backstretch-wrap",
        },
        $backstretchEl = $(ui.el).find(ui.backstretchEl),
        imagesPath,
        onLoad = function(){
            $(window).on("load", function(e) {
                loadMorePhotos();
            });
        },
        initBackstretch = function(){
            if ($.fn.backstretch){
                imagesPath = site.settings.assetsUrl.local + "images/photos/";
                // site.settings.assetsUrl.local + "images/photos/coming-down-on-me.jpg", /* Coming down on me */
                // "http://farm8.staticflickr.com/7035/6464821765_36a618a812_o.jpg", /* Paris opera */
                // "http://farm9.staticflickr.com/8097/8442056306_0c4c82c808_o.jpg", /* London Big Ben */
                $backstretchEl.backstretch(
                    [imagesPath + "adriatic-sea.jpg"],
                    {duration: 5000, fade: 750}
                );

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
        loadMorePhotos = function(){
             if ($.fn.backstretch){
                // once the initial page load is finished, add more photos to backstretch
                var backstretchInstance = $backstretchEl.data("backstretch");
                backstretchInstance.images.push(
                    {
                        url: imagesPath + "stuck-in-traffic.jpg",
                    },
                    {
                        url: imagesPath + "hana.jpg",
                    },
                    {
                        url: imagesPath + "autumn-in-zrinjevac.jpg",
                    },
                    {
                        url: imagesPath + "double-rainbow-in-paris.jpg",
                    }
                );
            }
        },
        exports = {
            init: function(){
                onLoad();
                initBackstretch();
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
