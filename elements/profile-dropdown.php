<a href="profile.php" class="dropdown-toggle"  data-toggle="dropdown">
  <img class="profile-img" src=<?php echo "'" . $steamprofile['avatarmedium'] . "'"; ?>>
  <div class="title">Profile</div>
</a>
<div class="dropdown-menu">
  <div class="profile-info">
    <h4 class="username"><?php echo $steamprofile['personaname'];?></h4>
  </div>
  <ul class="action">
    <li>
      <a href=
    <?php
    if ($loggedInUser->registered()) {
      echo "'profile'>";
      echo "Profile";
    } else {
      echo "'register'>";
      echo "Register";
    }
    ?>
    </a>
    </li>
    <!--<li>
      <a href="#">
        Setting
      </a>
    </li>
    <li>-->
      <form action='' method='get'><button id='btn-logout' class='btn btn-danger btn-block' name='logout' type='submit'>Logout</button></form>
    </li>
  </ul>
</div>