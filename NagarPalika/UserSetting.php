
<!DOCTYPE html>
<html class=" ">
    <head>
       <?php
	   require("corehead.php");
	   ?>
	   
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <link href="assets/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" "><!-- START TOPBAR -->
        <?php include("topbar.php"); ?>
        <!-- END TOPBAR -->
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
				<?php include("sidebar.php"); ?>
		   <!--  SIDEBAR - END -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">User Settings</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="home"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="UserSettings"><i class="fa fa-home"></i>User Settings</a>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
<?php
if(isset($_SESSION["processmsg"]))
{
	echo $_SESSION["processmsg"];
	$_SESSION["processmsg"]="";
}
?>
                  
                    <div class="col-lg-12">
                        <section class="box purple">
                            <header class="panel_header">
                                <h2 class="title pull-left">Update Name</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <!-- ********************************************** -->
										<form action="namechnge.php" method="post">
										<div class="form-group">
                                            <label class="form-label" for="field-1">Your Email :</label>
                                            <span class="desc"><?php echo $_SESSION["login_id"];?></span>
                                        </div>
										<div class="form-group">
                                            <label class="form-label" for="field-2">Your Name</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="uname" name="uname" value="<?php echo $_SESSION["login_name"];?>" required>
                                            </div>
                                        </div>
										<input type="submit" name="submit" value="submit" class="btn btn-purple  pull-right">
										</form>
                                        <!-- ********************************************** -->
									</div>
                                    </div>
                            </div>
						</section>
						<section class="box primary">
                            <header class="panel_header">
                                <h2 class="title pull-left">Update Password</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <!-- ********************************************** -->
										<form action="Pwdchnge.php" method="post">
										<div class="form-group">
                                            <label class="form-label" for="oldpass">Current Password</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="password" class="form-control" id="oldpass" name="oldpass"  autocomplete="off" required>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="form-label" for="newpass">New Password</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="password" class="form-control" id="newpass" name="newpass"  autocomplete="off" required>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="form-label" for="cfnpass">Confirm New Password</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="password" class="form-control" id="cfnpass" name="cfnpass"  autocomplete="off" required>
                                            </div>
                                        </div>
										<input type="submit" name="submit" value="submit" class="btn btn-primary  pull-right">
										</form>

                                        <!-- ********************************************** -->
									</div>
                                    </div>
                            </div>
						</section>
                    </div>
                       </div>
                </section>
            </section>
            <!-- END CONTENT -->
        <!-- END CONTAINER -->
        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->
<?php include("coreend.php"); ?>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 

        <!-- General section box modal start -->
        <div class="modal" id="section-settings" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
            <div class="modal-dialog animated bounceInDown">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Section Settings</h4>
                    </div>
                    <div class="modal-body">

                        Body goes here...

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-success" type="button">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    </body>
</html>



