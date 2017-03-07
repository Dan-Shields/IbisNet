<div class="row">
  <div class="col-xs-12">
    <div class="card card-banner card-chart card-green no-br">
      <div class="card-header">
        <div class="card-title">
          <div class="title">Activity Today</div>
        </div>
        <ul class="card-action">
          <li>
            <a href="/">
              <i class="fa fa-refresh"></i>
            </a>
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
      <div class="title">Total Players Today</div>
      <div class="value"><span class="sign"></span>12</div>
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
        echo $stats->getVessels();

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
      <div class="title">Up-time</div>
      <div class="value">80 <span class="sign">hours</span></div>
    </div>
  </div>
</a>

  </div>
</div>