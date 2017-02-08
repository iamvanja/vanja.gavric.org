describe("general", function() {
    "use strict";

    it("checks for valid title", function() {
        browser
            .url("/")
            .getTitle().should.be.equal("Vanja Gavrić | front-end developer | web developer");
    });
});
