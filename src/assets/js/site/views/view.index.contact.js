(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        viewName = "index.contact",
        ui = {
            el: "#contact",
            emailCircle: "#email-circle",
        },
        initEmail = function(){
            var $el = $(ui.emailCircle).find("a");
            $el.attr("href", "mailto:" + $el.attr("data-username") + "@" + $el.attr("data-domain") + "?subject=From "+$el.attr("data-domain"));
        },
        exports = {
            init: function(){
                initEmail();
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);


