(function(window, document, $) {
    "use strict";
    var site = window.SITE;
    site.init({
        controllerCallbacks: {
            // common: {
            //     init: function(){},
            //     finalize: function(){},
            // },
            index: {
                init: function(){
                    site.views.run("index", "init");
                },
                // "landing-normal": function(){},
            },
            playground: {
                init: function(){
                    site.views.run("playground", "init");
                },
                // "playground-normal": function(){},
            },
        },
    });

})(this, this.document, jQuery);
