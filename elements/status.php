<div class="row">
  <div class="col-xs-12">
    <div class="card card-banner card-chart card-blue no-br">
      <div class="card-header">
        <div class="card-title">
          <div class="title">Activity Today</div>
        </div>
        <ul class="card-action">
          <li>
            
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="ct-chart-sale"></div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a class="card card-banner card-green-light">
  <div class="card-body">
    <i class="icon fa fa-user fa-4x"></i>
    <div class="content">
      <div class="title">Players Today</div>
      <div class="value"><span class="sign"></span>
      <?php
        echo $stats->getPlayersToday();
      ?>
      </div>
    </div>
  </div>
</a>

  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a class="card card-banner card-blue-light">
  <div class="card-body">
    <i class="icon fa fa-rocket fa-4x"></i>
    <div class="content">
      <div class="title">Active Vessels</div>
      <div class="value"><span class="sign"></span>
      <?php
        echo $stats->getVessels() - 30; //-30 for the persistent 30 asteroids
      ?>
      </div>
    </div>
  </div>
</a>

  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a class="card card-banner card-yellow-light">
  <div class="card-body">
    <i class="icon fa fa-clock-o fa-4x"></i>
    <div class="content">
      <div class="title">Current Uptime</div>
      <div class="value">
      <?php
        $uptime = $stats->getUptime() / 1000; //get uptime and convert from ms to s
        //if uptime is less than 2 minutes, display in seconds
        if ($uptime < 120) {
          $interval = "seconds";
        //if uptime is less than 2 hours, display in minutes
        } else if ($uptime < 7200) {
          $interval = "minutes";
          $uptime /= 60;
        //else display in hours
        } else {
          $interval = "hours";
          $uptime /= 3600;
        }
        //display rounded-down value
        echo floor($uptime);
      ?>

      <span class="sign"> 
      <?php
        echo $interval;
      ?>
      </span></div>
    </div>
  </div>
</a>

  </div>
</div>