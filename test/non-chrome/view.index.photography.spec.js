/*eslint no-unused-expressions: "off"*/
/*eslint no-undef: "off"*/
describe("view.index.photography non-chrome", function() {
    "use strict";

    it("should prefer jpg images", function() {
        browser.windowHandleSize({width: 800, height: 600});
        browser.url("/?loader=false");
        // waitUntil fails on phantomjs so pause is used
        browser.pause(2000);
        var srcExtension = browser.getAttribute("#photography .backstretch-item img", "src").split(".");
        srcExtension = srcExtension[srcExtension.length-1] || false;
        srcExtension.should.equal("jpg");
    });
});
