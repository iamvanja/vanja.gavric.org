(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        viewName = "index.developer",
        ui = {
            el: "#developer",
            list: "#technologies-list",
            legend: "#technologies-legend",
            select: "#technologies-select",
            technologiesWrap: "#developer .technologies-wrap",
        },
        cachedUi = {},
        activeCategoryName,
        shuffleTechnologies = function(){
            site.helpers.shuffleList(cachedUi.$list[0] || []);
        },
        initTechnologiesLegend = function(){
            cachedUi.$legend.find("span").on({
                mouseenter: function(){
                    activeCategoryName = $(this).attr("class");
                    filterTechnologies(activeCategoryName);
                },
                mouseleave: function(){
                    removeTechnologyClasses();
                },
            });
        },
        initTechnologiesSelect = function(){
            cachedUi.$select.on("change", function(){
                var val = $(this).val();
                removeTechnologyClasses();
                if (val !== "") {
                    activeCategoryName = val;
                    filterTechnologies(val);
                }
            });
        },
        filterTechnologies = function(activeCategoryName){
            cachedUi.$list.find("li").each(function(){
                if (!$(this).hasClass(activeCategoryName)) {
                    $(this).addClass("animated-hide");
                }
            });
        },
        removeTechnologyClasses = function(){
            cachedUi.$list.find("li").removeClass("animated-hide");
            activeCategoryName = null;
        },
        decideSkillsImplementation = function(){
            var viewport = site.views.run("common", "getViewportDimensions"),
                isMobile = (viewport.height < cachedUi.$technologiesWrap.outerHeight()) || (Modernizr.touchevents && viewport.width < 640);

            cachedUi.$technologiesWrap.toggleClass("mobile", isMobile);
            cachedUi.$technologiesWrap.toggleClass("desktop", !isMobile);
        },
        cacheUi = function(){
            for (var el in ui) {
                cachedUi["$"+el] = $(ui[el]);
            }
            $(window).trigger("cachedUi");
        },
        onLoadResize = function(){
            $(window).on("load."+viewName+" resize."+viewName, function(){
                $(window).one("cachedUi", function(){
                    decideSkillsImplementation();
                });
                cacheUi();
            });
        },

        exports = {
            init: function(){
                onLoadResize();
                $(window).one("cachedUi", function(){
                    shuffleTechnologies();
                    initTechnologiesLegend();
                    initTechnologiesSelect();
                });
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
