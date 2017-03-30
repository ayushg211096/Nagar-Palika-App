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
	if(isset($_POST['dealer']) )
	{
		$ag=intval($_POST['dealer']);
		$ref="ViewAgent.php?id=SEA".(1000+$ag);
		$log = "<br /> ".$dt." : Status : ".$status." & remarks : ".$remarks;
			$SQL="UPDATE `installments` JOIN  accounts ON installments.accid = accounts.id set installments.status = 'paid', installments.`logs` = '".date("l jS \of F Y h:i:s A") ." - bulkpaid' WHERE accounts.dealer = '".$ag."';";
			if(mysqli_query($con,$SQL))
			{
				$_SESSION["processmsg"]='<div class="alert alert-success alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Success :</strong> Installment of status of all monthof all accounts of this agent Changed Successfully. <br />
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