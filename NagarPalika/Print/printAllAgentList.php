<?php
	   require_once 'condb.php';
	   ?>
	   
<div style="width: 21cm;  height: 29.7cm; ">
	<?php
	include_once "printhead.php";
	?>
	<hr />
	<table style="text-align:left;width:90%;" align="center">
		<tr><td width="80%"><strong>All Agents</strong></h2></td>
		<?php
		$sqlp="SELECT * FROM `agent`;";
		$i=0;
		$res2=mysqli_query($con,$sqlp);	
		?>
		<td><strong>Total Agents : </strong><?php echo mysqli_num_rows($res2); ?></td></tr>
	</table><hr />
										<table cellspacing="0" cellpadding="3" width="100%" style="font-size:12px;color:#000;font-family: Arial, Helvetica, sans-serif;" border="1">
                                            <thead>
                                                <tr>
                                                    <th>Sr No</th>
                                                    <th>Agent Id</th>
                                                    <th>Name</th>
                                                    <th>City</th>
                                                    <th>Mobile</th>
                                                    <th>Total Clients</th>
                                                </tr>
                                            </thead>

                                            <tbody>
											<?php
												
												if (mysqli_num_rows($res2) > 0) {
												while($row2=mysqli_fetch_array($res2))
													{
														$i++;
														?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo "SEA".(1000+$row2['id']); ?></td>
													<td><?php echo $row2['Name']; ?></td>
													<td><?php echo $row2['city']; ?></td>
													<td><?php echo $row2['mobile']; ?></td>
													<td><?php 
														$sql="SELECT COUNT(*) AS Total FROM `accounts` WHERE `dealer` = ".$row2['id'];
														$res3=mysqli_query($con,$sql);
													if (mysqli_num_rows($res3) > 0) {
														while($row3=mysqli_fetch_array($res3))
														{														
														echo $row3['Total'];
														}
													}
														?></td>
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
													
											?>
                                               
                                            </tbody>
                                        </table>
										<hr />
	<?php
	include_once "printfoot.php";
	?>
	</div>