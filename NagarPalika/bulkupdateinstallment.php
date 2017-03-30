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
$dt=date("Y/m/d h:i:sa");
if(isset($_SESSION['uid']))
{
	if(isset($_POST['submit']) && isset($_POST['dealer']) &&  isset($_POST['month']) &&  isset($_POST['status']) &&  isset($_POST['remarks']) )
	{
		$ac=intval($_POST['ac']);
		$ins=intval($_POST['insid']);
		$status=test_input($_POST['status']);
		$remarks=test_input($_POST['remarks']);
		$ref="Viewaccounts.php?ac=".$ac;
		$log = "<br /> ".$dt." : Status : ".$status." & remarks : [bulk_paid_unpaid] ".$remarks;
			$SQL="UPDATE `installments` SET `status`='".$status."',`remarks`='".$remarks."',`logs`=CONCAT(`logs`,'".$log."') WHERE `id` = '".$ins."' AND `accid` = '".$ac."';";
			if(mysqli_query($con,$SQL))
			{
				$_SESSION["processmsg"]='<div class="alert alert-success alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Success :</strong> Installment of status Changed Successfully.
										</div>';
			}
			else
			{
					$_SESSION["processmsg"]='<div class="alert alert-warning alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Unsuccess :</strong> Something is wrong. '.$SQL.'
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