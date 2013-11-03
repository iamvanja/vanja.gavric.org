<?php

include_once('ip2c/ip2country.php');
$ip2c=new ip2country();
$ip2c->mysql_host='mysql.gavric.org';
$ip2c->db_user='vanja';
$ip2c->db_pass='ronnie2812';
$ip2c->db_name='wwwtvz';
$ip2c->table_name='ip2c';


$kod=$ip2c->get_country_code();

if (($kod=="HR") || ($kod=="BA") || ($kod=="RS"))
{
	header("Location: http://vanja.gavric.org/vg-steve-jobs-hr.html"); /* Redirect browser */
}
else {
	header("Location: http://vanja.gavric.org/vg-steve-jobs-en.html");
exit;}
?>