(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        viewName = "index.writing",
        ui = {
            el: "#writing",
        },
        onLoad = function(){
            $(window).on("load", function(e) {
                site.views.run("common", "lazyLoadImages", {el: ui.el});
            });
        },
        exports = {
            init: function(){
                onLoad();
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
