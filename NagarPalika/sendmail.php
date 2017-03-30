<?php 
session_start();
$msg="hh";
require 'config.php';
require 'vmail.php';
$sub="test again";
$txt="<h1>Hello</h1><p>i am vishal</p>";
$from="HTMAILER";
$unn="vishalsharma4395@gmail.com";
$upp="vishalsharma@gmail";
$s_host="smtp.gmail.com";
$s_port="587";
$s_secure="tls";
$rec="newaivirus@gmail.com";
	vmail($rec,$unn,$upp,$s_host,$s_port,$s_secure,$from,$sub,$txt,$txt);
	echo "<br>";

?>