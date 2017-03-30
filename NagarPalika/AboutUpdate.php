<?php 
session_start();
require 'config.php';
$ref='home';
if(isset($_SESSION['uid']))
{
	if(isset($_POST['nsubtype']))
	{
		
		if($_POST['nsubtype']=='update')
		{
			$SQL="UPDATE `about` SET
			`title`='".addslashes($_POST['ntitle'])."',
			`description`='".addslashes($_POST['nbody'])."'
			WHERE `id` = '".intval($_POST['nid'])."'";
			$ref='EditAbout.php?nid='.intval($_POST['nid']);
			if(mysqli_query($con,$SQL))
			{
				$_SESSION["processmsg"]='<div class="alert alert-success alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Success :</strong> News Updated Successfully.
                                        </div>';
				header("location:".$ref);
			}
			else
			{
				$_SESSION["processmsg"]='<div class="alert alert-warning alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Unsuccessfull :</strong> News Update unsuccessfull.
                                        </div>';
				header("location:".$ref);
				die;
			}
		}
		elseif($_POST['nsubtype']=='insert')
		{
			$SQL="INSERT INTO `About`(`title`, `description`) VALUES ('".addslashes($_POST['ntitle'])."','".addslashes($_POST['nbody'])."')";
			$ref='About.php';
			if(mysqli_query($con,$SQL))
			{
				$_SESSION["processmsg"]='<div class="alert alert-success alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Success :</strong> About Page Added Successfully.
                                        </div>';
				header("location:".$ref);
			}
			else
			{
				$_SESSION["processmsg"]='<div class="alert alert-warning alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Unsuccessfull :</strong> page Can Not Be Insert.
                                        </div>';
				header("location:".$ref);
				die;
			}
		}
	
	}
	else
	{
		header("location:".$ref);
	}
}
else
{
	header("location:".$ref);
}

?>