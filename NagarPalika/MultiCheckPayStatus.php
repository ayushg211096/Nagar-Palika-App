<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>

</head>
<body>
	
<div class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped active"  id="process" role="progressbar"
  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
    0 row(s) processed
  </div>
</div>	

<div id="information" style="width"></div>
<div style="width:100%;height:300px;overflow-y:scroll;">
<?php 
ini_set('max_execution_time', 0);
session_start();
require 'config.php';
require 'dakshsms.php';
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
	if( isset($_POST['Installments']) &&  isset($_POST['status']) &&  isset($_POST['remarks']) )
	{
		$TotalInstallments=sizeof($_POST['Installments']);
		$AllInstallments=$_POST['Installments'];
		$status=test_input($_POST['status']);
		$remarks=test_input($_POST['remarks']);
		$log = "<br /> ".$dt." : Status : ".$status." & remarks : ".$remarks;
		
		//echo $TotalInstallments;
		//echo "<br />";
	//print_r($_POST);
	
	for($i=0; $i<$TotalInstallments; $i++)
	{
		$ins=$AllInstallments[$i];
		$SQL="UPDATE `installments` SET `status`='".$status."',`remarks`='".$remarks."',`logs`=CONCAT(`logs`,'".$log."') WHERE `id` = '".$ins."';";
			if(mysqli_query($con,$SQL))
			{
				
				$SQL="SELECT * FROM `accounts` JOIN `installments` ON installments.accid = accounts.id WHERE  installments.id='".$ins."';";
				$res2=mysqli_query($con,$SQL);
				if (mysqli_num_rows($res2) > 0) {
				while($row2=mysqli_fetch_array($res2))
					{
					if($status=='paid')
					{
							//$smsg="Your installment of '".$row2["month"]."' is Paid Successfully. Thank You";
							$smsg="Token No '".$row2["slipno"]."' ki '".$row2["month"]."' kisht jama ho gyi he. Dhanyawad.";
							$smsstatus=vssendsms($row2["mobile"], "Sobhgy", $smsg);
						if($smsstatus=='')
						{
							$smsstatuss="SMS Not Sent";
						}
						else
						{
							$smsstatuss="SMS Sent";
						}
						echo '<div class="alert alert-success alert-dismissible fade in">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
												<strong>Success :</strong>status of Installment  of '.$row2["name"].' Changed Successfully.
												<br />SMS id : '.$smsstatus.'
												<br />SMS Status : '.$smsstatuss.'
											</div>';
					}
					else
					{
							echo '<div class="alert alert-success alert-dismissible fade in">
													<strong>Success :</strong> status of Installment '.$row2["month"].' of <strong>'.$row2["name"].' :</strong>  Changed Successfully.
												</div>';
					}
					}
				}
				else
				{
					echo '<div class="alert alert-warning alert-dismissible fade in">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<strong>Success :</strong> Installment status Changed Successfully. <br />
										<strong>Unsuccess :</strong> SMS Not Sent.
									</div>';
				}
			}
			else
			{
				echo '<div class="alert alert-warning alert-dismissible fade in">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<strong>Success :</strong> Installment of status Changed Successfully. <br />
										<strong>Unsuccess :</strong> SMS Not Sent.
									</div>';
			}
		$percent = intval(($i+1)/$TotalInstallments * 100);
	echo '<script language="javascript">
	document.getElementById("information").innerHTML="'.($i+1).' row(s) processed.";
   document.getElementById("process").setAttribute("aria-valuenow", "'.$percent.'"); 
   document.getElementById("process").setAttribute("style", "width:'.$percent.'%"); 
   document.getElementById("process").innerHTML="'.($i+1).' / '.$TotalInstallments.'"; 
		  </script>';
		  echo str_repeat(' ',1024*64);
		  flush();

  // Sleep one second so we can see the delay
  sleep(0.5);
	}
	
	}
	else
	{
				echo '<div class="alert alert-warning alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Unsuccess :</strong> Something went wrong
										</div>';
	}
}
else
{
	echo '<div class="alert alert-warning alert-dismissible fade in">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											<strong>Unsuccess :</strong> Access Denied
										</div>';
}
?>

</div>
</body>
</html>
