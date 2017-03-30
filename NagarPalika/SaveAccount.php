<?php 
session_start();
require 'config.php';
$msg="";
$frmerror=0;
function errormsg($error){
	echo '<div class="alert alert-warning alert-dismissible fade in" style="background:#F43034;padding:5px;color:#EEE;">
						<strong>Unsuccessfull :</strong> Registration Can Not Be Completed.<br /><p>'.$error.'</p></div>';
}
function test_input($data) {
  // $data = trim($data);
   $data = stripslashes($data);
   $data = addslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
if(isset($_SESSION['uid']))
{	

   if (empty($_GET["SlipNo"])) {
     $msg=$msg."<br />SlipNo is required";
	 $frmerror=1;
   } else {
     $SlipNo = test_input($_GET["SlipNo"]);
     if (!preg_match("/^[0-9]{1,5}$/",$_GET["SlipNo"])) {
       $msg=$msg."<br />SlipNo : Only 5 digits allowed in SlipNo.";
		$frmerror=1;
     }
	 else
	 {
		$sqlp="SELECT * FROM `accounts` WHERE `slipno` ='".mysqli_real_escape_string($con,$SlipNo)."';";	
		$res2=mysqli_query($con,$sqlp);
		if (mysqli_num_rows($res2) > 0) 
		{
			$msg=$msg."<br />This Token Already registered. Try Anothername";
			$frmerror=1;
		}
	 }
   }
   if (empty($_GET["name"])) {
     $msg=$msg."<br />Agent Name is required";
	 $frmerror=1;
   } else {
     $name = test_input($_GET["name"]);
     }
   
   if (empty($_GET["fathername"])) {
     $msg=$msg."<br />father's name is required";
	 $frmerror=1;
   } else {
     $fathername = test_input($_GET["fathername"]);
   }
   if (empty($_GET["Address"])) {
     $msg=$msg."<br />Address is required";
	 $frmerror=1;
   } else {
     $Address = test_input($_GET["Address"]);
     // check if name only contains letters and whitespace
     }

   if (empty($_GET["Agent"])) {
     $msg=$msg."<br />Agent is required";
	 $frmerror=1;
   } else {
     $Agent = test_input($_GET["Agent"]);
     if (!preg_match("/^[0-9. ]*$/",$Agent)) {
       $msg=$msg."<br />Agent : Only Numeric";
		$frmerror=1;
     }
   }
   if (empty($_GET["AccType"])) {
     $msg=$msg."<br />ACCType is required";
	 $frmerror=1;
   } else {
     $AccType = test_input($_GET["AccType"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9. ]*$/",$AccType)) {
       $msg=$msg."<br />AccType : Only Numeric";
		$frmerror=1;
     }
	 else
	 {
		$sqlp="SELECT * FROM `acctype` WHERE `id` ='".mysqli_real_escape_string($con,$AccType)."';";	
		$res2=mysqli_query($con,$sqlp);
		if (mysqli_num_rows($res2) > 0) 
		{
			while($row2=mysqli_fetch_array($res2))
			{
				$iFMI=$row2['FMI'];
				$iOMI=$row2['OMI'];
			}
		}
		else
		{
			$msg=$msg."<br />Invalid Account Type";
		$frmerror=1;
		}
	 }
   }
   if (!empty($_GET["Remarks"])) 
   {
	   $Remarks = test_input($_GET["Remarks"]);
   }
   else
   {
	   $Remarks='';
   }
   
   if (empty($_GET["mobile"])) {
     $msg=$msg."<br />mobile is required";
	 $frmerror=1;
   } else {
     $mobile = test_input($_GET["mobile"]);
     if (!preg_match("/^[0-9]{10}$/",$_GET["mobile"])) {
       $msg=$msg."<br />mobile : Only 10 digits allowed in mobile.";
		$frmerror=1;
     }
   }
   if (empty($_GET["smobile"])) {
	   $smobile ='';
   } else {
     $smobile = test_input($_GET["smobile"]);
     if (!preg_match("/^[0-9]{10}$/",$_GET["smobile"])) {
       $msg=$msg."<br />mobile : Only 10 digits allowed in mobile.";
		$frmerror=1;
     }
   }
   
   if($frmerror==0)
	{
		 // $SQL="INSERT INTO `agent`(`Name`, `mobile`, `city`) VALUES ('".$name."','".$mobile."','".$city."');";
		 $SQL="INSERT INTO `accounts`(`slipno`, `dealer`, `name`, `fathername`, `address`, `mobile`, `smobile`, `AccType`, `remarks`) VALUES ('".$SlipNo."','".$Agent."','".$name."','".$fathername."','".$Address."','".$mobile."','".$smobile."','".$AccType."','".$Remarks."');";
			if(mysqli_query($con,$SQL))
			{
				echo '<div class="alert alert-success alert-dismissible fade in">
											<strong>Success :</strong>Slip NO : <strong>'.$SlipNo.'</strong> Name : <strong>'.$name.'</strong> Addedd Success fully!
										</div>';
				
				$AccUid=mysqli_insert_id($con);
				$SQLM="INSERT INTO `installments`(`accid`, `month`, `value`, `status`) VALUES ('".$AccUid."','Dec 16','".$iFMI."','unpaid');
					INSERT INTO `installments`(`accid`, `month`, `value`, `status`) VALUES ('".$AccUid."','Jan 17','".$iOMI."','unpaid');
					INSERT INTO `installments`(`accid`, `month`, `value`, `status`) VALUES ('".$AccUid."','Feb 17','".$iOMI."','unpaid');
					INSERT INTO `installments`(`accid`, `month`, `value`, `status`) VALUES ('".$AccUid."','Mar 17','".$iOMI."','unpaid');
					INSERT INTO `installments`(`accid`, `month`, `value`, `status`) VALUES ('".$AccUid."','Apr 17','".$iOMI."','unpaid');
					INSERT INTO `installments`(`accid`, `month`, `value`, `status`) VALUES ('".$AccUid."','May 17','".$iOMI."','unpaid');
					INSERT INTO `installments`(`accid`, `month`, `value`, `status`) VALUES ('".$AccUid."','Jun 17','".$iOMI."','unpaid');
					INSERT INTO `installments`(`accid`, `month`, `value`, `status`) VALUES ('".$AccUid."','Jul 17','".$iOMI."','unpaid');
					INSERT INTO `installments`(`accid`, `month`, `value`, `status`) VALUES ('".$AccUid."','Aug 17','".$iOMI."','unpaid');
					INSERT INTO `installments`(`accid`, `month`, `value`, `status`) VALUES ('".$AccUid."','Sep 17','".$iOMI."','unpaid');
					INSERT INTO `installments`(`accid`, `month`, `value`, `status`) VALUES ('".$AccUid."','Oct 17','".$iOMI."','unpaid');
					INSERT INTO `installments`(`accid`, `month`, `value`, `status`) VALUES ('".$AccUid."','Nov 17','".$iOMI."','unpaid');
					";
				if(mysqli_multi_query($con,$SQLM))
				{
				echo '<div class="alert alert-success alert-dismissible fade in">
					<strong>Success :</strong>Installment List is ready!
				</div>';
				}
				else
				{
					echo $SQLM;
				}
			}
			else
			{
				$frmerror=1;
				$msg=$msg."<br />Error in SQL INSERT :".$SQL;
			}
	}
	else
	{
	
	}

if($frmerror==1){
errormsg($msg);	
}

}
else
{
	echo "Please Login First";
}  