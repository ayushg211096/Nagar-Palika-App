<?php
	   require("../config.php");
header('Content-type:text/json');
header('Access-Control-Allow-Origin: *');
	if(isset($_GET['id']))
	{
		$sqlp="select * from about where id ='".intval($_GET['id'])."';";
	}
	else
	{
	$sqlp="select * from about;";	
	}
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