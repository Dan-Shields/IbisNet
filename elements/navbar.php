  <nav class="navbar navbar-default" id="navbar">
  <div class="container-fluid">
    <div class="navbar-collapse collapse in">
      <ul class="nav navbar-nav navbar-mobile">
        <li>
          <button type="button" class="sidebar-toggle">
            <i class="fa fa-bars"></i>
          </button>
        </li>
        <li class="logo">
          <a class="navbar-brand" href="#"><span class="highlight">Ibis</span>Net</a>
        </li>
        <li>
          <button type="button" class="navbar-toggle">
            <img class="profile-img" src=
            >
          </button>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-left">
        <li class="navbar-title">Dashboard</li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!--<li class="dropdown notification warning">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <div class="icon"><i class="fa fa-bell" aria-hidden="true"></i></div>
            <div class="title">System Notifications</div>
            <div class="count">10</div>
          </a>
          <div class="dropdown-menu">
            <ul>
              <li class="dropdown-header">Notification</li>
              <li>
                <a href="#">
                  <span class="badge badge-danger pull-right">8</span>
                  <div class="message">
                    <div class="content">
                      <div class="title">New Order</div>
                      <div class="description">$400 total</div>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="badge badge-danger pull-right">14</span>
                  Inbox
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="badge badge-danger pull-right">5</span>
                  Issues Report
                </a>
              </li>
              <li class="dropdown-footer">
                <a href="#">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>
              </li>
            </ul>
          </div>
        </li>-->
        
    	<?php
    	if (!isset($_SESSION['steamid'])) {
    		echo "<li>";
        echo loginButton('rectangle');
        echo "</li>";
		  } else {
				echo "<li class='dropdown profile'>";
				require "elements/profile-dropdown.php";
				echo "</li>";
		  }

		?>
      </ul>
    </div>
  </div>
</nav>