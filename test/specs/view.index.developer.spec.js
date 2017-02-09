/*eslint no-unused-expressions: "off"*/
/*eslint no-undef: "off"*/
describe("view.index.developer", function() {
    "use strict";

    beforeEach(function() {
        browser.windowHandleSize({width: 800, height: 600});
        browser.url("/?loader=false");
    });

    it("should have the correct background color", function() {
        browser.getCssProperty("#developer", "background-color").parsed.hex.should.equal("#2b3c4e");
    });

    it("should show all skills", function() {
        var getSkillsCount = function() {
            var settings = require("../../settings.json");
            var count = 0;
            for (var category in settings.skills) {
                count += settings.skills[category].length;
            }
            return count;
        };

        browser.elements("#technologies-list .label").value.length.should.equal(getSkillsCount());
    });

    it("'s legend should be responsive", function() {
        // testing 800x600 = skills list is smaller than the viewport
        browser.isVisible("#technologies-legend").should.equal.true;
        browser.isVisible("#technologies-select").should.equal.false;

        browser.windowHandleSize({width: 800, height: 400});
        // skills list does not fit in the viewport
        browser.isVisible("#technologies-legend").should.equal.false;
        browser.isVisible("#technologies-select").should.equal.true;
    });

    it("should filter skills by hover", function() {
        browser.windowHandleSize({width: 800, height: 400});
        var selectEl = $("#technologies-select");
        var skillCategory = "js";
        selectEl.selectByValue(skillCategory);
        selectEl.getValue().should.equal(skillCategory);

        browser.getCssProperty("#technologies-list .label."+skillCategory, "opacity")[0].value.should.equal(1);
        browser.getCssProperty("#technologies-list .label:not(."+skillCategory+")", "opacity")[0].value.should.not.equal(1);
    });

});
