<?php
	   require_once 'condb.php';
	   ?>
	   
<div style="width: 21cm;  height: 29.7cm; ">
	<?php
	include_once "printhead.php";
	?>
	<hr />
	<table style="text-align:left;width:90%;" align="center">
		<tr><td width="80%"><strong>All Accounts</strong></h2></td>
		<?php
		$sqlp="SELECT accounts.id 'acid',accounts.slipno, accounts.name, accounts.fathername, accounts.address, accounts.mobile, accounts.smobile, accounts.remarks, accounts.dealer,acctype.Name 'AccType' FROM `accounts`JOIN `AccType` on accounts.AccType = acctype.id  ORDER BY `accounts`.`slipno` ASC;";
		$i=0;
		$res2=mysqli_query($con,$sqlp);	
		?>
		<td><strong>Total Clients :</strong><?php echo mysqli_num_rows($res2); ?></td></tr>
	</table><hr />
										<table cellspacing="0" cellpadding="3" width="100%" style="font-size:12px;color:#000;font-family: Arial, Helvetica, sans-serif;" border="1">
                                            <thead>
                                                <tr>
                                                    <th>Sr No</th>
                                                    <th>Token No</th>
                                                    <th>Name</th>
                                                    <th>S/O W/O C/O</th>
                                                    <th>Address</th>
                                                    <th>Mobile No</th>
                                                    <th>AccType</th>
                                                    <th>Remarks</th>
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
													<td><?php echo $row2['slipno']; ?></td>
													<td><?php echo $row2['name']; ?></td>
													<td><?php echo $row2['fathername']; ?></td>
													<td><?php echo $row2['address']; ?></td>
													<td><?php echo $row2['mobile']; ?>,<?php echo $row2['smobile']; ?></td>
													<td><?php echo $row2['AccType']; ?></td>
													<td><?php echo $row2['remarks']; ?></td>
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