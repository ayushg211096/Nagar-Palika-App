
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
		
	   $pheadtitle=" Stock Management : Sobhagya Enterprises";
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
                                <h1 class="title">Stock Management</h1>                            </div>

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
                                <h2 class="title pull-left">Stock Management</h2>
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
                                                <ul class="nav nav-tabs primary">
                                                    <li class="active">
                                                        <a href="#home-1" data-toggle="tab" aria-expanded="true">
                                                            <i class="fa ok-circle"></i> Stock Recieved
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#profile-1" data-toggle="tab" aria-expanded="false">
                                                            <i class="fa remove-circle"></i> Stock Dispatched 
                                                        </a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content primary">
                                                    <div class="tab-pane fade active in" id="home-1">

                                                        <div>

                                        <br />
										<a data-toggle="modal" href="#section-MobList" class="btn btn-primary pull-right"><i class="fa fa-line-chart"></i> Add Stock Recieve Entry</a>
										<button onclick="PrintElem('x')" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</button>
										
										<div id="x" style="display:none;"><?php include 'print/printAccountsByInstallmentsPaid.php';?></div>                    
										<h2>Stock Recived</h2>
										<table id="example" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr No</th>
                                                    <th>Entry id</th>
                                                    <th>Product</th>
                                                    <th>date</th>
                                                    <th>quantity</th>
                                                    <th>dealer</th>
                                                    <th>Remarks</th>
                                                    <th>Timestamp</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php
											//$stockproducts[]="";
												$sqlp="SELECT * FROM `stockrecive`";
												$i=0;
												$res2=mysqli_query($con,$sqlp);
												$mobilenumlist="";
												if (mysqli_num_rows($res2) > 0) {
												while($row2=mysqli_fetch_array($res2))
													{
														$stockproducts[] = $row2['product'];
														$i++;
														?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $row2['id']; ?></td>
													<td><?php echo $row2['product']; ?></td>
													<td><?php echo $row2['date']; ?></td>
													<td><?php echo $row2['quantity']; ?></td>
													<td><?php echo $row2['dealer']; ?></td>
													<td><?php echo $row2['remarks']; ?></td>
													<td><?php echo $row2['timestamp']; ?></td>
                                                </tr>
														<?php
													}
												}
												else
												{
													$stockproducts[]="";
													
													?>
													No registrations yet.
														<?php
												}
													
											?>
                                               
                                            </tbody>
                                        </table>
										<br />
                                                        </div>

                                                    </div>
                                                    <div class="tab-pane fade" id="profile-1">

                                                        <br />
										<a data-toggle="modal" href="#section-UnMobList" class="btn btn-primary pull-right"><i class="fa fa-line-chart"></i> Add Stock Dispatched Entry</a>
										<button onclick="PrintElem('unpaidx')" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</button>
										<div id="unpaidx" style="display:none;"><?php include 'print/printAccountsByInstallmentsUnpaid.php';?></div>
										<br />
														<h2>Stock Dispatched</h2>
										<table id="examplevst" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr No</th>
                                                    <th>Entry id</th>
                                                    <th>Product</th>
                                                    <th>date</th>
                                                    <th>quantity</th>
                                                    <th>Remarks</th>
                                                    <th>Timestamp</th>
                                                </tr>
                                            </thead>

                                            <tbody>
											<?php
												$sqlp="SELECT * FROM `stockdispatched`";
												$i=0;
												$res2=mysqli_query($con,$sqlp);
												if (mysqli_num_rows($res2) > 0) {
													$unpaidmobilenumlist="";
												while($row2=mysqli_fetch_array($res2))
													{
														$i++;
														?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $row2['id']; ?></td>
													<td><?php echo $row2['product']; ?></td>
													<td><?php echo $row2['date']; ?></td>
													<td><?php echo $row2['quantity']; ?></td>
													<td><?php echo $row2['remarks']; ?></td>
													<td><?php echo $row2['timestamp']; ?></td>
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
		
		 <div class="modal" id="section-MobList" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
            <div class="modal-dialog animated bounceInDown">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Stock Recieve Entry</h4>
                    </div>
                    <div class="modal-body">
					<div class="row">
										<form class="form-horizontal">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Product">Product</label>  
  <div class="col-md-4">
  <input id="Product" name="Product" list="ProductList" type="text" placeholder="Product Name" class="form-control input-md" required="">
  <datalist id="ProductList">
	<?php foreach($stockproducts as $stockproduct){ ?>
	<option value="<?php echo htmlspecialchars($stockproduct); ?>"><?php echo $stockproduct; ?></option>
	<?php }	?>
</datalist>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Date">Date</label>  
  <div class="col-md-4">
  <input id="Date" name="Date" type="date" placeholder="Date" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="quantity">quantity</label>  
  <div class="col-md-4">
  <input id="quantity" name="quantity" type="number" placeholder="quantity" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="remarks">remarks</label>  
  <div class="col-md-4">
  <input id="remarks" name="remarks" type="text" placeholder="remarks" class="form-control input-md" >
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">submit</button>
	<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
  </div>
</div>

</fieldset>
</form>

					</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
		 <div class="modal" id="section-UnMobList" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
            <div class="modal-dialog animated bounceInDown">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Mobile Number List:</h4>
                    </div>
                    <div class="modal-body">
					<div class="row">
										<textarea name="phonenumlist" id="phonenumlist" class="col-md-12" rows="10"><?php echo $unpaidmobilenumlist; ?></textarea>
					</div>
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



