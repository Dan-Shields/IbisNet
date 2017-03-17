<?php
require 'php/config.php';
require 'php/DBconnect.php';
require 'steamauth/steamauth.php';
require_once 'php/User.php';
require_once 'php/LoggedInUser.php';
require_once 'php/Stats.php';

$dbh = new DBConnect();

$stats = new Stats();

if (isset($_SESSION['steamid']))
{
    require 'steamauth/userinfo.php';

    $loggedInUser = new LoggedInUser($steamprofile['steamid']);
}

if (isset($_GET['steamid']))
{
    if ($_GET['steamid'] = $_SESSION['steamid'])
    {
        $specifiedUser = $loggedInUser;
    }
    else
    {
        $specifiedUser = new User($_GET['steamid']);
    }
    if (!$specifiedUser->registered())
    {
        echo "<br/>";
        echo "User not found. Please check your userid and try again.";
    }
    else
    {
        $userForDisplay = $specifiedUser;
    }
}
else if (isset($loggedInUser) && $loggedInUser->registered())
{
    $userForDisplay = $loggedInUser;
}
else
{
    echo "Please register to view your profile or view someone else's by going to profile/steamid.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $userForDisplay->getInfo()['alias'];?> - IbisNet</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="assets/css/vendor.css">
    <link rel="stylesheet" type="text/css" href="assets/css/flat-admin.css">

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="./assets/css/theme/blue.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/ibisnet.css">

</head>
<body>
    <div class="app app-default">

    <?php require 'elements/sidebar-nav.php';?>
        <div class="app-container">
    <?php
require 'elements/navbar.php';
require 'elements/help-actions.html';

if (isset($_GET['steamid']))
{
    if (!$specifiedUser->registered())
    {
        echo "<br/>";
        echo "User not found. Please check your userid and try again.";
    }
    else
    {
        $userForDisplay = $specifiedUser;
        require "elements/profile-page.php";
    }
}
else if ($loggedInUser->registered())
{
    $userForDisplay = $loggedInUser;
    require "elements/profile-page.php";
}
else
{
    echo "Please register to view your profile or view someone else's by going to profile/steamid.";
}


?>
    
</div>
    </div>
    
    <script type="text/javascript" src="assets/js/vendor.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>

</body>
</html>