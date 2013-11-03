<?php

include_once('ip2c/ip2country.php');
$ip2c=new ip2country();
$ip2c->mysql_host='localhost';
$ip2c->db_user='vanja_website';
$ip2c->db_pass='uymklfwd';
$ip2c->db_name='vanja_vg_www';
$ip2c->table_name='ip2c';


$kod=$ip2c->get_country_code();

if (($kod=="HR") || ($kod=="BA") || ($kod=="RS"))
{
    header("Location: http://vanja.gavric.org/v1/vg-hr.html#index"); /* Redirect browser */
	// header("Location: http://local.vanja.gavric.org/v1/vg-hr.html#index"); /* Redirect browser */
}
else {
    header("Location: http://vanja.gavric.org/v1/vg-en.html#index");
	// header("Location: http://local.vanja.gavric.org/v1/vg-en.html#index");
}
exit;
?>