(function(window, document, $, undefined) {
    "use strict";
    // rename to utils?
    var site = window.SITE,
        helpers = {
            shuffleList: function(el){
                if (el){
                    var listLength = el.children.length;
                    for (var i = listLength; i >= 0; i--) {
                        el.appendChild(el.children[Math.random() * i | 0]);
                    }
                }
            },
            getParameterByName: function(name) {
                name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                    results = regex.exec(location.search);
                return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
            },
            rot13: function(s) {
                return s.replace(/[a-zA-Z]/g, function(c) {
                    return String.fromCharCode((c <= "Z" ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c - 26);
                });
            },
            setAllToMaxHeight: function(el) {
                el.outerHeight("auto");
                return el.outerHeight(Math.max.apply(el, $.map(el, function(e) {
                    return $(e).outerHeight();
                })));
            },
        };

    site.helpers = helpers;

})(this, this.document, jQuery);
