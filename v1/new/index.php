<?php
include_once('language.php');
$l = isset($_REQUEST['l']) ? strtolower($_REQUEST['l']) : false;

if (!$l || ($l !== 'hr' && $l !== 'en')) {
    // language not set via param

    // first check for cookies
    if ($_COOKIE['language'] === 'hr' || $_COOKIE['language'] === 'en') {
        // set l = cookie value if the cookie is found
        $l = $_COOKIE['language'];
    }
    else {
        // user did not provide a language nor did he/she previously set it
        // let's see if we can locate the user and set the according language
        include_once('ip2c/ip2country.php');
        $ip2c = new ip2country();
        $ip2c->mysql_host='localhost';
        $ip2c->db_user='vanja_website';
        $ip2c->db_pass='uymklfwd';
        $ip2c->db_name='vanja_vg_www';
        $ip2c->table_name='ip2c';
        $countryCode = $ip2c->get_country_code();

        if (($countryCode === "HR") || ($countryCode === "BA") || ($countryCode === "RS")) {
            $l = 'hr';
        }
        else {
            $l = 'en';
        }
    }
}

$langClassHr = '';
$langClassEn = '';
if ($l === 'hr') {
    $langClassHr = ' class="active"';
}
else {
    $langClassEn = ' class="active"';
}
// set cookie value 
setcookie('language', $l, time() + (86400 * 21)); // 86400 = 1 day
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?= $l ?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="<?= $l ?>"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="<?= $l ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?= $l ?>"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Vanja Gavrić | front-end developer | web developer</title>
        <meta name="description" content="<?= $lang[$l]["description"] ?>">
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
        <link rel="stylesheet" href="assets/css/main.css">
        <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <script>
        (function(){
            // to avoid implementing document ready or ugly onLoad=f(), 
            // this loader code is placed inside body (element body not undefined)
            var loaderHtml = '<div></div><div></div><div></div><div></div><h1><?= $lang[$l]["loading"] ?>...</h1>',
                loader = document.createElement('div');
            loader.id = 'loader';
            loader.className = 'loader';
            loader.innerHTML = loaderHtml;
            document.getElementsByTagName('body')[0].appendChild(loader);

            Modernizr.load([{
                // The test: does the browser understand Media Queries?
                test : Modernizr.mq('only all'),
                // If not, load the respond.min.js file
                nope : 'assets/js/vendor/respond.min.js'
            }]);
        }());
        </script>
        <!--[if lte IE 8]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <nav id="main-nav" class="main-nav fadeIn animation-1s animationDelay-4s">
            <a href="/" id="logo" class="logo">
                <span class="circle">
                    VG
                </span> 
            </a>
            <ul>
                <li>
                    <a href="#developer">
                        <i class="icon-code-1"></i>
                    </a>
                </li>
                <li>
                    <a href="#photography">
                        <i class="icon-camera"></i>
                    </a>
                </li>
                <li>
                    <a href="#writing">
                        <i class="icon-feather"></i>
                    </a>
                </li>
                <li>
                    <a href="#contact">
                        <i class="icon-paper-plane"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <div id="top" class="top-anchor"></div>
        <!-- <div id="console"></div>         -->
        <div id="intro" class="intro">
            <nav id="lang-selection" class="lang-selection fadeIn animation-1s animationDelay-4s">
                <ul>
                    <li>
                        <a<?= $langClassHr ?> href="/hr">HR</a>
                    </li>
                    <li>
                        <a<?= $langClassEn ?> href="/en">EN</a>
                    </li>
                </ul>
            </nav>
            <div id="abs-centered">
                <div class="row">
                    <div class="large-12 columns">
                        <h1>
                            <span class="fadeIn animation-600ms animationDelay-400ms"><?= $lang[$l]['salutation'] ?>.</span> <br> 
                            <span class="fadeIn animation-600ms animationDelay-2s"><?= $lang[$l]['iAm'] ?> Vanja.</span> <br>
                            <img src="assets/images/profile.jpg" class="profile-pic popupOut animation-400ms animationDelay-3s" width="110" height="110" alt="Vanja Gavrić profile photo">
                        </h1>
                    </div>
                </div>
            </div>
            <div class="scroll-down fadeIn animation-1s animationDelay-4s">
                <span>
                    <?= $lang[$l]['scrollDown'] ?> 
                </span>
                <i class="icon-down-circled"></i>
            </div>
        </div>


        <div id="skrollr-body">
            <div id="content" class="content">
                <div class="developer" id="developer">
                    <div class="row">
                        <div class="large-12 columns">
                            <h2 class="main-title-dev no-margin-bottom" id="main-title-dev"
                            data-anchor-target="#developer" 
                            data-bottom-top="transform:scale(1.46);opacity:0" 
                            data-top="transform:scale(1);opacity:1">
                                <?= $lang[$l]['iAm'] . ' ' . $lang[$l]['whoAmI'] ?> 
                            </h2>
                            <h2 class="subheader no-margin-top"
                            data-anchor-target="#developer" 
                            data-center-top="opacity:0" 
                            data-200-top="opacity:1">
                                <span><?= $lang[$l]['specializing'] ?> <i>front-end</i></span>
                            </h2>
                        </div>
                    </div>

                    <div data-anchor-target="#developer"
                    data-bottom-top="transform:translateY(30%);opacity:0;" 
                    data-top="transform:translateY(0%);opacity:1;">
                        <div class="row">
                            <div class="small-12 large-8 large-centered columns">
                                <h3 data-anchor-target="#developer" 
                                data-center-top="opacity:0" 
                                data-100-top="opacity:1">
                                    <?= $lang[$l]['skills'] ?>
                                </h3>
                                <ul class="skills" id="skills">
                                    <li>
                                        <div class="progress">
                                            <span class="meter"
                                            style="width:95%"
                                            data-anchor-target="#developer"
                                            data-bottom-top="width:0%;" 
                                            data-160-top="width:95%;">
                                                <span class="category">
                                                    HTML5 95%
                                                </span>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="progress">
                                            <span class="meter"
                                            style="width:95%"
                                            data-anchor-target="#developer"
                                            data-bottom-top="width:0%;" 
                                            data-120-top="width:95%;">
                                                <span class="category">
                                                    CSS3 95%
                                                </span>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="progress">
                                            <span class="meter"
                                            style="width:90%"
                                            data-anchor-target="#developer"
                                            data-bottom-top="width:0%;" 
                                            data-80-top="width:90%;">
                                                <span class="category">
                                                    Javascript 90%
                                                </span>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="progress">
                                            <span class="meter"
                                            style="width:70%"
                                            data-anchor-target="#developer"
                                            data-bottom-top="width:0%;" 
                                            data-60-top="width:70%;">
                                                <span class="category">
                                                    PHP 70%
                                                </span>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="progress">
                                            <span class="meter"
                                            style="width:70%"
                                            data-anchor-target="#developer"
                                            data-bottom-top="width:0%;" 
                                            data-40-top="width:70%;">
                                                <span class="category">
                                                    MySQL 70%
                                                </span>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="progress">
                                            <span class="meter"
                                            style="width:60%"
                                            data-anchor-target="#developer"
                                            data-bottom-top="width:0%;" 
                                            data-20-top="width:60%;">
                                                <span class="category">
                                                    <?= $lang[$l]['design'] ?> 60%
                                                </span>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                        </div>

                        <div class="technologies-wrap">
                            <div class="row experience">
                                <div class="large-12 columns">
                                    <h3><?= $lang[$l]['iHaveExperienceWith'] ?></h3>
                                    <div id="technologies-legend" class="technologies legend">
                                        <span class="front-end">Front-end frameworks</span>
                                        <span class="mvc">MVC frameworks</span>
                                        <span class="api">3rd-party APIs</span>
                                        <span class="test">Test frameworks</span>
                                        <span class="version-control">Version control</span>
                                        <span class="lib-fram">Libraries / frameworks</span>
                                        <span class="various"><?= $lang[$l]['various'] ?></span>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <ul id="technologies-list" class="technologies">
                                        <li class="label round front-end">Foundation</li>
                                        <li class="label round front-end">Bootstrap</li>
                                        <li class="label round mvc">BackboneJS</li>
                                        <li class="label round api">Facebook API</li>
                                        <li class="label round api">Twitter API</li>
                                        <li class="label round api">Google APIs</li>
                                        <li class="label round api">Flickr API</li>
                                        <li class="label round api">Rdio API</li>
                                        <li class="label round api">SoundCloud API</li>
                                        <li class="label round test">Jasmine</li>
                                        <li class="label round version-control">SVN</li>
                                        <li class="label round version-control">Git</li>
                                        <li class="label round lib-fram">jQuery (Zepto.JS)</li>
                                        <li class="label round lib-fram">Underscore.js (Lo-Dash)</li>
                                        <li class="label round lib-fram">Slim</li>
                                        <li class="label round various">SASS (Compass)</li>
                                        <li class="label round various">RequireJS</li>
                                        <li class="label round various">Sphinx</li>
                                        <li class="label round various">Redmine</li>
                                        <li class="label round various">Jira</li>
                                        <li class="label round various">Apache</li>
                                        <li class="label round various"><?= $lang[$l]['commandLine'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="large-12 columns">
                                <p>
                                    Language / framework / <strong>tool</strong> agnostic, whatever gets the job done.
                                </p>
                                <!-- <p>
                                        More soon
                                            GruntJS
                                            Selenium, CasperJS  (Test frameworks)
                                            Gumby (Front-end framework)
                                            AngularJS, EmberJS (MVC frameworks)
                                            Laravel
                                            XUI.JS, Swipe.JS

                                </p> -->
                                <p>I Translate user-centric design into web and applications that our users love <br>
                                I Design, test, development and maintenance of a web and mobile front-end code <br>
                                I Developing, testing and deploying production-quality code</p>
                                
                            </div>
                        </div>
                    </div> 
                </div> <!-- end #developer -->


                <div class="photography" id="photography">
                    <div class="row">
                        <div class="large-12 columns">
                            <h2 id="main-title-photo"
                            data-anchor-target="#photography" 
                            data-bottom="opacity:0.6" 
                            data-50-top="opacity:1">
                                <?= $lang[$l]['likePhotos'] ?>
                            </h2>

                            <h2 class="subheader"
                            data-anchor-target="#photography" 
                            data-bottom="opacity:0" 
                            data-top="opacity:1">
                                <span>(<?= $lang[$l]['someSay'] ?>)</span>
                            </h2>
                            <i class="icon icon-pause-circled" id="pause"
                            data-anchor-target="#photography" 
                            data-bottom="opacity:0" 
                            data-top="opacity:1"></i>
                        </div>
                    </div>
                    <div class="backstretch-wrap"
                    data-anchor-target="#photography" 
                    data-bottom-top="transform:translateY(14%);" 
                    data-top-bottom="transform:translateY(0%)">
                        <!-- empty -->
                    </div>
                </div> <!-- end #photography -->

                <div class="writing" id="writing">
                    <div class="row">
                        <div class="large-12 columns">
                            <div data-anchor-target="#writing" 
                            data-bottom-top="transform:scale(1.2);opacity:0" 
                            data-top="transform:scale(1);opacity:1">
                                <h2 class="no-margin-bottom" id="main-title-writing">
                                    <?= $lang[$l]['didWriting'] ?>
                                </h2>
                                <h2 class="subheader no-margin-top">
                                    (<?= $lang[$l]['clickForArticle'] ?>)
                                </h2>
                            </div>

                            <div class="row articles" id="articles"
                                data-anchor-target="#writing" 
                                data-bottom-top="transform:translateY(200px);"
                                data-top="transform:translateY(0px);">
                                <ul class="article-items large-block-grid-4 small-block-grid-4">
                                    <li data-anchor-target="#writing" 
                                    data-bottom-top="transform:translateY(-60px);"
                                    data-top="transform:translateY(3px);">
                                        <a href="assets/downloads/pdf/mobil-92-iphone.pdf">
                                            <img src="assets/images/articles/iphone.jpg" alt="iPhone on test" height="160" width="117">
                                        </a>
                                    </li>
                                    <li data-anchor-target="#writing" 
                                    data-bottom-top="transform:translateY(-30px);" 
                                    data-top="transform:translateY(10p)x;">
                                        <a href="assets/downloads/pdf/mobil-35-motorola.pdf">
                                            <img src="assets/images/articles/motorola.jpg" alt="Ambitious 20-year-old Motorola" height="160" width="119">
                                        </a>
                                    </li>
                                    <li data-anchor-target="#writing" 
                                    data-bottom-top="transform:translateY(-80px);" 
                                    data-top="transform:translateY(0px);">
                                        <a href="assets/downloads/pdf/mobil-37-microsoft.pdf">
                                            <img src="assets/images/articles/ms.jpg" alt="Microsoft conquers new markets" height="160" width="120">
                                        </a>
                                    </li>
                                    <li data-anchor-target="#writing" 
                                    data-bottom-top="transform:translateY(-30px);" 
                                    data-top="transform:translateY(4px);">
                                        <a href="assets/downloads/pdf/mreza-nokia.pdf">
                                            <img src="assets/images/articles/nokia.jpg" alt="Giants&rsquo; disproportion" height="160" width="114">
                                        </a>
                                    </li>
                                    <li data-anchor-target="#writing" 
                                    data-bottom-top="transform:translateY(60px);" 
                                    data-top="transform:translateY(3px);">
                                        <a href="assets/downloads/pdf/mobil-37-stungun.pdf">
                                            <img src="assets/images/articles/stungun.jpg" alt="Stungun - this phone is not for talking" height="160" width="118">
                                        </a>
                                    </li>
                                    <li data-anchor-target="#writing" 
                                    data-bottom-top="transform:translateY(60px);" 
                                    data-top="transform:translateY(5px);">
                                        <a href="assets/downloads/pdf/mobil-40-41-treo.pdf">
                                            <img src="assets/images/articles/treo.jpg" alt="A cell phone, finally!" height="160" width="120">
                                        </a>
                                    </li>
                                    <li data-anchor-target="#writing" 
                                    data-bottom-top="transform:translateY(80px);" 
                                    data-top="transform:translateY(0px);">
                                        <a href="assets/downloads/pdf/mobil-75-usa.pdf">
                                            <img src="assets/images/articles/usa.jpg" alt="Made in U.S.A." height="160" width="118">
                                        </a>
                                    </li>
                                    <li data-anchor-target="#writing" 
                                    data-bottom-top="transform:translateY(30px);" 
                                    data-top="transform:translateY(3px);">
                                        <a href="assets/downloads/pdf/mobil-40-41-alcatel.pdf">
                                            <img src="assets/images/articles/alcatel.jpg" alt="Alcatel 535 - daltonism cured" height="160" width="119">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- end #writing -->


                <div class="contact" id="contact">
                    <div class="row">
                        <div class="large-12 columns">
                            <h1 data-anchor-target="#contact" 
                            data-bottom-top="transform:scale(1.2);opacity:0" 
                            data-bottom="transform:scale(1);opacity:1">
                                <?= $lang[$l]['contactMe'] ?>
                            </h1>

                            <h2 class="subheader no-margin-bottom"><?= $lang[$l]['viaSocial'] ?></h2>
                            <div class="row">
                                <ul class="contact-circles large-block-grid-6 small-block-grid-3"
                                data-anchor-target="#contact" 
                                data-bottom-top="transform:translateX(130%)"
                                data-bottom="transform:translateX(0%)">
                                    <li class="contact-circle">
                                        <a href="https://twitter.com/iamvanja">
                                            <span class="circle twitter"
                                            data-anchor-target="#contact" 
                                            data-bottom-top="transform:rotate(1080deg)"
                                            data-bottom="transform:rotate(0deg)">
                                                <i class="icon-twitter-1"></i>
                                            </span>
                                            <span data-anchor-target="#contact" 
                                            data-40-bottom="opacity:0"
                                            data-bottom="opacity:1">
                                                Twitter
                                            </span>
                                        </a>
                                    </li>
                                    <li class="contact-circle">
                                        <a href="http://www.facebook.com/vanja.gavric">
                                            <span class="circle facebook"
                                            data-anchor-target="#contact" 
                                            data-bottom-top="transform:rotate(1020deg)"
                                            data-bottom="transform:rotate(0deg)">
                                                <i class="icon-facebook-1"></i>
                                            </span>
                                            <span data-anchor-target="#contact" 
                                            data-40-bottom="opacity:0"
                                            data-bottom="opacity:1">
                                                Facebook
                                            </span>
                                        </a>
                                    </li>
                                    <li class="contact-circle">
                                        <a href="http://www.linkedin.com/in/vanjagavric">
                                            <span class="circle linkedin"
                                            data-anchor-target="#contact" 
                                            data-bottom-top="transform:rotate(960deg)"
                                            data-bottom="transform:rotate(0deg)">
                                                <i class="icon-linkedin"></i>
                                            </span>
                                            <span data-anchor-target="#contact" 
                                            data-40-bottom="opacity:0"
                                            data-bottom="opacity:1">
                                                LinkedIn
                                            </span>
                                        </a>
                                    </li>
                                    <li class="contact-circle">
                                        <a href="https://github.com/iamvanja">
                                            <span class="circle github"
                                            data-anchor-target="#contact" 
                                            data-bottom-top="transform:rotate(900deg)"
                                            data-bottom="transform:rotate(0deg)">
                                                <i class="icon-github-circled"></i>
                                            </span>
                                            <span data-anchor-target="#contact" 
                                            data-40-bottom="opacity:0"
                                            data-bottom="opacity:1">
                                                GitHub
                                            </span>
                                        </a>
                                    </li>
                                    <li class="contact-circle">
                                        <a href="http://flickr.com/vanja-gavric">
                                            <span class="circle flickr"
                                            data-anchor-target="#contact" 
                                            data-bottom-top="transform:rotate(840deg)"
                                            data-bottom="transform:rotate(0deg)">
                                                <i class="icon-flickr-1"></i>
                                            </span>
                                            <span data-anchor-target="#contact" 
                                            data-40-bottom="opacity:0"
                                            data-bottom="opacity:1">
                                                Flickr
                                            </span>
                                        </a>
                                    </li>
                                    <li class="contact-circle">
                                        <a href="http://500px.com/iamvanja">
                                            <span class="circle fivehundredpx"
                                            data-anchor-target="#contact" 
                                            data-bottom-top="transform:rotate(780deg)"
                                            data-bottom="transform:rotate(0deg)">
                                                <i class="icon-fivehundredpx"></i>
                                            </span>
                                            <span data-anchor-target="#contact" 
                                            data-40-bottom="opacity:0"
                                            data-bottom="opacity:1">
                                                500px
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <h2 class="subheader no-margin-bottom"><?= $lang[$l]['or'] ?></h2>

                                <ul class="contact-circles small-block-grid-2"
                                data-anchor-target="#contact" 
                                data-bottom-top="transform:translateX(-130%)"
                                data-bottom="transform:translateX(0%)">
                                    <li class="contact-circle" id="contact-circle">
                                        <a href="mailto:&#118;&#97;&#110;&#106;&#97;&#91;&#97;&#116;&#93;&#103;&#97;&#118;&#114;&#105;&#99;&#91;&#100;&#111;&#116;&#93;&#111;&#114;&#103;">
                                            <span class="circle mail"
                                            data-anchor-target="#contact" 
                                            data-bottom-top="transform:rotate(-930deg)"
                                            data-bottom="transform:rotate(0deg)">
                                                <i class="icon-mail"></i>
                                            </span>
                                            <span data-anchor-target="#contact" 
                                            data-10-bottom="opacity:0"
                                            data-bottom="opacity:1">
                                                <?= $lang[$l]['dropEmail'] ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="contact-circle">
                                        <a href="skype:vanja1000?call">
                                            <span class="circle skype"
                                            data-anchor-target="#contact" 
                                            data-bottom-top="transform:rotate(-720deg)"
                                            data-bottom="transform:rotate(0deg)">
                                                <i class="icon-skype"></i>
                                            </span>
                                            <span data-anchor-target="#contact" 
                                            data-10-bottom="opacity:0"
                                            data-bottom="opacity:1">
                                                <?= $lang[$l]['callSkype'] ?>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div> <!-- end #contact -->
                <div class="footer" id="footer">
                    <div class="footer-wrap">
                        <div class="row">
                            <div class="large-8 small-8 columns left">
                                <p>
                                    <?= $lang[$l]['siteBy'] ?> <a href="http://vanja.gavric.org" title="Vanja Gavrić web"><span>vanja</span>.gavric</a> &copy; 
                                </p>
                                <p>
                                    <?= $lang[$l]['handmade'] ?> :)
                                </p>
                            </div>
                            <div class="large-4 small-4 columns right">
                                <p>
                                    <a href="/v1"><?= $lang[$l]['old'] ?> v1 site</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end #footer -->
            </div> <!-- end #content -->
        </div> <!-- end #skrollr-body -->
        <nav>
            <a id="back-to-top" class="back-to-top" href="#top">
                <i class="icon-up-circled"></i>
            </a>
        </nav>




        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script>

        // Opera won't start animation without document ready event
        $(function() {
            var $loader = $('#loader'),
                $firstBorder = $('#loader > div:nth-child(1)');
                $fourthBorder = $('#loader > div:nth-child(4)'),
                transEndEventNames = {
                    'WebkitTransition' : 'webkitTransitionEnd',
                    'MozTransition'    : 'transitionend',
                    'OTransition'      : 'oTransitionEnd otransitionend',
                    'msTransition'     : 'MSTransitionEnd',
                    'transition'       : 'transitionend'
                },
                transEndEventName = transEndEventNames[ Modernizr.prefixed('transition') ],
                firstAnimationEnd = function() {
                    $fourthBorder.one(transEndEventName, function() {
                        $loader.addClass('border-clear');
                        // console.log('first');
                        secondAnimationEnd();
                    });
                },
                secondAnimationEnd = function() {
                    $firstBorder.one(transEndEventName, function() {
                        $loader.removeClass('border-fill border-clear').addClass('border-fill');
                        // console.log('second');
                        firstAnimationEnd();
                    });     
                };


            $loader.addClass('border-fill');
            firstAnimationEnd();
            secondAnimationEnd();
        });
        </script>

        <script src="assets/js/vendor/jquery.easing.1.3.js"></script>
        <script src="assets/js/vendor/skrollr.js"></script>
        <script src="assets/js/vendor/jquery.backstretch.js"></script>
        <script src="assets/js/main.js"></script>
        <script>
        //     var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        //     (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        //     g.src='//www.google-analytics.com/ga.js';
        //     s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
