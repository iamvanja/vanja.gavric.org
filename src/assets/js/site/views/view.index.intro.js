(function(window, document, $) {
    "use strict";
    var site = window.SITE,
        viewName = "index.intro",
        ui = {
            el: "#intro",
            title: ".blog-post-title",
            link: ".blog-post-link",
        },
        setBlogTitle = function(title) {
            title = title || "Loading...";
            $(ui.el).find(ui.title).html(title);
        },
        setBlogLink = function(link) {
            if (!link) {
                return false;
            }
            var $link = $(ui.el).find(ui.link);
            $link.attr("href", link);

        },
        setLatestBlogPost = function() {
            var apiUrl = "//vanja.gavric.org/blog/ghost/api/v0.1/posts/?limit=1&client_id=ghost-frontend&client_secret=9fe91d92f39c";

            var request = $.ajax({ url: apiUrl });

            request.fail(function(jqXHR, textStatus) {
              $(ui.el).hide();
            });

            request.done(function(data) {
                var post = data.posts[0];
                setBlogTitle(post.title);
                setBlogLink("/blog/" + post.slug);
            });
        },
        exports = {
            init: function(){
                setLatestBlogPost();
            },
        };

    site.views.register(viewName, exports);

})(this, this.document, jQuery);
