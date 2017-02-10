/*eslint no-unused-expressions: "off"*/
/*eslint no-undef: "off"*/
describe("loader", function() {
    "use strict";

    it("should display loader", function() {
        this.retries(4);
        browser.url("/");
        browser.pause(200);
        browser.isVisible("#loader").should.be.true;
    });

    it("should not display loader", function() {
        browser.url("/?loader=false");
        browser.pause(200);
        browser.isVisible("#loader").should.be.false;
    });
});
