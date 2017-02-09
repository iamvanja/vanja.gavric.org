/*eslint no-unused-expressions: "off"*/
/*eslint no-undef: "off"*/
describe("view.index.photography", function() {
    "use strict";

    beforeEach(function() {
        browser.windowHandleSize({width: 800, height: 600});
        browser.url("/?loader=false");
    });

    var helpers = {
        pausedMessage: "#photography .paused-message",
        backstretchImg: "#photography .backstretch-item img",
        slideshowDuration: 6000, // (5000 but adding 1000 more just in case)
        getCurrentBackstretchImg: function(last) {
            var imageSrc = browser.getAttribute(helpers.backstretchImg, "src");
            imageSrc = (typeof imageSrc === "string") ? imageSrc :
                (last === true) ? imageSrc[imageSrc.length-1] : imageSrc[0];
            return imageSrc;
        },
        toggleSlideshow: function() {
            $("#photography > .row").click();
        },
    };

    it("should pause slideshow", function() {
        if (browser.desiredCapabilities.browserName === "phantomjs") {
            // needed for phantomjs
            browser.pause(1000);
        }
        // get current backstretchImg
        var imageSrc = helpers.getCurrentBackstretchImg();
        // check if paused message is not shown
        browser.isVisible(helpers.pausedMessage).should.be.false;
        // pause slideshow
        helpers.toggleSlideshow();
        // wait just in case (waitUntil refuses to work)
        browser.pause(500);
        // paused message should be now visible
        browser.isVisible(helpers.pausedMessage).should.be.true;
        // wait to check if slideshow will starts advancing
        browser.pause(helpers.slideshowDuration);
        // images should be the same
        helpers.getCurrentBackstretchImg().should.equal(imageSrc);
    });

    it("should play slideshow", function() {
        // get current backstretchImg
        var imageSrc = helpers.getCurrentBackstretchImg();
        // wait for the new slide
        browser.pause(helpers.slideshowDuration);
        // images should not be the same
        helpers.getCurrentBackstretchImg(true).should.not.equal(imageSrc);
    });

    it("should advance to the next image by user click", function(){
        // get current backstretchImg
        var imageSrc = helpers.getCurrentBackstretchImg();
        // pause slideshow to make testability more predictable
        helpers.toggleSlideshow();
        // advance to next image
        browser.click("#photography .direction-control[data-direction='next']");
        // allow for DOM to update
        browser.pause(500);
        // images should not be the same
        helpers.getCurrentBackstretchImg(true).should.not.equal(imageSrc);
    });

    it("should advance to the previous image by user click", function(){
        // get current backstretchImg
        var imageSrc = helpers.getCurrentBackstretchImg();
        // pause slideshow to make testability more predictable
        helpers.toggleSlideshow();
        // advance to next image
        browser.click("#photography .direction-control[data-direction='prev']");
        // allow for DOM to update
        browser.pause(500);
        // images should not be the same
        helpers.getCurrentBackstretchImg(true).should.not.equal(imageSrc);
    });

    it("should advance to the next image by keyboard input", function(){
        // firefox driver does not seem to support keys
        if (browser.desiredCapabilities.browserName !== "firefox") {
            // get current backstretchImg
            var imageSrc = helpers.getCurrentBackstretchImg();
            // pause slideshow to make testability more predictable
            helpers.toggleSlideshow();
            // advance to next image by keyboard
            browser.keys("ArrowRight");
            // allow for DOM to update
            browser.pause(500);
            // images should not be the same
            helpers.getCurrentBackstretchImg(true).should.not.equal(imageSrc);
        }
        else {
            console.log("`browser.keys()` not supported by Firefox driver. Skipping.");
        }
    });

    it("should advance to the previous image by keyboard input", function(){
        // firefox driver does not seem to support keys
        if (browser.desiredCapabilities.browserName !== "firefox") {
            // get current backstretchImg
            var imageSrc = helpers.getCurrentBackstretchImg();
            // pause slideshow to make testability more predictable
            helpers.toggleSlideshow();
            // advance to previous image
            browser.keys("ArrowLeft");
            // allow for DOM to update
            browser.pause(500);
            // images should not be the same
            helpers.getCurrentBackstretchImg(true).should.not.equal(imageSrc);
        }
        else {
            console.log("`browser.keys()` not supported by Firefox driver. Skipping.");
        }
    });

    it("should go into full-screen mode", function() {
        var fsControl = "#photography .full-screen-control";
        // get current viewport (width)
        var viewportWidth = browser.getViewportSize("width");
        if (
            (browser.isVisible(fsControl) === false && browser.isExisting("html.fullscreen") === false) ||
            browser.desiredCapabilities.browserName === "phantomjs") {
            console.log("Full-screen not supported. Skipping.");
        }
        else {
            // attempt to go into full-screen mode
            $(fsControl).click();
            // allow the browser to go into full-screen mode
            browser.pause(5000);
            // test if the viewport (width) is different
            browser.getViewportSize("width").should.not.equal(viewportWidth);
        }
    });

});
