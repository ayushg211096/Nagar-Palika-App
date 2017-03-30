<!DOCTYPE html>
<html class=" ">
    <head>
<?php
require("corehead.php");
?>
	
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <link href="assets/plugins/icheck/skins/square/orange.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" login_page"style="
    background-image: url('assets/images/wall/bg%20(<?php echo rand(1,27);?>).jpg');
    background-size: cover;
    background-position: center;
">


        <div class="login-wrapper">
            <div id="login" style="background:rgba(0,0,0,0.4);padding-bottom:1em;" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">
                <h1><a href="#" title="Login Page" tabindex="-1">Saubhagya Admin</a></h1>
                <form name="loginform" id="loginform" action="process/doLoginProcess.php" method="post">
				<p>
				<?php 
		if(isset($_GET['msg'])&&$_GET['msg']==1)
		echo " <div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> SignUp Successfull Please Login...</div>";
		if(isset($_SESSION["err_msg"])){
		echo " <div class='alert alert-danger'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		Invalid User Name or Password</div>";
		unset($_SESSION['err_msg']);
		}
	?>
				</p>
                    <p>
                        <label for="user_login">Username<br />
                            <input type="text" placeholder="E-mail" name="user" type="email" autofocus id="user_login" class="input" /></label>
                    </p>
                    <p>
                        <label for="user_pass">Password<br />
                            <input type="password" placeholder="Password" name="pass" id="user_pass" class="input" /></label>
                    </p>
                    <p class="forgetmenot">
                        <label class="icheck-label form-label" for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" class="skin-square-orange" checked> Remember me</label>
                    </p>



                    <p class="submit">
                        <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-orange btn-block" value="Sign In" />
                    </p>
                </form>

                <p id="nav">
                    <a class="pull-left" href="ForgotPassword" title="Password Lost and Found">Forgot password?</a>
                    <a class="pull-right" href="../" title="Sign Up">Back to Home</a>
                </p>


            </div>
        </div>





        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->
<?php include("coreend.php"); ?>



        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 















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



