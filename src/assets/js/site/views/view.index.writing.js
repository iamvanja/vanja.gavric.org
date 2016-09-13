(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        viewName = "index.writing",
        ui = {
            el: "#writing",
        },
        onLoad = function(){
            $(window).on("load", function(e) {
                lazyLoadImages();
            });
        },
        lazyLoadImages = function(){
            $(ui.el).find("img.lazy").each(function(){
                $(this).attr("src", $(this).attr("data-lazysrc"));
            });
        },
        exports = {
            init: function(){
                onLoad();
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
