/*eslint no-unused-expressions: "off"*/
/*eslint no-undef: "off"*/
describe("view.index.photography chrome-only", function() {
    "use strict";

    it("should prefer webp images", function() {
        browser.windowHandleSize({width: 800, height: 600});
        browser.url("/?loader=false");
        browser.waitUntil(function () {
            var srcExtension = browser.getAttribute("#photography .backstretch-item img", "src").split(".");
            srcExtension = srcExtension[srcExtension.length-1] || false;
            return srcExtension.should.equal("webp");
        }, 1000, "expected image src to be populated");
    });
});
