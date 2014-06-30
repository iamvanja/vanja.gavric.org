<?php
include_once('_settings.php');
include_once('_language.php');
include_once('_languageCheck.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?= $l ?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="<?= $l ?>"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="<?= $l ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?= $l ?>"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Vanja Gavrić | front-end developer | web developer</title>
        <meta name="description" content="<?= $lang[$l]["descriptionPlayground"] ?>">
        <meta name="viewport" content="width=device-width">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="apple-touch-icon-120x120-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">
        <!--[if IE]>
        <link rel="shortcut icon" href="favicon.ico">
        <![endif]-->
        <link rel="icon" type="image/png" href="favicon.png">
        <link rel="stylesheet" href="/assets/css/main.css">
        <script src="/assets/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body class="playground">
        <!--[if lte IE 8]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <nav id="main-nav" class="main-nav">
            <a href="/" id="logo" class="logo" title="Vanja Gavrić logo. <?= $lang[$l]['logoTitle'] ?>">
                <span class="circle">
                    VG
                </span> 
                <span class="back">
                    &larr;
                </span> 
            </a>
            <ul>
                <li>
                    <a href="/#developer" title="Developer.">
                        <i class="icon-code-1"></i>
                    </a>
                </li>
                <li>
                    <a href="/#photography" title="<?= $lang[$l]['photography'] ?>.">
                        <i class="icon-camera"></i>
                    </a>
                </li>
                <li>
                    <a href="/#writing" title="<?= $lang[$l]['writing'] ?>.">
                        <i class="icon-feather"></i>
                    </a>
                </li>
                <li>
                    <a href="/#contact" title="<?= $lang[$l]['contact'] ?>.">
                        <i class="icon-paper-plane"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <div id="top" class="top-anchor"></div>
        <!-- <div id="console"></div>         -->
        <main role="main">
            <h1><?= $lang[$l]['playground'] ?></h1>
            <section id="content" class="content1 playground-items">
                <article class="playground-item poof" id="poof" role="article">
                    <div class="row">
                        <a class="item-link" href="/playground/poof"></a>
                        <div class="columns large-4 title">
                            <div class="wrap">
                                <div class="inner">
                                    <h2>POOF!</h2>
                                </div>
                            </div>
                        </div>
                        <div class="columns large-8 description">
                            <div class="wrap">
                                <div class="inner">
                                    <span>Cross-browser compatible (including legacy browsers) solution for displaying a 'poof' animation on each click or tap (similar to removing icons from a Mac OS X dock).</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </article> <!-- end #poof -->

                <article class="playground-item old-tv" id="old-tv" role="article">
                    <div class="row">
                        <a class="item-link" href="/playground/turn-off-tv"></a>
                        <div class="columns large-4 title">
                            <div class="wrap">
                                <div class="inner">
                                    <h2>Old TV turn off animation</h2>
                                </div>
                            </div>
                        </div>
                        <div class="columns large-8 description">
                            <div class="wrap">
                                <div class="inner">
                                    <span>This simple jQuery plugin creates a turn off animation of an old TV in the current browser viewport. Its use is meant for situations when the user is logging out or is deleting the content currently on the screen etc. It will create the animation and load the url provided in the href attribute of the targeted element.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article> <!-- end #old-tv -->

                <article class="playground-item bb-connections" id="bb-connections" role="article">
                    <div class="row">
                        <a class="item-link" href="/playground/social-connections-backbone"></a>
                        <div class="columns large-4 title">
                            <div class="wrap">
                                <div class="inner">
                                    <h2>Backbone.js social connections </h2>
                                </div>
                            </div>
                        </div>
                        <div class="columns large-8 description">
                            <div class="wrap">
                                <div class="inner">
                                    <span>Small Backbone app that displays social connections by given data. Data is represented as a group of people and each person has one or more connections to the group.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article> <!-- end #bb-connections -->

                <article class="playground-item hex-clock" id="hex-clock" role="article">
                    <div class="row">
                        <a class="item-link" href="/playground/hexclock"></a>
                        <div class="columns large-4 title">
                            <div class="wrap">
                                <div class="inner">
                                    <h2>#clock</h2>
                                </div>
                            </div>
                        </div>
                        <div class="columns large-8 description">
                            <div class="wrap">
                                <div class="inner">
                                    <span>A hexadecimal clock that changes background color depending on the current time - from #000000 to #235959</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article> <!-- end #bb-connections -->

            </section> <!-- end #content -->
        </main>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
        <!-- // <script src="assets/js/vendor/jquery.easing.1.3.js"></script> -->
        <!-- // <script src="assets/js/vendor/jquery.backstretch.js"></script> -->
        <!-- // <script src="assets/js/vendor/skrollr.js"></script> -->
        <!-- // <script src="/assets/js/main.js"></script> -->
        <script src="/min/f=assets/js/main.js"></script>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-24663272-1', 'auto');
            ga('require', 'displayfeatures');
            ga('send', 'pageview');
        </script>
    </body>
</html>
