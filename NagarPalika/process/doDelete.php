<?php
session_start();
require '../config.php';
$Somethingiswrong='<div class="alert alert-warning alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Warning:</strong> Something is wrong! please try again.</div>';
if(isset($_SESSION["login_id"]))
{
	if(isset($_GET['delete']))
	{
		if($_GET['delete']=='accounts')
		{
			$ref=$_GET['ref'];
			$nid=intval($_GET['id']);
			$nsn=intval($_GET['sn']);
			$sqlp="select * from accounts where id = ".$nid." and slipno = ".$nsn.";";
			$res2=mysqli_query($con,$sqlp);
				if (mysqli_num_rows($res2) > 0) 
				{
				while($row2=mysqli_fetch_array($res2))
					{
					$nid=$row2['id'];
					$ntitle=$row2['name'];
					$sqlp="delete from accounts where id = ".$nid." and slipno = ".$nsn.";
					DELETE FROM `installments` WHERE `accid` = ".$nid." ; ";
					
					if(mysqli_multi_query($con,$sqlp))
					{
						$_SESSION["processmsg"]='<div class="alert alert-error alert-dismissible fade in">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<strong>Deleted :</strong> Account : "'.$ntitle.'" ;Slip No  "'.$nsn.'" Deleted Successfully.
									</div>';
					}
					else
					{
					$_SESSION["processmsg"]=$Somethingiswrong.$sqlp;	
					}
					
					header("location:../".$ref);
					}
				}
				else
				{
					
				$Somethingiswrong='<div class="alert alert-warning alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Warning:</strong> Something is wrong! Account Not Found please try again.</div>';
					$_SESSION["processmsg"]=$Somethingiswrong;
					header("location:../".$ref);
				}
		}
	}
}
else
{
	header("location:../");
}
?>