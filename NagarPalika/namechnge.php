<?php 
session_start();
require 'config.php';
$ref="UserSettings";
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
if(isset($_SESSION['uid']))
{
	if(isset($_POST['submit']) && isset($_POST['uname']))
	{
		$SQL="UPDATE `user` SET `name`='".test_input($_POST['uname'])."' WHERE `id` = '".$_SESSION['uid']."';";
			if(mysqli_query($con,$SQL))
			{
				$_SESSION["processmsg"]='<div class="alert alert-success alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Success :</strong> User Setting saved.
										</div>';
				$_SESSION["login_name"]=test_input($_POST['uname']);
			}
			else
			{
					$_SESSION["processmsg"]='<div class="alert alert-Warning alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Unsuccess :</strong> Error in MySQL.
										</div>';
			}
	}
	else
	{
				$_SESSION["processmsg"]='<div class="alert alert-Warning alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Unsuccess :</strong> Something went wrong
										</div>';
	}
}
else
{
	$_SESSION["processmsg"]='<div class="alert alert-Warning alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Unsuccess :</strong> Access Denied
										</div>';
}
header("location:".$ref);
?>