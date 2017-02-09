/*eslint no-unused-expressions: "off"*/
/*eslint no-undef: "off"*/
describe("view.playground", function() {
    "use strict";

    beforeEach(function() {
        browser.windowHandleSize({width: 800, height: 600});
    });

    it("should navigate from home page to playground", function() {
        browser.url("/?loader=false");
        browser.isExisting("#intro").should.equal.true;
        browser.url("/playground.html");
        var headerEl = $(".header h1");
        headerEl.isVisible().should.equal.true;
        headerEl.getText().should.equal("Playground");
    });

    it("should navigate from home page to playground using link", function() {
        browser.url("/?loader=false");
        browser.isExisting("#intro").should.equal.true;
        $("#footer .playground-link a").click();
        browser.pause(2000);
        var fullUrl = browser.getUrl();
        fullUrl.substr(fullUrl.lastIndexOf("/") + 1).should.equal("playground.html");
    });

    it("'s header should have the correct background color", function() {
        browser.url("/playground.html");
        browser.getCssProperty("body", "background-color").parsed.hex.should.equal("#3a3a3a");
    });
});
