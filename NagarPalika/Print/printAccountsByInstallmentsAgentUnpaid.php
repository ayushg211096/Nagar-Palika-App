<?php
	   require_once 'condb.php';
		if(isset($_GET['month']) && isset($_GET['agent']))
		{
			$im=test_input($_GET['month']);
			$agentid=intval($_GET['agent']);
			
		}
		else
		{
			header("location:ManageAccounts.php");
		}
		$sqlp="SELECT * FROM `agent` WHERE `id` = '".$agentid."';";	
		$res2=mysqli_query($con,$sqlp);
		if (mysqli_num_rows($res2) > 0) {
		$AccDetail=mysqli_fetch_array($res2);
		}
	   ?>
	   
<div style="width: 21cm;  min-height: 29.7cm; ">
	<?php
	include "printhead.php";
	?>
	<hr />
	<table style="text-align:left;width:90%;" align="center">
		<tr><td><strong>Agent Name : </strong><?php echo $AccDetail['Name']; ?></td><td><strong>Mobile : </strong><?php echo $AccDetail['mobile']; ?></td></tr><tr><td><strong>City / Village : </strong><?php echo $AccDetail['city']; ?></td>
		<?php
		$sqlp="SELECT installments.id,installments.accid,installments.month, installments.value,installments.status, installments.remarks,accounts.remarks 'acremarks',accounts.name,accounts.fathername,accounts.mobile,accounts.smobile,accounts.LED,accounts.gift,accounts.slipno,accounts.address,agent.name 'Agents' FROM `installments`,accounts,agent WHERE installments.`month` = '".$im."' AND installments.accid = accounts.id AND accounts.dealer = agent.id AND installments.status= 'unpaid' AND accounts.dealer = ".$agentid."  ORDER BY `accounts`.`slipno` ASC;";
		$i=0;
		$res2=mysqli_query($con,$sqlp);	
		?>
		<td><strong>Month : </strong><?php echo $im; ?> UNPAID</td></tr>
	</table>
										<table cellspacing="0" cellpadding="3" width="100%" style="font-size:12px;color:#000;font-family: Arial, Helvetica, sans-serif;" border="1">
                                            <thead>
                                                <tr>
                                                    <th>Sr No</th>
                                                    <th>Token No</th>
                                                    <th>Name</th>
                                                    <th>S/O W/O C/O</th>
                                                    <th>Address</th>
                                                    <th>Mobile No</th>
                                                    <th>Cost</th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>

                                            <tbody>
											<?php
												$totalvalue=0;
												if (mysqli_num_rows($res2) > 0) {
												while($row2=mysqli_fetch_array($res2))
													{
														$i++;
														$totalvalue=$totalvalue+$row2['value'];
														?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo strtoupper($row2['slipno']); ?></td>
													<td><?php echo strtoupper($row2['name']); ?></td>
													<td><?php echo strtoupper($row2['fathername']); ?></td>
													<td><?php echo strtoupper($row2['address']); ?></td>
													<td><?php echo strtoupper($row2['mobile']); ?>,<?php echo $row2['smobile']; ?></td>
													<td><?php echo strtoupper($row2['value']); ?>₹</td>
													<td><?php 
													if($row2['LED']!=''){	echo 'L,';	}
													if($row2['gift']!=''){	echo 'W,';	}
													echo strtoupper($row2['remarks'].",".$row2['acremarks']); ?></td>
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
                                               <tr>
													<td colspan="6">Total Unpaid Money</td>
													
													<td><?php echo $totalvalue; ?>₹</td>
													<td></td>
                                                </tr>
                                            </tbody>
                                        </table>
										<hr />
	<?php
	include "printfoot.php";
	?>
	</div>