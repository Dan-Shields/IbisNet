<?php
require 'php/DBconnect.php';
require 'steamauth/steamauth.php';
require_once 'php/User.php';

$dbh = new DBConnect();

if (isset($_SESSION['steamid'])) {
    require 'steamauth/userinfo.php';

    $loggedInUser = new LoggedInUser($steamprofile['steamid']);
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Register - IbisNet</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="./assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/flat-admin.css">

  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/blue-sky.css">

</head>
<body>
  <div class="app app-default">

<div class="app-container app-login">
  <div class="flex-center">
    <div class="app-header"></div>
    <div class="app-body">
      <div class="loader-container text-center">
          <div class="icon">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
              </div>
            </div>
          <div class="title">Logging in...</div>
      </div>
      <div class="app-block">
        <div class="app-right-section">
          <div class="app-brand"><span class="highlight">IbisNet</span></div>
          <div class="app-info">
            
            <ul class="list">
              <li>
                <div class="icon">
                  <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                </div>
                <div class="title">Increase <b>Productivity</b></div>
              </li>
              <li>
                <div class="icon">
                  <i class="fa fa-cubes" aria-hidden="true"></i>
                </div>
                <div class="title">Lot of <b>Components</b></div>
              </li>
              <li>
                <div class="icon">
                  <i class="fa fa-usd" aria-hidden="true"></i>
                </div>
                <div class="title">Forever <b>Free</b></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="app-form">
          <div class="form-suggestion">
          
          <?php 
          if (!isset($_SESSION['steamid'])) {
            echo "Please sign in first.";
            echo "</div>";
            echo loginButton('rectangle');
          } else {
            if ($loggedInUser->registered()) {
              echo "You are already registered!";
              echo "</div>";
            } else {
              echo "Hi <b>" . $steamprofile['personaname'] . "</b>, create an account for free.";
              echo "</div>";
              require 'elements/registration-form.php'; 
            }
          }


          //else
          ?>
        </div>
      </div>
    </div>
    <div class="app-footer">
    </div>
  </div>
</div>

  </div>
  
  <script type="text/javascript" src="./assets/js/vendor.js"></script>
  <!--<script type="text/javascript" src="./assets/js/app.js"></script>-->

</body>
</html>