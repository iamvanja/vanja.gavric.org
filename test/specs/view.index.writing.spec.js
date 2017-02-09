/*eslint no-unused-expressions: "off"*/
/*eslint no-undef: "off"*/
describe("view.index.writing", function() {
    "use strict";

    beforeEach(function() {
        browser.windowHandleSize({width: 800, height: 600});
        browser.url("/?loader=false");
    });

    it("should have the correct background color", function() {
        browser.getCssProperty("#writing", "background-color").parsed.hex.should.equal("#0e83cd");
    });

    // @todo: should lazy load images
    // @todo: should animate on scroll
});
