(function(window, document, $) {
    "use strict";
    var controller = {
        fire : function(func, funcname, args){
            var namespace = window.SITE.settings.controllerCallbacks;

            funcname = (funcname === undefined) ? "init" : funcname;
            if (func !== "" && namespace[func] && typeof namespace[func][funcname] === "function") {
                console.log("controller.fire calling: SITE."+func+ "." +funcname+"()");
                namespace[func][funcname](args);
            }
        },
        loadEvents : function(){
            var bodyId = document.body.id,
                classes = document.body.className.split(/\s+/) || [];

            // hit up common first.
            controller.fire("common");

            // do all the classes too.
            classes.forEach(function(classnm, i){
                controller.fire(classnm);
                controller.fire(classnm, bodyId);
            });

            controller.fire("common", "finalize");
        },
    };

    window.SITE.controller = controller;

})(this, this.document, jQuery);
