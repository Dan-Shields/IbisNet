<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body app-heading">
                <img class="profile-img" src=<?php echo "'" . $userForDisplay->getInfo()['profile_pic_url'] . "'"; ?>>
                <div class="app-title">
                    <div class="title"><span class="highlight" id="user-name"><?php echo $userForDisplay->getInfo()['alias'];?></span></div>
                    <div class="description">
                    <?php
                        if ($userForDisplay->getInfo()['level'] === '1') {
                            //admin label
                            echo "<span class='label label-danger'>Owner</span>";
                        }

                        if ($userForDisplay->getInfo()['level'] === '2') {
                            //moderator label
                            echo "<span class='label label-danger'>Mod</span>";
                        }

                        //more ranks can be added here

                        if ($userForDisplay->getGameStats()['has_played']) {
                            echo "<span id='user-status' class='label' style='display: none'>Last Online: ". $userForDisplay->getGameStats()['last_logout'] ."</span>";
                        }

                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-tab">
            <div class="card-body no-padding tab-content">
                <div role="tabpanel" class="tab-pane active" id="tab1">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="section">
                                <div class="section-title"><i class="icon fa fa-user" aria-hidden="true"></i> Bio</div>
                                <div class="section-body __indent">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</div>
                            </div>
                            <div class="section">
                                <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i> Education</div>
                                <div class="section-body __indent">Computer Engineering, Khon Kaen University</div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-12">
                            <div class="section">
                                <div class="section-title">Activities</div>
                                <div class="section-body">
                                    <div class="media social-post">
                                        <div class="media-left">
                                            <a href="#">
                                                <img src="assets/images/profile.png" />
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-heading">
                                                <h4 class="title">Scott White</h4>
                                                <h5 class="timeing">20 mins ago</h5>
                                            </div>
                                            <div class="media-content">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate.</div>
                                        </div>
                                    </div>
                                    <div class="media social-post">
                                        <div class="media-left">
                                            <a href="#">
                                                <img src="assets/images/profile.png" />
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-heading">
                                                <h4 class="title">Scott White</h4>
                                                <h5 class="timeing">20 mins ago</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="tab3">
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nullaip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nullaip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                </div>
                <div role="tabpanel" class="tab-pane" id="tab4">
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nullaip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nullaip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                </div>
            </div>
        </div>
    </div>
</div>