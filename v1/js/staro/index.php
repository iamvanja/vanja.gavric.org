<?php 
	if ( isset($_GET['lang']) ) {
    $lang = $_GET['lang'];
    }
    else {$lang = 'en';}
  $dir = 'languages'; 
  include_once("$dir/$lang.lng"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $lang ?>" xml:lang="<?php echo $lang ?>">
<head>
<title><?php echo $head['title']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="favicon.ico"  type="image/x-icon"/>
<meta name="description" content="<?php echo $head['title']; ?>" />
<meta name="author" content="Vanja Gavrić" />
<meta name="keywords" content="<?php echo $head['keywords']; ?>" />

<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" /> 
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />  
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.2.6.css"/>

<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="js/general.js"></script>
<script type="text/javascript" src="js/form-pack-<?php echo $lang ?>.js"></script>
<script type="text/javascript" src="js/preloadCssImages.jQuery_v5.js"></script>
<script type="text/javascript" src="js/twitter-1.13.1.min.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-1.2.6.pack.js"></script>
<script type="text/javascript" src="js/animacija-pack-<?php echo $lang ?>.js"></script>
<script type="text/javascript">
  var vg="<?php echo $left['h1']; ?>";
 	var novinar="<?php echo $center['je_novinar']; ?>";
 	var programer="<?php echo $center['je_programer']; ?>";
 	var fotograf="<?php echo $center['je_fotograf']; ?>";
 	var form_h1 = "<?php echo $form['js_h1']; ?>";
 	var form_p = "<?php echo $form['js_p']; ?>";
</script>

<!--[if lte IE 6]> <style type="text/css">#ie6-error {display:block;}</style><![endif]-->	
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]--> 
<script src="js/jflickrfeed.min.js"></script>
</head>

<body>
<div id="bg1">&nbsp;</div>

<div id="wrapper">
<div id="left">
	<ul id="lang">
		<?php echo $left['first']; ?>
		<?php echo $left['second']; ?>
	</ul>
	<h1><?php echo $left['h1']; ?>...</h1>
	<p class="more"><?php echo $left['more']; ?> </p>
	<ul id="links">
		<li>
			<a href="blog/"><del><?php echo $left['blog']; ?> <span>&raquo;</span></del></a> <?php echo $left['blog_soon']; ?>
		</li>
		<!-- <li class="visitphoto"><a href="#"><span>Visit my photopage &raquo;</span></a></li> -->
		<li>
			<a class="con" href="<?php echo $left['contact_href']; ?>" rel="nofollow"><?php echo $left['contact']; ?> <span>&raquo;</span></a>
		</li>
	</ul> <!-- end of links -->
	
	<div id="twitter_bg"><p>Twitter</p></div>
	<div id="tweet">
		<p><?php echo $left['twitter']; ?></p>
	</div>
	
	<ul id="networks">
		<li>
			<a href="http://twitter.com/iVanja1" rel="me"><img src="images/networks/twitter.png" width="40" height="41" alt="Twitter" /></a>
		</li>
		<li>
			<a href="http://flickr.com/vanja-gavric" rel="me"><img src="images/networks/flickr.png" width="40" height="41" alt="Flickr" /></a>
		</li>
		<li>
			<a href="http://www.facebook.com/vanja.gavric" rel="me"><img src="images/networks/facebook.png" width="40" height="41" alt="Facebook" /></a>
		</li>
		<li>
			<a href="http://www.linkedin.com/in/vanjagavric" rel="me"><img src="images/networks/linkedin.png" width="40" height="41" alt="LinkedIn" /></a>
		</li>
		<li>
			<a href="http://www.youtube.com/VanjaMk1" rel="me"><img src="images/networks/youtube.png" width="40" height="41" alt="Youtube" /></a>
		</li>
	</ul> <!-- end of networks -->
	<div id="footer"> <p>&copy; Vanja Gavrić 1985-<?php echo gmdate("Y"); ?></p></div>
</div> <!-- end of left -->

<div id="center">
	<ul>
		<li id="writer-box"><a href="#" id="otvori1"><?php echo $center['writer']; ?></a></li>
		<li id="developer-box"><a href="#" id="otvori2"><?php echo $center['developer']; ?></a></li>
		<li id="photographer-box"><a href="#" id="otvori3"><?php echo $center['photographer']; ?></a></li>
	</ul>
</div> <!-- end of center -->

<div id="right">
	<!-- WRITER -->
	<div id="writer">
	<div class="_top">
		<a id="zatvori1" name="writer" href="#"><img src="images/strelica.png" alt="close" /></a>
		<h1 class="writerh1"><?php echo $writer['h1']; ?></h1>
	</div>
	<div class="_cent"> 
		<?php echo $writer['p']; ?>

	</div>
	<div class="_bot">&nbsp;</div>
	</div> <!-- end of writer -->			

	<!-- developer -->
	<div id="developer">
	<div class="_top">
		<a id="zatvori2" name="developer" href="#"><img src="images/strelica.png" alt="close" /></a>
		<h1 class="developerh1"><?php echo $developer['h1']; ?></h1>
	</div>
	<div class="_cent">
		<?php echo $developer['p']; ?>
	</div>
	<div class="_bot"></div>
	</div> <!-- end of developer -->

	<!-- PHOTOGRAPHER -->
	<div id="photographer">
	<div class="_top">				
		<a id="zatvori3" name="photographer" href="#"><img src="images/strelica.png" alt="zatvori" /></a>
		<h1 class="photographerh1"><?php echo $photographer['h1']; ?></h1>
	</div>
	<div class="_cent">
		<?php echo $photographer['p']; ?>
	</div>
	<div class="_bot"></div>
	</div> <!-- end of photographer -->

</div> <!-- end of right --> 
</div> <!-- end of wrapper -->
<p id="noscript"><img src="images/error.gif" alt="error" /><?php echo $body['noscript']; ?></p>
<p id="ie6-error"><img src="images/error.gif" alt="error" /><?php echo $body['ie6-error']; ?></p>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-12974394-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>