/*eslint no-unused-expressions: "off"*/
/*eslint no-undef: "off"*/
describe("general", function() {
    "use strict";

    it("checks for valid title", function() {
        browser
            .url("/")
            .getTitle().should.be.equal("Vanja Gavrić | front-end developer | web developer");
    });

    it("checks if the site is initialized properly", function() {
        browser
            .url("/")
            .pause(2000);

        browser.isVisible("#loader").should.be.false;
        browser.isVisible("#intro").should.be.true;
        browser.isVisibleWithinViewport("main").should.be.false;
    });
});
