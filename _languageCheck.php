<?php
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