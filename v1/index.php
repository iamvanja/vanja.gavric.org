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
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="description" content="<?php echo $head['title']; ?>" />
<meta name="author" content="Vanja Gavrić" />
<meta name="keywords" content="<?php echo $head['keywords']; ?>" />

<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" /> 
<link rel="stylesheet" type="text/css" href="css/vg-style.css" media="screen" /> 
<link rel="stylesheet" type="text/css" href="css/vg-form.css" media="screen"/>  

<script type="text/javascript" src="js/jquery-1.4.min.js"></script>
<script type="text/javascript" src="js/jquery.ba-hashchange.min.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-1.3.4.js"></script>
<script type="text/javascript" src="js/jflickrfeed.min.js"></script>

<script type="text/javascript" src="js/general.js"></script>
<script type="text/javascript" src="js/animation.js"></script>
<script type="text/javascript" src="js/form-pack.js"></script>
<script type="text/javascript">
	var title = "<?php echo $head['title']; ?>";
  var vg="<?php echo $left['h1']; ?>";
 	var novinar="<?php echo $center['je_novinar']; ?>";
 	var programer="<?php echo $center['je_programer']; ?>";
 	var fotograf="<?php echo $center['je_fotograf']; ?>";
 	var form_h1 = "<?php echo $form['js_h1']; ?>";
 	var form_p = "<?php echo $form['js_p']; ?>";
 	var fancybox_error = "<?php echo $fancybox['error']; ?>";
 	var fancybox_image = "<?php echo $fancybox['image']; ?>";
 </script>
<!--[if lte IE 7]> <style type="text/css">#ie6-error {display:block;}</style><![endif]-->	
<!--[if IE 8]> <style type="text/css">#ie8-error {display:block;}</style><![endif]-->	
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]--> 
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24663272-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>

<body>
<div id="preload">
	<img src="images/right_01.png" alt=""/>
	<img src="images/right_02a.png" alt="" />
</div>
<div id="bg1">&nbsp;</div>
<div id="wrapper">
<div id="left">
<ul id="lang">
		<?php echo $left['lang1']; ?>
		<?php echo $left['lang2']; ?>
</ul>
	<h1><?php echo $left['h1']; ?>...</h1>
	<h2 class="keywords"><?php echo $left['keywords']; ?></h2>
	<p class="more"><?php echo $left['more']; ?> </p>
	<h2><?php echo $left['links']; ?></h2>
	<ul id="links">
		<li>
			<a href="blog/" rel="external"><del><?php echo $left['blog']; ?> <span>&raquo;</span></del></a> <?php echo $left['blog_soon']; ?>
		</li>
		<!-- <li><a href="#"><span>Visit my photopage &raquo;</span></a></li> -->
		<li>
			<a class="contact" href="#contact_form"><?php echo $left['contact']; ?> <span>&raquo;</span></a>
		</li>
	</ul> <!-- end of links -->

	<h2 class="social"><?php echo $left['social']; ?></h2>
	<ul id="networks">
		<li>
			<a href="http://twitter.com/iamvanja" rel="me external"><img src="images/networks/twitter.png" width="40" height="41" alt="Vanja Gavrić Twitter" /></a>
		</li>
		<li>
			<a href="http://flickr.com/vanja-gavric" rel="me external"><img src="images/networks/flickr.png" width="40" height="41" alt="Vanja Gavrić Flickr" /></a>
		</li>
		<li>
			<a href="http://www.facebook.com/vanja.gavric" rel="me external"><img src="images/networks/facebook.png" width="40" height="41" alt="Vanja Gavrić Facebook" /></a>
		</li>
		<li>
			<a href="http://www.linkedin.com/in/vanjagavric" rel="me external"><img src="images/networks/linkedin.png" width="40" height="41" alt="Vanja Gavrić LinkedIn" /></a>
		</li>
		<li>
			<a href="http://www.youtube.com/VanjaMk1" rel="me external"><img src="images/networks/youtube.png" width="40" height="41" alt="Vanja Gavrić Youtube" /></a>
		</li>
	</ul> <!-- end of networks -->
	<div id="footer"> <p>&copy; Vanja Gavrić 1985-<?php echo gmdate("Y"); ?> (v1.2)</p></div>
</div> <!-- end of left -->

<div id="center">
	<ul>
		<li id="writer-box"><a href="#writer"><?php echo $center['writer']; ?></a></li>
		<li id="developer-box"><a href="#developer"><?php echo $center['developer']; ?></a></li>
		<li id="photographer-box"><a href="#photographer"><?php echo $center['photographer']; ?></a></li>
	</ul>
</div> 

<div id="right">
	<!-- writer -->
	<div id="writer">
		<a class="close" name="<?php echo $writer['h1']; ?>" href="#index"><?php echo $right['close']; ?></a>
		<h1><?php echo $writer['h1']; ?></h1>
		<div class="content"><?php echo $writer['p']; ?></div>



	</div> <!-- end of writer -->			

	<!-- developer -->
	<div id="developer">
		<a class="close" name="<?php echo $developer['h1']; ?>" href="#index"><?php echo $right['close']; ?></a>
		<h1><?php echo $developer['h1']; ?></h1>
		<div class="content"><?php echo $developer['p']; ?></div>

	</div> <!-- end of developer -->

	<!-- photographer -->
	<div id="photographer">
		<a class="close" name="<?php echo $photographer['h1']; ?>" href="#index"><?php echo $right['close']; ?></a>
		<h1><?php echo $photographer['h1']; ?></h1>
		<div class="content"><?php echo $photographer['p']; ?></div>
	</div> <!-- end of photographer -->

</div> <!-- end of right --> 
</div> <!-- end of wrapper -->

<div style="display:none">
<div id="contact_form">

<form action="" id="contact">
<p class="form-title"><?php echo $form['title']; ?></p>
<fieldset>

<p class="text-field">
	<label for="name"><?php echo $form['name']; ?></label>
	<input type="text" name="name" id="name" value="" size="22" class="text-input" tabindex="1"/>
	<label class="error" for="name" id="name_error1"><?php echo $form['required']; ?></label>
	<label class="error" for="name" id="name_error2"><?php echo $form['tooshortname']; ?></label>
</p>

<p class="text-field">
	<label for="email"><?php echo $form['email']; ?></label>
	<input type="text" name="email" id="email" value="" size="22" class="text-input" tabindex="2"/>
	<label class="error" for="email" id="email_error1"><?php echo $form['required']; ?></label>
	<label class="error" for="email" id="email_error2"><?php echo $form['notvalidemail']; ?></label>
</p>

<p class="text-field">
	<label for="url"><?php echo $form['url']; ?></label>
	<input type="text" name="url" id="url" value="http://" size="22" class="text-input" tabindex="3"/>
	<label class="error" for="url" id="url_error"><?php echo $form['notvalidurl']; ?></label>
</p>

<p class="textarea">
	<label for="comment"><?php echo $form['message']; ?></label>
	<label class="error" for="comment" id="textarea_error1"><?php echo $form['required']; ?></label>
	<label class="error" for="comment" id="textarea_error2"><?php echo $form['tooshortmessage']; ?></label>
	<textarea name="comment" id="comment" cols="" rows="" tabindex="4"></textarea>
		
</p>



<p class="submit">
	<input type="button" name="submit" class="button green" id="submit_btn" tabindex="5" value="<?php echo $form['submit']; ?>" />
</p>
</fieldset>
</form>

</div>
</div>

<div id="error-wrapper">
<noscript id="js-warning"><div><img src="images/error.gif" alt="error" /><?php echo $body['noscript']; ?></div></noscript>
<p id="ie6-error"><img src="images/error.gif" alt="error" /><?php echo $body['ie6-error']; ?></p>
<p id="ie8-error"><img src="images/error.gif" alt="error" /><?php echo $body['ie8-error']; ?></p>
</div>

</body>
</html>
