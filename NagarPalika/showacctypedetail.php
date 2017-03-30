
<?php
require 'condb.php';
if(isset($_GET['at']))
{
	$sqlp="SELECT * FROM `acctype` where id='".intval($_GET['at'])."';";	
	$res2=mysqli_query($con,$sqlp);
	if (mysqli_num_rows($res2) > 0) {
	while($row2=mysqli_fetch_array($res2))
		{
			echo '<strong>'.$row2['Name'].'</strong> - FMI: '.$row2['FMI'].' | OMI :'.$row2['OMI'];	
		}
	}
	else
	{
		echo "No AccTypes added yet please add one atleast";
	}
}

?>