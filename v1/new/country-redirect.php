<?php

include_once('ip2c/ip2country.php');
$ip2c = new ip2country();
$ip2c->mysql_host='localhost';
$ip2c->db_user='vanja_website';
$ip2c->db_pass='uymklfwd';
$ip2c->db_name='vanja_vg_www';
$ip2c->table_name='ip2c';
$countryCode = $ip2c->get_country_code();


if (($countryCode === "HR") || ($countryCode === "BA") || ($countryCode === "RS")) {
    echo 'hr';
    // header("Location: http://vanja.gavric.org/vg-hr.html#index"); /* Redirect browser */
}
else {
    echo 'en';
    // header("Location: http://vanja.gavric.org/vg-en.html#index");
}

exit;
?>