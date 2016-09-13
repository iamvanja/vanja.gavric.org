(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        viewName = "index.photography",
        ui = {
            el: "#photography",
            backstretchEl: ".backstretch-wrap",
            play: "#play",
            pause: "#pause"
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


                // todo: click on entire container, pause and play zoom in/out and fade effect
                $(ui.play + ", " + ui.pause).on("click", function(){
                    var action = "resume",
                        newId = "pause",
                        newClass = "icon icon-pause-circled";

                    if ($(this).is(ui.pause)){
                        action = "pause";
                        newId = "play";
                        newClass = "icon icon-play-circled";
                    }

                    $backstretchEl.backstretch(action);

                    $(this).attr({
                        "id": newId,
                        "class": newClass
                    });
                });
            }
        },
        loadMorePhotos = function(){
             if ($.fn.backstretch){
                // once the initial page load is finished, add more photos to backstretch
                var backstretchInstance = $backstretchEl.data("backstretch");
                backstretchInstance.images.push(
                    imagesPath + "stuck-in-traffic.jpg",
                    imagesPath + "hana.jpg",
                    imagesPath + "autumn-in-zrinjevac.jpg",
                    imagesPath + "double-rainbow-in-paris.jpg"
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
