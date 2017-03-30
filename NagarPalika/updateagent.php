<?php 
session_start();
require 'config.php';
$ref="Agents.php";
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
   if (empty($_POST["Agentid"])) {
     $msg=$msg."<br />Something is wrong";
	 $frmerror=1;
   } else {
     $Agentid = intval($_POST["Agentid"]);
     }
   if (empty($_POST["name"])) {
     $msg=$msg."<br />Agent Name is required";
	 $frmerror=1;
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z. ]*$/",$name)) {
       $msg=$msg."<br />Agent Name : Only Alphabet & white space allowed";
		$frmerror=1;
     }
   }
   if (empty($_POST["city"])) {
     $msg=$msg."<br />city is required";
	 $frmerror=1;
   } else {
     $city = test_input($_POST["city"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z. ]*$/",$city)) {
       $msg=$msg."<br />City : Only letters and white space allowed";
		$frmerror=1;
     }
   }
   if (empty($_POST["mobile"])) {
     $msg=$msg."<br />mobile is required";
	 $frmerror=1;
   } else {
     $mobile = test_input($_POST["mobile"]);
     if (!preg_match("/^[0-9]{10}$/",$_POST["mobile"])) {
       $msg=$msg."<br />mobile : Only 10 digits allowed in mobile.";
		$frmerror=1;
     }
   }
   
   if($frmerror==0)
	{
		  //$SQL="INSERT INTO `agent`(`Name`, `mobile`, `city`) VALUES ('".$name."','".$mobile."','".$city."');";
		  $SQL="UPDATE `agent` SET `Name`='".$name."',`mobile`='".$mobile."',`city`='".$city."' WHERE `id` = '".$Agentid."';";
			if(mysqli_query($con,$SQL))
			{
				$_SESSION["processmsg"]='<div class="alert alert-success alert-dismissible fade in">
											<strong>Success :</strong> Agent : <strong>'.$name.'</strong> Updated Success fully!
										</div>';
				$ref="ViewAgent.php?id=SEA".(1000+$Agentid);						
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