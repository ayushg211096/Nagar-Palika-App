<?php 
session_start();
require 'config.php';
$ref="AccTypes.php";
$msg="";
$frmerror=0;
function errormsg($error){
	$_SESSION["processmsg"]='<div class="alert alert-warning alert-dismissible fade in" style="background:#F43034;padding:5px;color:#EEE;">
						<strong>Unsuccessfull :</strong> Registration Can Not Be Completed.<br /><p>'.$error.'</p></div>';
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
if(isset($_SESSION['uid']))
{	
   if (empty($_POST["name"])) {
     $msg=$msg."<br />ACCType Name is required";
	 $frmerror=1;
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z0-9. ]*$/",$name)) {
       $msg=$msg."<br />AccType Name : Only Alphabet & white space allowed";
		$frmerror=1;
     }
   }
   if (empty($_POST["FMI"])) {
     $msg=$msg."<br />FMI is required";
	 $frmerror=1;
   } else {
     $FMI = test_input($_POST["FMI"]);
     if (!preg_match("/^\d+(?:\.\d{2})?$/",$_POST["FMI"])) {
       $msg=$msg."<br />FMI : Price format is like 20.00.";
		$frmerror=1;
     }
   }
   if (empty($_POST["OMI"])) {
     $msg=$msg."<br />OMI is required";
	 $frmerror=1;
   } else {
     $OMI = test_input($_POST["OMI"]);
     if (!preg_match("/^\d+(?:\.\d{2})?$/",$_POST["OMI"])) {
       $msg=$msg."<br />OMI : Price format is like 20.00.";
		$frmerror=1;
     }
   }
   
   if($frmerror==0)
	{
		 // $SQL="INSERT INTO `agent`(`Name`, `mobile`, `city`) VALUES ('".$name."','".$mobile."','".$city."');";
		  $SQL="INSERT INTO `acctype`( `Name`, `FMI`, `OMI`) VALUES ('".$name."','".$FMI."','".$OMI."');";
			if(mysqli_query($con,$SQL))
			{
				$_SESSION["processmsg"]='<div class="alert alert-success alert-dismissible fade in">
											<strong>Success :</strong> AccType : <strong>'.$name.'</strong> Addedd Success fully!
										</div>';
				header("location:".$ref);
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
header("location:".$ref);
}
else
{
	echo "Please Login First";
}  