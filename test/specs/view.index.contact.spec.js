/*eslint no-unused-expressions: "off"*/
/*eslint no-undef: "off"*/
describe("view.index.contact", function() {
    "use strict";

    beforeEach(function() {
        browser.windowHandleSize({width: 800, height: 600});
        browser.url("/?loader=false");
    });

    it("should have the correct background color", function() {
        browser.getCssProperty("#contact", "background-color").parsed.hex.should.equal("#16a085");
    });

    it("should enable email link", function() {
        browser.getAttribute("#email-circle a", "href").should.equal("mailto:vanja@gavric.org?subject=From%20gavric.org");
    });
});
