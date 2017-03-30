<div class='page-topbar '>
            <div class='logo-area' style="background:#673AB7;overflow:hidden;">
				<h2 style="text-align:center;color:white;">Nagar Palika App</h2>
            </div>
            <div class='quick-area'>
                <div class='pull-left'>
                    <ul class="info-menu left-links list-inline list-unstyled">
                        <li class="sidebar-toggle-wrap">
                            <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
						<li class="sidebar-toggle-wrap">
                           Nagar Palika App
                        </li>
                    </ul>
                </div>		
                <div class='pull-right'>
                    <ul class="info-menu right-links list-inline list-unstyled">
                        <li class="profile">
                            <a href="#" data-toggle="dropdown" class="toggle">
                                <img src="https://vanillicon.com/<?php echo md5($_SESSION["login_name"]);?>_50.png" alt="user-image" class="img-circle img-inline">
                                <span><?php echo $_SESSION["login_name"];?> <i class="fa fa-angle-down"></i></span>
                            </a>
                            <ul class="dropdown-menu profile animated fadeIn">
                                <li>
                                    <a href="UserSettings">
                                        <i class="fa fa-wrench"></i>
                                        User Settings
                                    </a>
                                </li>
                                <li class="last">
                                    <a href="logout.php?q=logout">
                                        <i class="fa fa-lock"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>			
                </div>		
            </div>

        </div>