/*eslint no-unused-expressions: "off"*/
/*eslint no-undef: "off"*/
describe("main-nav", function() {
    "use strict";

    // todo: clean up by creating page object pattern

    beforeEach(function() {
        browser.windowHandleSize({width: 800, height: 600});
    });

    // unexplicably fails because `browser.debug()` shows it is evident it is visibility in the viewport
    // isVisibleWithinViewport unrealiable as it does not understand `transform: translate3d()`
    // `browser.getCssProperty("#main-nav", "transform")` does not work due to vendor prefixes
    // (not-so-elegant) solution is to look for existence of classes `.scroll-down` (not visible) and `.scroll-up` (visible)
    // isVisible returns false if element is not found in the DOM so perfect for this use-case
    it("should show main-nav", function() {
        browser.url("/?loader=false");
        // initial load does not have neither class
        browser.isVisible("#main-nav").should.be.true;
        browser.isVisible("#main-nav.scroll-up").should.be.false;
        browser.isVisible("#main-nav.scroll-down").should.be.false;
    });

    it("should hide main-nav when scrolling down", function() {
        this.retries(4);
        browser.url("/?loader=false#writing");
        browser.pause(800);
        browser.isVisible("#main-nav.scroll-down").should.be.true;
        browser.isVisible("#main-nav.scroll-up").should.be.false;
    });

    it("should show main-nav when scrolling up", function() {
        this.retries(4);

        // scroll down
        browser.url("/?loader=false#writing");
        browser.pause(800);
        browser.isVisible("#main-nav.scroll-down").should.be.true;
        browser.isVisible("#main-nav.scroll-up").should.be.false;

        // scroll up
        browser.scroll(0, 500);
        browser.pause(1200);
        browser.isVisible("#main-nav.scroll-down").should.be.false;
        browser.isVisible("#main-nav.scroll-up").should.be.true;
    });

    it("should be responsive", function() {
        this.retries(4);
        var height = 500;
        browser.url("/?loader=false");
        // small
        browser.windowHandleSize({width: 400, height: height});
        browser.isVisible("#main-nav ul li a .text")[0].should.be.false;
        browser.getCssProperty("#main-nav ul li", "float")[0].value.should.equal("left");

        // medium - 640 width
        browser.windowHandleSize({width: 640, height: height});
        browser.isVisible("#main-nav ul li a .text")[0].should.be.true;
        browser.getCssProperty("#main-nav ul li", "float")[0].value.should.equal("left");

        // xlarge - 1200 width
        browser.windowHandleSize({width: 1200, height: height});
        browser.getCssProperty("#main-nav ul", "float").value.should.equal("none");
        browser.getCssProperty("#main-nav ul li", "float")[0].value.should.equal("none");
        browser.getCssProperty("#main-nav", "background-color").parsed.hex.should.equal("#34495e");
    });

    it("should update active class for sections", function(){
        this.retries(4);
        browser.windowHandleSize({width: 1200, height: 600});
        browser.url("/?loader=false");
        browser.click("#intro .scroll-down a");

        browser.waitForVisible("#main-nav li.developer.active", 2000);
    });
});
