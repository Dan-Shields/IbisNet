<?php
//Version 3.2
$steamauth['apikey'] = APIKEY;
$steamauth['domainname'] = "localhost"; // The main URL of your website displayed in the login page
$steamauth['logoutpage'] = $_SERVER['PHP_SELF']; // Page to redirect to after a successful logout (from the directory the SteamAuth-folder is located in) - NO slash at the beginning!
$steamauth['loginpage'] = $_SERVER['PHP_SELF']; // Page to redirect to after a successful login (from the directory the SteamAuth-folder is located in) - NO slash at the beginning!
?>
