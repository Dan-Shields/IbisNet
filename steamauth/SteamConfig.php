<?php
//Version 3.2
require '/php/config.php';

$steamauth['apikey'] = APIKEY;
$steamauth['domainname'] = "localhost"; // The main URL of your website displayed in the login page
$steamauth['logoutpage'] = $_SERVER['PHP_SELF']; // Page to redirect to after a successfull logout (from the directory the SteamAuth-folder is located in) - NO slash at the beginning!
$steamauth['loginpage'] = $_SERVER['PHP_SELF']; // Page to redirect to after a successfull login (from the directory the SteamAuth-folder is located in) - NO slash at the beginning!
?>
