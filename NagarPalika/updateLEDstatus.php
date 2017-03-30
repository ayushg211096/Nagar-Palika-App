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
if(isset($_SESSION['uid']))
{
	if(isset($_POST['submit']) && isset($_POST['ac']) &&  isset($_POST['LEDstatus']) )
	{
		$ac=intval($_POST['ac']);
		$LEDstatus=test_input($_POST['LEDstatus']);
		$ref="Viewaccounts.php?ac=".$ac;
		
			$SQL="UPDATE `accounts` SET `LED`='".$LEDstatus."' WHERE `id` = '".$ac."';";
			if(mysqli_query($con,$SQL))
			{
				$_SESSION["processmsg"]='<div class="alert alert-success alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Success :</strong> LED status Changed Successfully.
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