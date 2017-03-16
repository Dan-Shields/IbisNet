<?php
require 'php/config.php';
require 'php/DBconnect.php';
require 'steamauth/steamauth.php';
require_once 'php/User.php';
require_once 'php/LoggedInUser.php';
require_once 'php/Stats.php';

$dbh = new DBConnect();

$stats = new Stats();

if (isset($_SESSION['steamid'])) {
	require 'steamauth/userinfo.php';

	$loggedInUser = new LoggedInUser($steamprofile['steamid']);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard - IbisNet</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="./assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/flat-admin.css">

  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/blue-sky.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/ibisnet.css">

</head>
<body>
  <div class="app app-default">

<?php require 'elements/sidebar-nav.php';?>

<div class="app-container">
<?php
require 'elements/navbar.php';
require 'elements/help-actions.html';

?>
<?php
require 'elements/loading.html';
?>
<?php

require 'elements/stats-display.php';
require 'elements/footer.html';
?>
</div>

</div>
  
  <script type="text/javascript" src="./assets/js/vendor.js"></script>
  <script type="text/javascript" src="./assets/js/app.js"></script>
  <script type="text/javascript" src="./assets/js/ibisnet.js"></script>

</body>
</html>