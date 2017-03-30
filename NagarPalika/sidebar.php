 <div class="page-sidebar ">


                <!-- MAIN MENU - START -->
                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 

                    <!-- USER INFO - START -->
                    <div class="profile-info row">

                        <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                            <a href="#">
                                <img src="https://vanillicon.com/<?php echo md5($_SESSION["login_name"]);?>_100.png" class="img-responsive img-circle">
                            </a>
                        </div>

                        <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                            <h3>
                                <a href="ui-profile.html"><?php echo $_SESSION["login_name"];?></a>

                                <!-- Available statuses: online, idle, busy, away and offline -->
                                <span class="profile-status online"></span>
                            </h3>

                            <p class="profile-title"><?php echo $_SESSION["login_id"];?></p>
                        </div>

                    </div>
                    <!-- USER INFO - END -->
                    <ul class='wraplist'>	
                        <li class=""> 
                            <a href="home">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>	
                        <li class=""> 
                            <a href="About.php">
                                <i class="fa fa-user"></i>
                                <span class="title">About</span>
                            </a>
                        </li>
						<li class=""> 
                            <a href="hospital.php">
                                <i class="fa fa-user"></i>
                                <span class="title">Hospitals</span>
                            </a>
                        </li>
                    </ul>

                </div>
                <!-- MAIN MENU - END -->



                <div class="project-info">
                        <div class="data" style="padding:3px;margin:3px;">
                            <span class='title'>Web Solutions by</span>
                            <span class='total' style="font-style:1.4em;">Ele Infotech</span>
                        </div>
                </div>

                



            </div>
           	