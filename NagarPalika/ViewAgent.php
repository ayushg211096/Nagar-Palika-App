
<!DOCTYPE html>
<html class=" ">
    <head>
       <?php
	   require_once 'condb.php';
		if(isset($_GET['id']))
		{
			$ac=intval(trim($_GET['id'],'SEA'))-1000;
		}
		else
		{
			header("location:ManageAccounts.php");
		}
		$sqlp="SELECT * FROM `agent` WHERE `id` = '".$ac."';";	
		$res2=mysqli_query($con,$sqlp);
		if (mysqli_num_rows($res2) > 0) {
		$AccDetail=mysqli_fetch_array($res2);
		}
		
	   $pheadtitle=$AccDetail['Name']." View Accounts";
	   require("corehead.php");
	   
	   ?>
	    
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <link href="assets/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>     
		<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
		<script>
		function Delete(del,id,ref)
		{
			var x;
			if (confirm("Are You Sure to Delete?") == true) {
				window.location="process/doDelete.php?delete="+del+"&id="+id+"&ref="+ref;
			} 
		}
		</script>


    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" "><!-- START TOPBAR -->
        <?php include("topbar.php"); ?>
        <!-- END TOPBAR -->
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
				<?php include("sidebar.php"); ?>
		   <!--  SIDEBAR - END -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title"><?php echo $AccDetail['Name']; ?></h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="home"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
					<?php
					if(isset($_SESSION["processmsg"]))
					{
						echo $_SESSION["processmsg"];
						$_SESSION["processmsg"]="";
					}
					?>
                  
                    <div class="col-lg-12">
                        <section class="box purple">
                            <header class="panel_header">
                                <h2 class="title pull-left">Agent Detail - <?php echo $AccDetail['Name']; ?></h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
									<h2>Account Detail</h2>
                                        <!-- ********************************************** -->
										<table class="table table-striped dt-responsive display">
										<tr><th>Name :</th><td><?php echo strtoupper($AccDetail['Name']); ?></td></tr>
										<tr><th>Mobile :</th><td><?php echo $AccDetail['mobile']; ?></td></tr>
										<tr><th>City / Village :</th><td><?php echo strtoupper($AccDetail['city']); ?></td></tr>
										</table>
										
										<br />
										<br />
										<a data-toggle="modal" href="#section-Addcat" class="btn btn-primary pull-right"><i class="fa fa-edit"></i> Edit</a>
										<button onclick="PrintElem('x')" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</button>
										<div id="x" style="display:none;"><?php include 'print/printAgent.php';?></div>
										<br />
										<div class="dropdown">
										<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Installment Wise List
										<span class="caret"></span></button>
										<ul class="dropdown-menu">
										 <li>
																		<a class="" href="ViewAccountsByInstallmentsAgent.php?agent=<?php echo $ac; ?>&month=Dec 16">Dec 16</a>
																		<a class="" href="ViewAccountsByInstallmentsAgent.php?agent=<?php echo $ac; ?>&month=Jan 17">Jan 17</a>
																		<a class="" href="ViewAccountsByInstallmentsAgent.php?agent=<?php echo $ac; ?>&month=Feb 17">Feb 17</a>
																		<a class="" href="ViewAccountsByInstallmentsAgent.php?agent=<?php echo $ac; ?>&month=Mar 17">Mar 17</a>
																		<a class="" href="ViewAccountsByInstallmentsAgent.php?agent=<?php echo $ac; ?>&month=Apr 17">Apr 17</a>
																		<a class="" href="ViewAccountsByInstallmentsAgent.php?agent=<?php echo $ac; ?>&month=May 17">May 17</a>
																		<a class="" href="ViewAccountsByInstallmentsAgent.php?agent=<?php echo $ac; ?>&month=Jun 17">Jun 17</a>
																		<a class="" href="ViewAccountsByInstallmentsAgent.php?agent=<?php echo $ac; ?>&month=Jul 17">Jul 17</a>
																		<a class="" href="ViewAccountsByInstallmentsAgent.php?agent=<?php echo $ac; ?>&month=Aug 17">Aug 17</a>
																		<a class="" href="ViewAccountsByInstallmentsAgent.php?agent=<?php echo $ac; ?>&month=Sep 17">Sep 17</a>
																		<a class="" href="ViewAccountsByInstallmentsAgent.php?agent=<?php echo $ac; ?>&month=Oct 17">Oct 17</a>
																		<a class="" href="ViewAccountsByInstallmentsAgent.php?agent=<?php echo $ac; ?>&month=Nov 17">Nov 17</a>
																	</li>
										</ul>
									  </div>
										<br />
										<h2>Clients under this Agent</h2>
										<table id="example" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr No</th>
                                                    <th>Token / Slip No</th>
                                                    <th>Name</th>
                                                    <th>Father's Name</th>
                                                    <th>Address</th>
                                                    <th>Mobile No</th>
                                                    <th>AccType</th>
                                                    <th>LED</th>
                                                    <th>Prize</th>
                                                    <th>Remarks</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>

                                            <tbody>
											<?php
												$sqlp="SELECT accounts.id 'acid',accounts.slipno, accounts.name, accounts.fathername, accounts.address, accounts.mobile, accounts.LED, accounts.gift, accounts.smobile, accounts.remarks, accounts.dealer,acctype.Name 'AccType' FROM `accounts`JOIN `AccType` on accounts.AccType = acctype.id  WHERE accounts.dealer = '".$ac."';";
												$i=0;
												$res2=mysqli_query($con,$sqlp);
												if (mysqli_num_rows($res2) > 0) {
												while($row2=mysqli_fetch_array($res2))
													{
														$i++;
														?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo strtoupper($row2['slipno']); ?></td>
													<td><?php echo strtoupper($row2['name']); ?></td>
													<td><?php echo strtoupper($row2['fathername']); ?></td>
													<td><?php echo strtoupper($row2['address']); ?></td>
													<td><?php echo $row2['mobile']; ?>,<?php echo $row2['smobile']; ?></td>
													<td><?php echo strtoupper($row2['AccType']); ?></td>
													<td><?php echo strtoupper($row2['LED']); ?></td>
													<td><?php echo strtoupper($row2['gift']); ?></td>
													<td><?php echo strtoupper($row2['remarks']); ?></td>
													<td><a href="Viewaccounts.php?ac=<?php echo $row2['acid']; ?>" class="btn btn-primary">View</a></td>
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
            <!-- END CONTENT -->
        <!-- END CONTAINER -->
        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->
<?php include("coreend.php"); ?>
  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
		<script src="assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
		<script src="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 




        <!-- General section box modal start -->
        <div class="modal" id="section-settings" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
            <div class="modal-dialog animated bounceInDown">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Section Settings</h4>
                    </div>
                    <div class="modal-body">
					<h3>Are You Sure to Paid all installments of all months of all clients of this agent.</h3>
                       <form action="updateallinstallmentsofagent.php" method="POST">
						<input type="hidden" name="dealer" value="<?php echo $ac;?>" />
						<input type="submit" class="btn btn-success" name="submit" value="Paid All" />
					   </form>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
		
		 <div class="modal" id="section-Addcat" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
            <div class="modal-dialog animated bounceInDown">
                <div class="modal-content">
				<form action="updateagent.php" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Update Agent Detail</h4>
                    </div>
                    <div class="modal-body">

                     <div class="row">
					 <input type="hidden" name="Agentid" value="<?php echo $ac;?>"/>				
						<div class="col-md-4">Name</div>
						<div class="col-md-8"><input type="text" name="name" id="name" placeholder="Name" class="form-control input-md" pattern="[a-zA-Z ]{1,60}" title="name : accept onlya-z ,A-Z or whitespace" value="<?php echo strtoupper($AccDetail['Name']); ?>" required=""></div>
						<div class="col-md-4">Mobile</div>
						<div class="col-md-8"><input type="text" value="<?php echo $AccDetail['mobile']; ?>" id="mobile" name="mobile" placeholder="Mobile No" class="form-control input-md" pattern="[0-9]{10}" title="Mobile No : {accept only 10 digit}" required=""></div>
						<div class="col-md-4">City</div>
						<div class="col-md-8"><input type="text" name="city" value="<?php echo strtoupper($AccDetail['city']); ?>" id="city" placeholder="city" class="form-control input-md" pattern="[a-zA-Z ]{1,60}" title="name : accept onlya-z ,A-Z or whitespace" required=""></div>
					</div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <input type="submit" value="Save Changes" class="btn btn-success">
                    </div>
					</form>
                </div>
            </div>
        </div>
        <!-- modal end -->
    </body>
</html>



