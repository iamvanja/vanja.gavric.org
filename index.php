<?php
// Error settings
// error_reporting(E_ALL);
error_reporting(0);
ini_set('display_errors', 'off');

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

        if (($countryCode === 'HR') || ($countryCode === 'BA') || ($countryCode === 'RS')) {
            // if the visitor is from Croatia, Bosnia or Serbia - load Croatian language
            $l = 'hr';
        }
        else {
            // otherwise load English
            $l = 'en';
        }
    }
}

// setup active classes for language
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
            // to avoid implementing document ready or using ugly onLoad=f(), 
            // this loader code is placed inside body (body element won't be undefined)
            var loaderHtml = '<div></div><div></div><div></div><div></div><h1 data-alternative="<?= $lang[$l]["loadingAlt"] ?>"><?= $lang[$l]["loading"] ?>...</h1>',
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
            <a href="/" id="logo" class="logo" title="Vanja Gavrić logo. <?= $lang[$l]['logoTitle'] ?>">
                <span class="circle">
                    VG
                </span> 
            </a>
            <ul>
                <li>
                    <a href="#developer" title="Developer.">
                        <i class="icon-code-1"></i>
                    </a>
                </li>
                <li>
                    <a href="#photography" title="<?= $lang[$l]['photography'] ?>.">
                        <i class="icon-camera"></i>
                    </a>
                </li>
                <li>
                    <a href="#writing" title="<?= $lang[$l]['writing'] ?>.">
                        <i class="icon-feather"></i>
                    </a>
                </li>
                <li>
                    <a href="#contact" title="<?= $lang[$l]['contact'] ?>.">
                        <i class="icon-paper-plane"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <div id="top" class="top-anchor"></div>
        <!-- <div id="console"></div>         -->
        <header id="intro" class="intro">
            <nav id="lang-selection" class="lang-selection fadeIn animation-1s animationDelay-4s"
            role="navigation">
                <ul>
                    <li>
                        <a<?= $langClassHr ?> href="/hr">HR</a>
                    </li>
                    <li>
                        <a<?= $langClassEn ?> href="/en">EN</a>
                    </li>
                </ul>
            </nav>
            <div id="intro-centered" class="centered">
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
                <a href="#developer">
                    <span>
                        <?= $lang[$l]['scrollDown'] ?> 
                    </span>
                    <i class="icon-down-circled"></i>
                </a>
            </div>
        </header>
        <main role="main">


        <div id="skrollr-body">
            <section id="content" class="content">
                <article class="developer" id="developer" role="article" aria-labelledby="main-title-dev">
                    <div data-anchor-target="#developer"
                        data-bottom-top="transform:translate3d(0px,40%,0px);opacity:0;" 
                        data-top="transform:translate3d(0px,0%,0px);opacity:1;">
                        
                    
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

                    <div class="row">
                        <div class="small-12 large-8 large-centered columns">
                            <h3>
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
                                        data-20-top="width:50%;">
                                            <span class="category">
                                                <?= $lang[$l]['design'] ?> 50%
                                            </span>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <hr>
                    </div>
</div>

                    <div class="technologies-wrap" data-anchor-target="#skills"
                    data-bottom-top="transform:translate3d(0px,-10%,0px);opacity:0;" 
                    data-center-bottom="transform:translate3d(0px,0%,0px);opacity:1;">
                        <div class="row experience">
                            <div class="large-12 columns">
                                <h3><?= $lang[$l]['iHaveExperienceWith'] ?></h3>
                                <div id="technologies-legend" class="technologies legend">
                                    <span class="front-end">Front-end frameworks</span>
                                    <span class="mvc">MVC JS frameworks</span>
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
                                    <li class="label round lib-fram">Handlebars</li>
                                    <li class="label round lib-fram">CodeIgniter</li>
                                    <li class="label round various">SASS (Compass)</li>
                                    <li class="label round various">RequireJS</li>
                                    <li class="label round various">Sphinx</li>
                                    <li class="label round various">Redmine</li>
                                    <li class="label round various">Jira</li>
                                    <li class="label round various">Apache</li>
                                    <li class="label round various"><?= $lang[$l]['commandLine'] ?></li>
                                    <li class="label round various">Agile</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <p class="tc">
                                <?= $lang[$l]['skillsExplanation'] ?>
                            </p>
                            <?= $lang[$l]['developerText'] ?>
                        </div>
                    </div>
                </article> <!-- end #developer -->

                <article class="photography" id="photography" role="article" aria-labelledby="main-title-photo">
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
                    data-bottom-top="transform:translate3d(0px,-30%,0px);" 
                    data-top-bottom="transform:translate3d(0px,0%),0px">
                        <!-- empty -->
                    </div>
                </article> <!-- end #photography -->

                <article class="writing" id="writing" role="article" aria-labelledby="main-title-writing">
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
                                data-bottom-top="transform:translate3d(0px,200px,0px);"
                                data-top="transform:translate3d(0px,0px,0px);">
                                <ul class="article-items large-block-grid-4 small-block-grid-4">
                                    <li data-anchor-target="#writing" 
                                    data-bottom-top="transform:translate3d(0px,-60px,0px);"
                                    data-top="transform:translate3d(0px,3px,0px);">
                                        <a href="assets/downloads/pdf/mobil-92-iphone.pdf">
                                            <img src="assets/images/articles/iphone.jpg" alt="<?= $lang[$l]['articleiPhone'] ?>" height="160" width="117">
                                        </a>
                                    </li>
                                    <li data-anchor-target="#writing" 
                                    data-bottom-top="transform:translate3d(0px,-30px,0px);"
                                    data-top="transform:translate3d(0px,10p,0px)x;">
                                        <a href="assets/downloads/pdf/mobil-35-motorola.pdf">
                                            <img src="assets/images/articles/motorola.jpg" alt="<?= $lang[$l]['articleMotorola'] ?>" height="160" width="119">
                                        </a>
                                    </li>
                                    <li data-anchor-target="#writing" 
                                    data-bottom-top="transform:translate3d(0px,-80px,0px);"
                                    data-top="transform:translate3d(0px,0px,0px);">
                                        <a href="assets/downloads/pdf/mobil-37-microsoft.pdf">
                                            <img src="assets/images/articles/ms.jpg" alt="<?= $lang[$l]['articleMs'] ?>" height="160" width="120">
                                        </a>
                                    </li>
                                    <li data-anchor-target="#writing" 
                                    data-bottom-top="transform:translate3d(0px,-30px,0px);"
                                    data-top="transform:translate3d(0px,4px,0px);">
                                        <a href="assets/downloads/pdf/mreza-nokia.pdf">
                                            <img src="assets/images/articles/nokia.jpg" alt="<?= $lang[$l]['articleNokia'] ?>" height="160" width="114">
                                        </a>
                                    </li>
                                    <li data-anchor-target="#writing" 
                                    data-bottom-top="transform:translate3d(0px,60px,0px);"
                                    data-top="transform:translate3d(0px,3px,0px);">
                                        <a href="assets/downloads/pdf/mobil-37-stungun.pdf">
                                            <img src="assets/images/articles/stungun.jpg" alt="<?= $lang[$l]['articleStungun'] ?>" height="160" width="118">
                                        </a>
                                    </li>
                                    <li data-anchor-target="#writing" 
                                    data-bottom-top="transform:translate3d(0px,60px,0px);"
                                    data-top="transform:translate3d(0px,5px,0px);">
                                        <a href="assets/downloads/pdf/mobil-40-41-treo.pdf">
                                            <img src="assets/images/articles/treo.jpg" alt="<?= $lang[$l]['articleTreo'] ?>" height="160" width="120">
                                        </a>
                                    </li>
                                    <li data-anchor-target="#writing" 
                                    data-bottom-top="transform:translate3d(0px,80px,0px);"
                                    data-top="transform:translate3d(0px,0px,0px);">
                                        <a href="assets/downloads/pdf/mobil-75-usa.pdf">
                                            <img src="assets/images/articles/usa.jpg" alt="<?= $lang[$l]['articleUSA'] ?>" height="160" width="118">
                                        </a>
                                    </li>
                                    <li data-anchor-target="#writing" 
                                    data-bottom-top="transform:translate3d(0px,30px,0px);"
                                    data-top="transform:translate3d(0px,3px,0px);">
                                        <a href="assets/downloads/pdf/mobil-40-41-alcatel.pdf">
                                            <img src="assets/images/articles/alcatel.jpg" alt="<?= $lang[$l]['articleAlcatel'] ?>" height="160" width="119">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article> <!-- end #writing -->

                <article class="contact" id="contact" role="article" aria-labelledby="main-title-contact">
                    <div class="row">
                        <div class="large-12 columns">
                            <h1 data-anchor-target="#contact" id="main-title-contact"
                            data-bottom-top="transform:scale(1.2);opacity:0" 
                            data-bottom="transform:scale(1);opacity:1">
                                <?= $lang[$l]['contactMe'] ?>
                            </h1>

                            <h2 class="subheader no-margin-bottom"><?= $lang[$l]['viaSocial'] ?></h2>
                            <div class="row">
                                <ul class="contact-circles large-block-grid-6 small-block-grid-3"
                                data-anchor-target="#contact" 
                                data-bottom-top="transform:translate3d(130%,0px,0px)"
                                data-100-bottom="transform:translate3d(0%,0px,0px)">
                                    <li class="contact-circle">
                                        <a href="https://twitter.com/iamvanja">
                                            <span class="circle twitter"
                                            data-anchor-target="#contact" 
                                            data-bottom-top="transform:rotate(1080deg)"
                                            data-100-bottom="transform:rotate(0deg)">
                                                <i class="icon-twitter-1"></i>
                                            </span>
                                            <span class="text" data-anchor-target="#contact" 
                                            data-140-bottom="opacity:0"
                                            data-100-bottom="opacity:1">
                                                Twitter
                                            </span>
                                        </a>
                                    </li>
                                    <li class="contact-circle">
                                        <a href="http://www.facebook.com/vanja.gavric">
                                            <span class="circle facebook"
                                            data-anchor-target="#contact" 
                                            data-bottom-top="transform:rotate(1020deg)"
                                            data-100-bottom="transform:rotate(0deg)">
                                                <i class="icon-facebook-1"></i>
                                            </span>
                                            <span class="text" data-anchor-target="#contact" 
                                            data-140-bottom="opacity:0"
                                            data-100-bottom="opacity:1">
                                                Facebook
                                            </span>
                                        </a>
                                    </li>
                                    <li class="contact-circle">
                                        <a href="http://www.linkedin.com/in/vanjagavric">
                                            <span class="circle linkedin"
                                            data-anchor-target="#contact" 
                                            data-bottom-top="transform:rotate(960deg)"
                                            data-100-bottom="transform:rotate(0deg)">
                                                <i class="icon-linkedin"></i>
                                            </span>
                                            <span class="text" data-anchor-target="#contact" 
                                            data-140-bottom="opacity:0"
                                            data-100-bottom="opacity:1">
                                                LinkedIn
                                            </span>
                                        </a>
                                    </li>
                                    <li class="contact-circle">
                                        <a href="https://github.com/iamvanja">
                                            <span class="circle github"
                                            data-anchor-target="#contact" 
                                            data-bottom-top="transform:rotate(900deg)"
                                            data-100-bottom="transform:rotate(0deg)">
                                                <i class="icon-github-circled"></i>
                                            </span>
                                            <span class="text" data-anchor-target="#contact" 
                                            data-140-bottom="opacity:0"
                                            data-100-bottom="opacity:1">
                                                GitHub
                                            </span>
                                        </a>
                                    </li>
                                    <li class="contact-circle">
                                        <a href="http://flickr.com/vanja-gavric">
                                            <span class="circle flickr"
                                            data-anchor-target="#contact" 
                                            data-bottom-top="transform:rotate(840deg)"
                                            data-100-bottom="transform:rotate(0deg)">
                                                <i class="icon-flickr-1"></i>
                                            </span>
                                            <span class="text" data-anchor-target="#contact" 
                                            data-140-bottom="opacity:0"
                                            data-100-bottom="opacity:1">
                                                Flickr
                                            </span>
                                        </a>
                                    </li>
                                    <li class="contact-circle">
                                        <a href="http://500px.com/iamvanja">
                                            <span class="circle fivehundredpx"
                                            data-anchor-target="#contact" 
                                            data-bottom-top="transform:rotate(780deg)"
                                            data-100-bottom="transform:rotate(0deg)">
                                                <i class="icon-fivehundredpx"></i>
                                            </span>
                                            <span class="text" data-anchor-target="#contact" 
                                            data-140-bottom="opacity:0"
                                            data-100-bottom="opacity:1">
                                                500px
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <h2 class="subheader no-margin-bottom"><?= $lang[$l]['or'] ?></h2>
                            <ul class="contact-circles small-block-grid-2"
                            data-anchor-target="#contact" 
                            data-bottom-top="transform:translate3d(-130%,0px,0px)"
                            data-50-bottom="transform:translate3d(0%,0px,0px)">
                                <li class="contact-circle" id="contact-circle">
                                    <a href="#">
                                        <span class="circle mail"
                                        data-anchor-target="#contact" 
                                        data-bottom-top="transform:rotate(-930deg)"
                                        data-50-bottom="transform:rotate(0deg)">
                                            <i class="icon-mail"></i>
                                        </span>
                                        <span class="text" data-anchor-target="#contact" 
                                        data-50-bottom="opacity:0"
                                        data-20-bottom="opacity:1">
                                            <?= $lang[$l]['dropEmail'] ?>
                                            <noscript>&#118;&#97;&#110;&#106;&#97;&#91;&#97;&#116;&#93;&#103;&#97;&#118;&#114;&#105;&#99;&#91;&#100;&#111;&#116;&#93;&#111;&#114;&#103;</noscript>
                                        </span>
                                    </a>
                                </li>
                                <li class="contact-circle">
                                    <a href="skype:vanja1000?call">
                                        <span class="circle skype"
                                        data-anchor-target="#contact" 
                                        data-bottom-top="transform:rotate(-720deg)"
                                        data-50-bottom="transform:rotate(0deg)">
                                            <i class="icon-skype"></i>
                                        </span>
                                        <span class="text" data-anchor-target="#contact" 
                                        data-50-bottom="opacity:0"
                                        data-20-bottom="opacity:1">
                                            <?= $lang[$l]['callSkype'] ?>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </article> <!-- end #contact -->
            </section> <!-- end #content -->

            <footer class="footer" id="footer" role="contentinfo">
                <div class="footer-wrap">
                    <div class="row">
                        <div class="large-9 small-7 columns left">
                            <p>
                                <?= $lang[$l]['handmade'] ?> :)
                            </p>
                        </div>
                        <div class="large-3 small-5 columns right">
                            <p>
                                &copy; <a href="http://vanja.gavric.org" title="Vanja Gavrić web"><span>vanja</span>.gavric</a>
                            </p>
                            <p class="smaller">
                                <a href="/v1">v1 site</a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer> <!-- end #footer -->

        </div> <!-- end #skrollr-body -->
        </main>

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
                $firstBorder = $('#loader > div:nth-child(1)'),
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

            // fires after 4s to change the loading text
            // if loading is already removed (finished loading), 
            // the $loader won't be found in the DOM and all is still good
            var loadingTimer = window.setTimeout(function(){
                var alternativeText = $loader.find('h1').attr('data-alternative');
                $loader.find('h1').fadeOut(function(){
                    $(this).html(alternativeText).fadeIn();
                });
            }, 10000);

        });
        </script>

        <!-- // <script src="assets/js/vendor/jquery.easing.1.3.js"></script> -->
        <!-- // <script src="assets/js/vendor/jquery.backstretch.js"></script> -->
        <!-- // <script src="assets/js/vendor/skrollr.js"></script> -->
        <!-- // <script src="assets/js/main.js"></script> -->
        <script src="min/?g=main.min.js"></script>
        <script>
            var _gaq=[['_setAccount','UA-24663272-1'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
