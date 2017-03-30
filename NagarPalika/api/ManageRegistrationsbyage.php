
<!DOCTYPE html>
<html class=" ">
    <head>
       <?php
	   require("../config.php");
	   ?>
<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>     
    </head>
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style='display:inline-block;width:100%;padding:15px 0 0 15px;'>
                    <div class="col-lg-12">
                        <section class="box purple">
                            <header class="panel_header">
                                <h2 class="title pull-left">Manage Registrations By Age Group { <?php echo $_GET['ag']; ?> }</h2>
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
												$sqlp="SELECT * FROM `registration` WHERE `agegroup` = '".$_GET['ag']."';";	
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


 <script src="../assets/js/jquery-1.11.2.min.js" type="text/javascript"></script> 
        <script src="../assets/js/jquery.easing.min.js" type="text/javascript"></script> 
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
		 <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
		 <script src="../assets/js/scripts.js" type="text/javascript"></script>
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="../assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
		<script src="../assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
		<script src="../assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

                                    </div>
                                </div>
                            </div>
                        </section></div>
                </section>
            </section>
        <!-- modal end -->
    </body>
</html>



