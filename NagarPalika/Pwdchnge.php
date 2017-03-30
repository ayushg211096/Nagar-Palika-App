<?php 
session_start();
require '../config.php';
$ref="UserSettings";
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
if(isset($_SESSION['uid']))
{
	if(isset($_POST['submit']) && isset($_POST['oldpass']) &&  isset($_POST['newpass']) &&  isset($_POST['cfnpass']) )
	{
		$sqlp="select * from user where email='".$_SESSION['login_id']."' and password='".$_POST['oldpass']."';";
	$res2=mysqli_query($con,$sqlp);
	if (mysqli_num_rows($res2) > 0) 
	{
		if($_POST['newpass'] == $_POST['cfnpass'])
		{
			$SQL="UPDATE `user` SET `password`='".$_POST['newpass']."' WHERE  email='".$_SESSION['login_id']."';";
			if(mysqli_query($con,$SQL))
			{
				$_SESSION["processmsg"]='<div class="alert alert-success alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Success :</strong> Password Changed Successfully.
										</div>';
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
			$_SESSION["processmsg"]='<div class="alert alert-warning alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Unsuccess :</strong> New Password & Confirm Password does not matched.
										</div>';
		}
	}
	else
	{
		$_SESSION["processmsg"]='<div class="alert alert-warning alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Unsuccess :</strong> Current Password is invaid.
										</div>';
	}
	
	}
	else
	{
				$_SESSION["processmsg"]='<div class="alert alert-warning alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Unsuccess :</strong> Something went wrong
										</div>';
	}
}
else
{
	$_SESSION["processmsg"]='<div class="alert alert-warning alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Unsuccess :</strong> Access Denied
										</div>';
}
header("location:".$ref);
?>