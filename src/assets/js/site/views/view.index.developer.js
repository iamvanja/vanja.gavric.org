(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        viewName = "index.developer",
        ui = {
            el: "#developer",
            list: "#technologies-list",
            legend: "#technologies-legend"
        },
        // App.variables.transformClass = Modernizr.cssfilters ? "blurred" : "grayscale";
        transformClass = "grayscale",
        shuffleTechnologies = function(){
            site.helpers.shuffleList($(ui.list)[0] || []);
        },
        initTechnologiesLegend = function(){
            $(ui.legend).find("span").on({
                mouseenter: function(){
                    filterTechnologies(this);
                },
                mouseleave: function(){
                    removeTechnologyClasses();
                },
                touchstart: function(){
                    App.helpers.removeTechnologyClasses();
                    App.helpers.filterTechnologies(this);
                }
            });
        },
        // @todo: filter through css, apply just parent class
        filterTechnologies = function(el){
            var category = $(el).attr("class");
            $(ui.list).find("li").each(function(){
                if (!$(this).hasClass(category)) {
                    $(this).addClass("scaledOut "+transformClass);
                }
            });
        },
        removeTechnologyClasses = function(){
            $(ui.list).find("li").removeClass("scaledOut "+transformClass);
        },
        resetTechnologiesLegend = function(){
            $(ui.el).on("click", function(e){
                var $container = $(ui.legend);
                if ($container.has(e.target).length === 0){
                    removeTechnologyClasses();
                }
            });
        },

        exports = {
            init: function(){
                shuffleTechnologies();
                initTechnologiesLegend();
                resetTechnologiesLegend();
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
