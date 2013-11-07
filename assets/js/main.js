/*!
  |------------------------
  | VG custom JS
  |------------------------
 */


(function(){
    'use strict';

    var App = {
        variables: {},
        elements: {},
        helpers: {}
    },
        email = {
            a : "mailto:",
            b : "vanja",
            c : "gavric.org",
            d : "?subject=From vanja.gavric.org"
    };

    // App.variables.viewport = App.helpers.viewport();
    App.elements.$window = $(window);
    App.elements.$html = $('html');
    App.elements.$body = $('body');
    App.elements.$intro = $('#intro');
    App.elements.$outro = $('#outro');
    App.elements.$content = $('#content');
    // App.elements.$top = $('#top');
    App.elements.$mainNav = $('#main-nav');
    App.elements.$mainNavUl = $('#main-nav').find('ul');
    App.elements.$developer = $('#developer');
    App.elements.$technologiesLegend = $('#technologies-legend');
    App.elements.$technologiesList = $('#technologies-list li');
    App.elements.$introCentered = $('#intro-centered');
    App.elements.$backstretchWrap = $('#photography .backstretch-wrap');
    App.elements.$backToTop = $('#back-to-top');
    
    // App.variables.transformClass = Modernizr.cssfilters ? 'blurred' : 'grayscale';
    App.variables.transformClass = 'grayscale';
    App.variables.isSkrollrAllowed = Modernizr.csstransforms3d;
    App.variables.skrollrInstance = false;
    App.variables.skrollInitObj = {
        forceHeight : false,
        mobileDeceleration : 1,
        render : function(info){

            //Console log
            // $('#console').empty().append('Scrolled: ' + info.curTop + '<br /> Total: ' + info.maxTop);

            if (info.curTop <= App.elements.$intro.outerHeight()) {
                App.elements.$mainNav.find('li').removeClass('active');
                App.elements.$backToTop.fadeOut();
                App.elements.$mainNavUl.css({
                    'margin-left' : 0
                });
            }
            else {
                App.elements.$backToTop.fadeIn();
                App.elements.$mainNavUl.css({
                    'margin-left' : '-100%'
                });
            }
            if (info.curTop >= this.relativeToAbsolute(document.getElementById('developer'), 'top', 'top')) {
                App.elements.$mainNav.find('li:eq(0)').addClass('active').siblings().removeClass('active');
            }
            if (info.curTop >= this.relativeToAbsolute(document.getElementById('photography'), 'top', 'top')) {
                App.elements.$mainNav.find('li:eq(1)').addClass('active').siblings().removeClass('active');
            }
            if (info.curTop+10 >= this.relativeToAbsolute(document.getElementById('writing'), 'top', 'top')) {
                App.elements.$mainNav.find('li:eq(2)').addClass('active').siblings().removeClass('active');
            }
            if (info.curTop === info.maxTop) {
                App.elements.$mainNav.find('li:eq(3)').addClass('active').siblings().removeClass('active');
            }
        }
    };

    App.helpers.viewport = function() {
        var e = window,
            a = 'inner';
        if ( !( 'innerWidth' in window ) ) {
            a = 'client';
            e = document.documentElement || document.body;
        }
        return {
            width : e[ a+'Width' ],
            height : e[ a+'Height' ]
        };
    };
    App.helpers.shuffleList = function(ul){
        var listLength = ul.children.length;
        for (var i = listLength; i >= 0; i--) {
            ul.appendChild(ul.children[Math.random() * i | 0]);
        }
    };
    App.helpers.filterTechnologies = function(self){
        var category = $(self).attr('class');
        App.elements.$technologiesList.each(function(){
            if (!$(this).hasClass(category)) {
                $(this).addClass('scaledOut '+App.variables.transformClass);
            }
        });
    };
    App.helpers.removeTechnologyClasses = function(){
            App.elements.$technologiesList.removeClass('scaledOut '+App.variables.transformClass);
    };
    App.helpers.init = function() {
        var absHeight = App.elements.$introCentered.outerHeight(),
            absWidth = App.elements.$introCentered.outerWidth();
        App.elements.$introCentered.css({
            'margin-left' : '-' + absWidth / 2 + 'px',
            'margin-top' : '-' + absHeight / 2 + 'px',
            'width' : absWidth + 'px',
            'height' : absHeight + 'px'
        }).removeClass('centered').addClass('abs-centered');

        // App.elements.$body.css({height : $(document).height() + 'px' });
        App.elements.$content.css({
            'margin-top' : App.elements.$intro.outerHeight() + 'px'
        });

        if (App.variables.isSkrollrAllowed) {
            App.variables.skrollrInstance = skrollr.init( App.variables.skrollInitObj );
            App.variables.skrollrInstance.refresh();
        }

    };
    App.helpers.removeLoader = function(){
        var $loader = $('#loader');
        $loader.find('div').fadeOut(400, function(){
            $loader.animate({
                left:'-200%'
            }, function(){
                $loader.remove();
                // var androidVersion = App.helpers.getAndroidVersion();
                // if (androidVersion === false || androidVersion >= 4) {
                    App.elements.$body.addClass('delayedAnimateStuff');
                // }
            });
        });
    };
    App.helpers.getAndroidVersion = function() {
        if( navigator.userAgent.indexOf("Android") >= 0 ) {
          return parseFloat(ua.slice(ua.indexOf("Android")+8));
        }
        return false;
    };


    // essentially a document ready init
    $('#contact-circle > a').attr('href', email.a+email.b+'@'+email.c+email.d);
    App.elements.$intro.addClass('fixed');
    // photos
    App.elements.$backstretchWrap.backstretch([
        '/assets/images/photos/adriatic-sea.jpg'
        // '/assets/images/photos/coming-down-on-me.jpg', /* Coming down on me */
    // 'http://farm8.staticflickr.com/7035/6464821765_36a618a812_o.jpg', /* Paris opera */
    // 'http://farm9.staticflickr.com/8097/8442056306_0c4c82c808_o.jpg', /* London Big Ben */
    ], {duration: 5000, fade: 750});
    $('#pause, #play').on('click', function(){
        var action = 'resume',
            newId = 'pause',
            newClass = 'icon icon-pause-circled';

        if ($(this).is('#pause')){
            action = 'pause';
            newId = 'play';
            newClass = 'icon icon-play-circled';
        }
        App.elements.$backstretchWrap.backstretch( action );
        $(this).attr({
            'id' : newId,
            'class' : newClass
        });
    });
    // categories
    App.helpers.shuffleList(document.getElementById('technologies-list'));
    App.elements.$technologiesLegend.find('span').on('touchstart', function() {
            App.helpers.removeTechnologyClasses();
            App.helpers.filterTechnologies(this);
    });
    App.elements.$technologiesLegend.find('span').on({
        mouseenter: function(){
            App.helpers.filterTechnologies(this);
        },
        mouseleave : function(){
            App.helpers.removeTechnologyClasses();
        }
    });
    App.elements.$developer.on('click', function(e){
        var $container = App.elements.$technologiesLegend;
        if ($container.has(e.target).length === 0){
            App.helpers.removeTechnologyClasses();
        }
    });
    $('a[href^="#"]').on('click', function(e){
        e.preventDefault();
        // alert($(this).attr("href"));
        var $this = $(this),
            hash = $this.attr('href'),
            offset = 0,
            parent = $this.parent('li'),
            isMobile = $('html').hasClass('skrollr-mobile');

        if (isMobile) {
            if (App.variables.skrollrInstance !== false && hash === '#top'){
                App.variables.skrollrInstance.setScrollTop(offset);
            }
            return;
        }

        if (hash === '#contact') {
            var viewport = App.helpers.viewport();
            offset = $(document).height() - viewport.height;
        }
        else if (hash !== '#top') {
            offset = $(hash).offset().top;
        }
    
        if (!$([App.elements.$html[0], App.elements.$body[0]]).is(':animated')) {
            $([App.elements.$html[0], App.elements.$body[0]]).animate({
                scrollTop: offset
            }, 1600, 'easeInOutQuint').promise().done(function(){
                // alert('done')
                App.elements.$mainNav.find('li').removeClass('active');
                if (parent.length) {
                    parent.addClass('active');
                }
                if (hash !== '#top') {
                    window.location.hash = hash;
                }
                else {
                    window.location.hash = '';
                }
            });
        }
    });


    // init all on window ready
    App.elements.$window.on('load resize', function(){
        App.helpers.init();
    });

    // remove loader once everything is set up
    App.elements.$window.on('load', function(){
        App.helpers.removeLoader();
        // on load navigate to the page fragment
        if (window.location.hash) {
            // alert(window.location.hash);
            $('a[href="'+ window.location.hash +'"]').trigger('click');
        }

        // once the loader is removed, add more photos to backstretch
        var backstretchInstance = App.elements.$backstretchWrap.data('backstretch');
        backstretchInstance.images.push(
            '/assets/images/photos/stuck-in-traffic.jpg',
            '/assets/images/photos/hana.jpg',
            '/assets/images/photos/autumn-in-zrinjevac.jpg',
            '/assets/images/photos/double-rainbow-in-paris.jpg'
        );

        $('#articles > .article-items > li > a > img.lazy').each(function(){
            $(this).attr('src', $(this).attr('data-lazysrc'));
        });

    });

}());

