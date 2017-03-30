<?php 
session_start();
require 'config.php';
require 'dakshsms.php';
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
	if(isset($_POST['submit']) && isset($_POST['insid']) &&  isset($_POST['ac']) &&  isset($_POST['status']) &&  isset($_POST['remarks']) )
	{
		$ac=intval($_POST['ac']);
		$ins=intval($_POST['insid']);
		$status=test_input($_POST['status']);
		$remarks=test_input($_POST['remarks']);
		$ref="Viewaccounts.php?ac=".$ac;
		$log = "<br /> ".$dt." : Status : ".$status." & remarks : ".$remarks;
			$SQL="UPDATE `installments` SET `status`='".$status."',`remarks`='".$remarks."',`logs`=CONCAT(`logs`,'".$log."') WHERE `id` = '".$ins."' AND `accid` = '".$ac."';";
			if(mysqli_query($con,$SQL))
			{
				if($status=='paid')
				{
				$SQL="SELECT * FROM `accounts` JOIN `installments` ON installments.accid = accounts.id WHERE accounts.id = '".$ac."' AND installments.id='".$ins."';";
				$res2=mysqli_query($con,$SQL);
				if (mysqli_num_rows($res2) > 0) {
				while($row2=mysqli_fetch_array($res2))
					{
						$smsg="Your installment of '".$row2["month"]."' is Paid Successfully. Thank You";
					$smsstatus=vssendsms($row2["mobile"], "Sobhgy", $smsg);
					$_SESSION["processmsg"]='<div class="alert alert-success alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Success :</strong> Installment of status Changed Successfully. <br />
											SMS id : '.$smsstatus.'
										</div>';
					}
				}
					else
					{
						$_SESSION["processmsg"]='<div class="alert alert-warning alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Success :</strong> Installment of status Changed Successfully. <br />
											<strong>Unsuccess :</strong> SMS Not Sent.
										</div>';
					}
				}
				else
				{
					$_SESSION["processmsg"]='<div class="alert alert-warning alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Success :</strong> Installment of status Changed Successfully. <br />
											<strong>Unsuccess :</strong> SMS Not Sent.
										</div>';
				}
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