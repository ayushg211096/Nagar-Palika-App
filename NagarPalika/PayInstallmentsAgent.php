
<!DOCTYPE html>
<html class=" ">
    <head>
       <?php
	   function test_input($data) {
   $data = trim($data);
   $data = addslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
	   require_once 'condb.php';
		if(isset($_GET['month']) && isset($_GET['agent']))
		{
			$im=test_input($_GET['month']);
			$agentid=intval($_GET['agent']);
			
		}
		else
		{
			header("location:home");
		}
		$sqlp="SELECT * FROM `agent` WHERE `id` = '".$agentid."';";	
		$res2=mysqli_query($con,$sqlp);
		if (mysqli_num_rows($res2) > 0) {
		$AccDetail=mysqli_fetch_array($res2);
		}
	   $pheadtitle=$AccDetail['Name']." - ".$im." : Installment wise & Agent wise Account List";
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
		
		function checkAllPaid(ele) {
						 var checkboxes = document.getElementsByClassName('chkpaid');
						 if (ele.checked) {
							 for (var i = 0; i < checkboxes.length; i++) {
								 if (checkboxes[i].type == 'checkbox') {
									 checkboxes[i].checked = true;
								 }
							 }
						 } else {
							 for (var i = 0; i < checkboxes.length; i++) {
								 if (checkboxes[i].type == 'checkbox') {
									 checkboxes[i].checked = false;
								 }
							 }
						 }
					 }
		function checkAllUnpaid(ele) {
						 var checkboxes = document.getElementsByClassName('chkunpaid');
						 if (ele.checked) {
							 for (var i = 0; i < checkboxes.length; i++) {
								 if (checkboxes[i].type == 'checkbox') {
									 checkboxes[i].checked = true;
								 }
							 }
						 } else {
							 for (var i = 0; i < checkboxes.length; i++) {
								 if (checkboxes[i].type == 'checkbox') {
									 checkboxes[i].checked = false;
								 }
							 }
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
                                <h1 class="title"><?php echo $AccDetail['Name']." - ".$im; ?> - Multiple Payment</h1>                            </div>

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
                                <h2 class="title pull-left">Installments of <?php echo $im; ?></h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <!-- ********************************************** -->
										<div class="col-md-12">

                                                <h4>Client Paid/Unpaid List of </h4>

                                                <ul class="nav nav-tabs primary">
                                                    <li class="active">
                                                        <a href="#home-1" data-toggle="tab" aria-expanded="true">
                                                            <i class="fa ok-circle"></i> Paid
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#profile-1" data-toggle="tab" aria-expanded="false">
                                                            <i class="fa remove-circle"></i> Unpaid 
                                                        </a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content primary">
                                                    <div class="tab-pane fade active in" id="home-1">

                                                        <div>

                                                            
										<br />
										<!--
										<button onclick="PrintElem('x')" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</button>
										<div id="x" style="display:none;"><?php include 'print/printAccountsByInstallmentsAgentPaid.php';?></div> -->
										<br />
										<h2>Paid Clients of <?php echo $im; ?></h2>
										
										<form action="MultiCheckPayStatus.php" method="post" target="MultiCheckPay">
										<table id="examplevs" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Select For Unpaid<INPUT type="checkbox" onchange="checkAllPaid(this)" name="chk[]" /></th>
                                                    <th>Sr No</th>
                                                    <th>Token / Slip No</th>
                                                    <th>Name</th>
                                                    <th>W/O S/O CO</th>
                                                    <th>Address</th>
                                                    <th>Mobile No</th>
                                                    <th>Cost</th>
                                                    <th>Agent</th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>

                                            <tbody>
											<?php
												$sqlp="SELECT installments.id,installments.accid,installments.month, installments.value,installments.status, installments.remarks,accounts.name,accounts.fathername,accounts.mobile,accounts.smobile,accounts.slipno,accounts.address,agent.name 'Agents' FROM `installments`,accounts,agent WHERE installments.`month` = '".$im."' AND installments.accid = accounts.id AND accounts.dealer = agent.id AND installments.status= 'paid' AND accounts.dealer = ".$agentid.";";
												$i=0;
												$res2=mysqli_query($con,$sqlp);
												if (mysqli_num_rows($res2) > 0) {
												while($row2=mysqli_fetch_array($res2))
													{
														$i++;
														?>
												<tr>
													<td><input type="checkbox" name="Installments[]" class="chkpaid" value="<?php echo $row2['id']; ?>" class="input"></td>
													<td><?php echo $i; ?></td>
													<td><?php echo $row2['slipno']; ?></td>
													<td><?php echo $row2['name']; ?></td>
													<td><?php echo $row2['fathername']; ?></td>
													<td><?php echo $row2['address']; ?></td>
													<td><?php echo $row2['mobile'].", ".$row2['smobile']; ?></td>
													<td><?php echo $row2['value']; ?></td>
													<td><?php echo $row2['Agents']; ?></td>
													<td><?php echo $row2['remarks']; ?></td>
                                                </tr>
														<?php
													}
												}
												else
												{
													
													?>
													No Paid yet.
														<?php
												}
													
											?>
                                               
                                            </tbody>
                                        </table> <br />
										Remarks : <br /> <textarea name="remarks" id="" cols="30" rows="4" class="form-control" ></textarea>
										<br />
										Status : Unpaid
										<input type="hidden" name="status" value="unpaid" class="form-control" />
										<br />
										<input type="submit" value="Submit" class="btn btn-primary" />
										</form> <br /><br />
										<iframe src="" id="MultiCheckPay" name="MultiCheckPay" frameborder="0" style="width:100%;height:400px">
										</iframe>
                                                        </div>

                                                    </div>
                                                    <div class="tab-pane fade" id="profile-1">
                
										<br /><!--
										<button onclick="PrintElem('unpaidx')" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</button>
										<div id="unpaidx" style="display:none;"><?php include 'print/printAccountsByInstallmentsAgentUnpaid.php';?></div> -->
										<br />
                                                        <h2>Unpaid Clients of <?php echo $im; ?></h2>
										<form action="MultiCheckPayStatus.php" method="post" target="MultiCheckPayUP">
										<table id="examplevstvs" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
												<th>Select For Unpaid<INPUT type="checkbox" onchange="checkAllUnpaid(this)" name="chk[]" /></th>
                                                    <th>Sr No</th>
                                                    <th>Token / Slip No</th>
                                                    <th>Name</th>
                                                    <th>W/O S/O CO</th>
                                                    <th>Address</th>
                                                    <th>Mobile No</th>
                                                    <th>Cost</th>
                                                    <th>Agents</th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>

                                            <tbody>
											<?php
												$sqlp="SELECT installments.id,installments.accid,installments.month, installments.value,installments.status, installments.remarks,accounts.name,accounts.fathername,accounts.mobile,accounts.smobile,accounts.slipno,accounts.address,agent.name 'Agents' FROM `installments`,accounts,agent WHERE installments.`month` = '".$im."' AND installments.accid = accounts.id AND accounts.dealer = agent.id AND installments.status= 'unpaid' AND accounts.dealer = ".$agentid.";";
												$i=0;
												$res2=mysqli_query($con,$sqlp);
												if (mysqli_num_rows($res2) > 0) {
												while($row2=mysqli_fetch_array($res2))
													{
														$i++;
														?>
												<tr>
												
													<td><input type="checkbox" name="Installments[]" class="chkunpaid" value="<?php echo $row2['id']; ?>" class="input"></td>
													<td><?php echo $i; ?></td>
													<td><?php echo $row2['slipno']; ?></td>
													<td><?php echo $row2['name']; ?></td>
													<td><?php echo $row2['fathername']; ?></td>
													<td><?php echo $row2['address']; ?></td>
													<td><?php echo $row2['mobile'].", ".$row2['smobile']; ?></td>
													<td><?php echo $row2['value']; ?></td>
													<td><?php echo $row2['Agents']; ?></td>
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
                                        </table><br />
										Remarks : <br /> <textarea name="remarks" id="" cols="30" rows="4" class="form-control" ></textarea>
										<br />
										Status : Paid
										<input type="hidden" name="status" value="paid" class="form-control" />
										<br />
										<input type="submit" value="Submit" class="btn btn-primary" />
										</form> <br /><br />
										<iframe src="" id="MultiCheckPayUP" name="MultiCheckPayUP" frameborder="0" style="width:100%;height:400px">
										</iframe>

                                                    </div>
                                                </div>

                                            </div>
										<br />
										<br />
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

                        Body goes here...

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-success" type="button">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
		
		 <div class="modal" id="section-Addcat" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
            <div class="modal-dialog animated bounceInDown">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Category</h4>
                    </div>
                    <div class="modal-body">

                        Body goes here...

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-success" type="button">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    </body>
</html>



