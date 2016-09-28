(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        viewName = "index.developer",
        ui = {
            el: "#developer",
            list: "#technologies-list",
            legend: "#technologies-legend",
        },
        activeCategoryName,
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
                    removeTechnologyClasses();
                    filterTechnologies(this);
                },
            });
        },
        filterTechnologies = function(el){
            activeCategoryName = $(el).attr("class");
            $(ui.list).addClass(activeCategoryName);
        },
        removeTechnologyClasses = function(){
            $(ui.list).removeClass(activeCategoryName);
            activeCategoryName = null;
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
