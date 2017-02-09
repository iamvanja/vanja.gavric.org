/*eslint no-unused-expressions: "off"*/
/*eslint no-undef: "off"*/
describe("loader", function() {
    "use strict";

    it("should display loader", function() {
        browser.url("/");
        browser.isVisible("#loader").should.be.true;
    });

    it("should not display loader", function() {
        browser.url("/?loader=false");
        browser.isVisible("#loader").should.be.false;
    });
});
