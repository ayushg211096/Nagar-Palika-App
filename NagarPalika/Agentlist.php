
	<?php
session_start();
require 'config.php';
if(isset($_SESSION['uid']))
{
		$sqlp="SELECT * FROM `agent`;";	
		$i=0;
		$res2=mysqli_query($con,$sqlp);
		if (mysqli_num_rows($res2) > 0) {
		while($row2=mysqli_fetch_array($res2))
			{
				$i++;
				$cvsid=$row2['id'];
				$cvsnamef=$row2['Name'];
				$cvsphone=$row2['mobile'];
				$regid="SEA".(1000+$cvsid);
				?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $regid; ?></td>
			<td><?php echo $cvsnamef; ?></td>
			<td><?php echo $cvsphone; ?></td>
			<td><?php echo $row2['city']; ?></td>
		</tr>
				<?php
			}
		}
		else
		{
			?>
			No registrations yet.
				<?php
		}
}
else
{
	echo "<tr><td colspan='4'>Please Login First</td></tr>";
}
	?>
	   