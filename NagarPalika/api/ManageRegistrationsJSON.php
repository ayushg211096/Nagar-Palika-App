<?php
	   require("../config.php");
header('Content-type:application/json;charset=utf-8');
	$sqlp="select * from registration;";	
	$res2=mysqli_query($con,$sqlp);
	if (mysqli_num_rows($res2) > 0) {
	while($row= mysqli_fetch_assoc($res2))
		{
			 $emparray[] = $row;
		}
		echo json_encode($emparray);
	}
	else
	{
		?>
		No registrations yet.
			<?php
	}
		
?>