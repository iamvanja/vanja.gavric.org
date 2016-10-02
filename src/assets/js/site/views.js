(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        views = {
            run: function(viewName, methodName, options) {
                options = options || {};
                var view = site.views[viewName],
                    method = (view || {})[methodName];

                if (!view) {
                    console.error("View `"+ viewName +"` is undefined.");
                    return;
                }
                if (!method) {
                    console.error("Method "+ methodName +" in view `"+ viewName +"` is undefined.");
                    return;
                }

                return method(options);
            },
            register: function(viewName, view){
                // fail if there is already this view
                // do not overwrite
                if (site.views[viewName]) {
                    console.error("View `"+ viewName +"` already exists!");
                    return;
                }

                // the view is global now
                site.views[viewName] = view;
            },
        };

    site.views = views;

})(this, this.document, jQuery);
