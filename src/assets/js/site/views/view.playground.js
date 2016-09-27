(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        viewName = "playground",
        ui = {
            el: ".playground",
            // columns: ".playground-item .columns",
        },
        // ensureEqualHeight = function(){
        //     var $columns = $(ui.columns);
        //     $(window).width() > 768 ? site.helpers.setAllToMaxHeight($columns) : $columns.css({"height":"auto"});
        // },
        // onLoadResize = function(){
        //     // todo: throttle this event?
        //     $(window).on("load resize", function(e){
        //         ensureEqualHeight();
        //     });
        // },
        exports = {
            init: function(){
                // onLoadResize();
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
