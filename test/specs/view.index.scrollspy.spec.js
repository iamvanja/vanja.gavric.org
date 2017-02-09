/*eslint no-unused-expressions: "off"*/
/*eslint no-undef: "off"*/
describe("view.index.scrollspy", function() {
    "use strict";

    beforeEach(function() {
        browser.windowHandleSize({width: 800, height: 600});
    });

    it("should show back-to-top element only when scrolled down", function() {
        browser.url("/?loader=false");
        browser.isVisible("#back-to-top").should.be.false;
        browser.click("#main-nav li.photography a");
        browser.waitForVisible("#back-to-top", 1500).should.be.true;
    });

    it("should scroll page to the top", function() {
        browser.url("/?loader=false");
        browser.scroll(0, 0);
        // add to custom commands
        // start from top
        var scrollTop = browser.getScrollPosition().value.top;
        scrollTop.should.equal(0);

        // scroll to middle of the page
        browser.click("#main-nav li.photography a");
        browser.waitForVisible("#back-to-top", 1500);
        scrollTop = scrollTop = browser.getScrollPosition().value.top;
        // check if scroll position is really not at the top
        scrollTop.should.not.equal(0);

        // scroll back to the top
        browser.click("#back-to-top");
        browser.pause(1500);
        scrollTop = scrollTop = browser.getScrollPosition().value.top;
        scrollTop.should.equal(0);
    });

});
