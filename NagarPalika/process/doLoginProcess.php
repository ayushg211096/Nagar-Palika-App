<?php 
session_start();
require '../config.php';
$location="../";
if(isset($_POST['user'])&&isset($_POST['pass']))
{
	
	$sqlp="select * from user where email='".$_POST['user']."' and password='".$_POST['pass']."';";	
	//echo $sqlp;
	$res2=mysqli_query($con,$sqlp);
	if (mysqli_num_rows($res2) > 0) 
	{
	while($arr=mysqli_fetch_array($res2))
		{
		$_SESSION['uid']=$arr['id'];
		$_SESSION["login_id"]=$arr['email'];
		$_SESSION["login_name"]=$arr['name'];
		$location="../home";
		echo $_SESSION['uid'];
		header("location:$location");
		}
	}
	else
	{
		$_SESSION['err_msg']="\"Login Error\" Invalide User Name Or Password";
		echo $_SESSION['err_msg'];
		header("location:$location");
		die;
	}
}
else
{
	header("location:$location");
}

?>