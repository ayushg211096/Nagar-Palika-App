<?php 
session_start();
require 'config.php';
$ref="ManageAccounts.php";
function test_input($data) {
   $data = trim($data);
   $data = addslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
date_default_timezone_set("Asia/Kolkata");
if(isset($_SESSION['uid']))
{
	if(isset($_POST['submit']) && isset($_POST['ac']) &&  isset($_POST['giftstatus']) )
	{
		$ac=intval($_POST['ac']);
		$giftstatus=test_input($_POST['giftstatus']);
		$ref="Viewaccounts.php?ac=".$ac;
		
			$SQL="UPDATE `accounts` SET `gift`='".$giftstatus."' WHERE `id` = '".$ac."';";
			if(mysqli_query($con,$SQL))
			{
				$_SESSION["processmsg"]='<div class="alert alert-success alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Success :</strong> Prize status Changed Successfully.
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