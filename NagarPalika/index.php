<?php
session_start();
$sessionstart=1;
$current_page_uri = $_SERVER['REQUEST_URI'];
$part_url = explode("/", $current_page_uri);
//$page_name = end($part_url);
//$burl='<base href="'.$siteurl.'">';

if(isset($_GET['l1']))
{
	$page_name = $_GET['l1'];
}
else
{
	$page_name = "";
}
if(isset($_SESSION['uid']))
{
}
elseif ($page_name=='ForgotPassword')
{
	$page_name='ForgotPassword';
}
else
{
	$page_name='login';
}
if ($page_name=='') {
	include 'home.php';
	}
elseif ($page_name=='home') {
	include 'home.php';
	}
elseif ($page_name=='login') {
	include 'login.php';
	}
elseif ($page_name=='ForgotPassword') {
	include 'ForgotPassword.php';
	}
elseif ($page_name=='ManageRegistrations') {
	include 'ManageRegistrations.php';
	}
elseif ($page_name=='Inbox') {
	include 'Inbox.php';
	}
elseif ($page_name=='UserSettings') {
	include 'UserSetting.php';
	}
elseif ($page_name=='ManageNews') {
	include 'ManageNews.php';
	}
elseif ($page_name=='EditNews') {
	include 'EditNews.php';
	}
elseif ($page_name=='Transactions') {
	include 'transactions.php';
	}
else
	{
		include 'home.php';
	}
?>