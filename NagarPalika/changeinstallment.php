
<!DOCTYPE html>
<html class=" ">
    <head>
       <?php
	    require_once 'condb.php';
	   $pheadtitle="Add Accounts";
	   if(isset($_GET['ac']) && isset($_GET['i']))
		{
			$ac=intval($_GET['ac']);
			$ins=intval($_GET['i']);
		}
		else
		{
			header("location:ManageAccounts.php");
		}
		$sqlp="SELECT installments.month,installments.value, installments.logs, installments.status, installments.remarks,accounts.name FROM `installments` JOIN accounts on installments.accid = accounts.id WHERE installments.`accid`  = '".$ac."' AND installments.`id` = '".$ins."';";	
		$res2=mysqli_query($con,$sqlp);
		if (mysqli_num_rows($res2) > 0) {
		$AccDetail=mysqli_fetch_array($res2);
		}
		
	   $pheadtitle=$AccDetail['name']." - ".$AccDetail['month']." :: Edit Installment";
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
<script>
function ShowAccTypedetail() {
	at=document.getElementById("AccType").value;
	if(at=='')
	{
		document.getElementById("acctypedetail").innerHTML = "";
	}
	else
	{
		 document.getElementById("acctypedetail").innerHTML = "Loading data...";
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("acctypedetail").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","showacctypedetail.php?at="+at,true);
        xmlhttp.send();
	}
};
</script>
<script type="text/javascript">

function AddAcc()
{
	//var AcSlipNO=document.getElementById("SlipNo").value;
	var AcAgent=document.getElementById("Agent").value;
	var AcName=document.getElementById("name").value;
	var AcFName=document.getElementById("fathername").value;
	var AcAddress=document.getElementById("Address").value;
	var AcMobile=document.getElementById("mobile").value;
	var AcsMobile=document.getElementById("smobile").value;
	var AcAccType=document.getElementById("AccType").value;
	var AcRemarks=document.getElementById("Remarks").value;
	//e=document.getElementById("psize");
	//var plsize=document.getElementById("psize").options[e.selectedIndex].value;
	if(AcAgent=="" || AcName=="" || AcFName=="" || AcAddress=='' || AcMobile=='' || AcAccType=='')
	{
		alert("please fill all fields correctly!");
		return false;
	}
	else
	{
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttpa = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttpa = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttpa.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("results").innerHTML = this.responseText;
                //document.getElementById("formmsg").innerHTML += "<br />"UpdateAccount.php?ac=<?php echo $ac; ?>&Agent="+AcAgent+"&name="+AcName+"&fathername="+AcFName+"&Address="+AcAddress+"&mobile="+AcMobile+"&smobile="+AcsMobile+"&AccType="+AcAgent+"&Remarks="+AcRemarks;
				showUser();
            }
        };
        xmlhttpa.open("GET","UpdateAccount.php?ac=<?php echo $ac; ?>&Agent="+AcAgent+"&name="+AcName+"&fathername="+AcFName+"&Address="+AcAddress+"&mobile="+AcMobile+"&smobile="+AcsMobile+"&AccType="+AcAccType+"&Remarks="+AcRemarks,true);
        xmlhttpa.send();
		return false;
	}
	return false;
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
                                <h1 class="title">Update Installment</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="home"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        Update Installment
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
                                <h2 class="title pull-left">Update Installment : <?php echo $AccDetail['name']." - ".$AccDetail['month'];?></h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-8 col-sm-12 col-xs-12">
									<!-- ********************************************** -->
									<form class="form-horizontal" action="updateinstallment.php" method="POST">
									<fieldset>
									<!-- Text input-->
									<div class="form-group">
									  <label class="col-md-4 control-label" for="textinput">Month</label>  
									  <div class="col-md-4"> 
									  <?php echo $AccDetail['month'];?> <br />
									  <input type="hidden" name="insid" value="<?php echo $ins;?>" />
									  <input type="hidden" name="ac" value="<?php echo $ac;?>" />
									  </div>
									</div>

									<!-- Select Basic -->
									<div class="form-group">
									  <label class="col-md-4 control-label" for="status">Status</label>
									  <div class="col-md-4">
										<select id="status" name="status" class="form-control">
										  <option value="paid" <?php if($AccDetail['status']=='paid'){ echo 'selected';} ?>>paid</option>
										  <option value="unpaid" <?php if($AccDetail['status']=='unpaid'){ echo 'selected';} ?>>unpaid</option>
										</select>
									  </div>
									</div>

									<!-- Textarea -->
									<div class="form-group">
									  <label class="col-md-4 control-label" for="remarks">Remarks</label>
									  <div class="col-md-4">                     
										<textarea class="form-control" id="remarks" name="remarks"><?php echo $AccDetail['remarks'];?></textarea>
									  </div>
									</div>

									<!-- Button -->
									<div class="form-group">
									  <label class="col-md-4 control-label" for="submit"></label>
									  <div class="col-md-4">
										<button id="submit" name="submit" class="btn btn-primary">Update Now</button>
									  </div>
									</div>

									</fieldset>
									</form>

                                    <!-- ********************************************** -->
									</div>
									<div class="col-md-4 col-sm-12 col-xs-12">
									  <div id="results">
									  <h2>Logs</h2>
									  <?php echo $AccDetail['logs'];?>
									  </div>
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



