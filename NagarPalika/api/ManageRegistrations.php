
<!DOCTYPE html>
<html class=" ">
    <head>
       <?php
	   require("../config.php");
	   ?>

    </head>
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style='display:inline-block;width:100%;padding:15px 0 0 15px;'>
                    <div class="col-lg-12">
                        <section class="box purple">
                            <header class="panel_header">
                                <h2 class="title pull-left">Manage Registrations</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
										<table id="example-1" border="1" cellspacing="0" cellpadding="2" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Reg. ID</th>
													<th>Name</th>
                                                    <th>Email</th>
                                                    <th>Institute</th>
                                                    <th>Address</th>
                                                    <th>City</th>
                                                    <th>PIN</th>
                                                    <th>Phone</th>
                                                    <th>Age Group</th>
                                                    <th>Mobile Veri</th>
                                                    <th>Payment</th>
                                                    <th>Level Passed</th>
                                                    <th>Timestamp</th>
                                                </tr>
                                            </thead>

                                            <tfoot>
                                                <tr>
                                                    <th>Reg. ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Institute</th>
                                                    <th>Address</th>
                                                    <th>City</th>
                                                    <th>PIN</th>
                                                    <th>Phone</th>
                                                    <th>Age Group</th>
                                                    <th>Mobile Veri</th>
                                                    <th>Payment</th>
                                                    <th>Level Passed</th>
                                                    <th>Timestamp</th>
                                                </tr>
                                            </tfoot>

                                            <tbody>
											<?php
												$sqlp="select * from registration;";	
												$res2=mysqli_query($con,$sqlp);
												if (mysqli_num_rows($res2) > 0) {
												while($row2=mysqli_fetch_array($res2))
													{
														$cvsid=$row2['id'];
														$cvsnamef=$row2['name'];
														$cvsemail=$row2['email'];
														$cvsaddress1=$row2['address'];
														$cvsphone=$row2['mobile'];
														$cvstimestamp=$row2['timestamp'];
														$regid="C4L".(1000+$cvsid);
														?>
														 <tr>
                                                    <td><?php echo $regid; ?></td>
                                                    <td><?php echo $cvsnamef; ?></td>
                                                    <td><?php echo $cvsemail; ?></td>
													<td><?php echo $row2['institute']; ?></td>
                                                    <td><?php echo $cvsaddress1; ?></td>
													<td><?php echo $row2['city']; ?></td>
													<td><?php echo $row2['PIN']; ?></td>
                                                    <td><?php echo $cvsphone; ?></td>
                                                    <td><?php echo $row2['agegroup']; ?></td>
													<td><?php if ($row2['mobcnfrm']==1) { echo "<span style='color:green'>verified</span>"; } else { echo "<span style='color:red'>unverified</span>"; } ?></td>
													<td><?php if ($row2['payment']==1) { echo "<span style='color:green'>Paid</span>"; } else { echo "<span style='color:red'>unpaid</span>"; } ?></td>
													<td><?php echo $row2['level']; ?></td>
                                                    <td><?php echo $cvstimestamp; ?></td>
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

                                        <!-- ********************************************** -->
</div>



                                    </div>
                                </div>
                            </div>
                        </section></div>
                </section>
            </section>
        <!-- modal end -->
    </body>
</html>



