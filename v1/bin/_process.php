<?php
if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['name']));
} else {$name = 'No name entered';}
if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
	$email = stripslashes(strip_tags($_POST['email']));
} else {$email = 'No email entered';}
if ((isset($_POST['url'])) && (strlen(trim($_POST['url'])) > 0)) {
	$url = stripslashes(strip_tags($_POST['url']));
} else {$url = 'No url entered';}
if ((isset($_POST['comment'])) && (strlen(trim($_POST['comment'])) > 0)) {
	$comment = stripslashes(strip_tags($_POST['comment']));
} else {$comment = 'No comment entered';}
ob_start();
?>
<html>
<head>
<style type="text/css">
</style>
</head>
<body>
<table width="550" border="1" cellspacing="2" cellpadding="2">
  <tr bgcolor="#eeffee">
    <td>Name</td>
    <td><?=$name;?></td>
  </tr>
  <tr bgcolor="#eeeeff">
    <td>Email</td>
    <td><?=$email;?></td>
  </tr>
  <tr bgcolor="#eeffee">
    <td>URL</td>
    <td><?=$url;?></td>
  </tr>
	  <tr bgcolor="#eeeeff">
    <td>comment</td>
    <td><?=$comment;?></td>
  </tr>
</table>
</body>
</html>
<?
$body = ob_get_contents();

/*
$to = 'vanja@gavric.org';
$email = 'vanja@gavric.org';
$fromaddress = "robot@gavric.org";
$fromname = "Online Contact";
*/

require("phpmailer.php");

$mail = new PHPMailer();

$mail->From     = "contact.form@gavric.org";
$mail->FromName = "Contact Form";
$mail->AddAddress("vanja@gavric.org");

$mail->WordWrap = 50;
$mail->IsHTML(true);

$mail->Subject  =  "Contact form submitted";
$mail->Body     =  $body;
$mail->AltBody  =  "This is the text-only body";

if(!$mail->Send()) {
	$recipient = 'vanja@gavric.org';
	$subject = 'Contact form failed';
	$content = $body;	
  mail($recipient, $subject, $content, "From: mail@yourdomain.com\r\nReply-To: $email\r\nX-Mailer: DT_formmail");
  exit;
}
?>
