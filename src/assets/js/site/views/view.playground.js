(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        viewName = "playground",
        ui = {
            el: ".playground",
        },
        exports = {
            init: function(){
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
