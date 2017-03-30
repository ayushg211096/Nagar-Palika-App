
<!DOCTYPE html>
<html class=" ">
    <head>
       <?php
	   $pheadtitle="Add Accounts";
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
	var AcSlipNO=document.getElementById("SlipNo").value;
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
	if(AcSlipNO=="" || AcAgent=="" || AcName=="" || AcFName=="" || AcAddress=='' || AcMobile=='' || AcAccType=='')
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
                //document.getElementById("formmsg").innerHTML += "<br />addplayer.php?name="+plname+"&mob="+plmob+"&email="+plemail+"&size="+plsize;
				Freset();
				showUser();
				
            }
        };
        xmlhttpa.open("GET","SaveAccount.php?SlipNo="+AcSlipNO+"&Agent="+AcAgent+"&name="+AcName+"&fathername="+AcFName+"&Address="+AcAddress+"&mobile="+AcMobile+"&smobile="+AcsMobile+"&AccType="+AcAccType+"&Remarks="+AcRemarks,true);
        xmlhttpa.send();
		return false;
	}
	return false;
}
</script>
<script type="text/javascript">
function Freset() {
    document.getElementById("Myform").reset();
	document.getElementById("SlipNo").focus();
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
                                <h1 class="title">Add Account / Client</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="home"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="AddAccount.php"><i class="fa fa-user"></i>Add Account</a>
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
                                <h2 class="title pull-left">Add Account / Client</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-8 col-sm-12 col-xs-12">
									<!-- ********************************************** -->
										<form class="form-horizontal" action="" id="Myform" onsubmit="return AddAcc()" >
										<fieldset>
										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label" for="SlipNo">Token / Slip No</label>  
										  <div class="col-md-8">
										  <input id="SlipNo" name="SlipNo" type="text" pattern="[0-9]{1,5}" placeholder="Slip No" class="form-control input-md" required="">
											
										  </div>
										</div>

										<!-- Select Basic -->
										<div class="form-group">
										  <label class="col-md-4 control-label" for="Agent">Agent</label>
										  <div class="col-md-8">
											<select id="Agent" name="Agent" class="form-control" required>
											  <?php
											  if(isset($_GET['agentid']))
											  {
												  $agentid=intval(trim($_GET['agentid'],'SEA'))-1000;
											  }
												$sqlp="SELECT * FROM `agent`;";	
												$i=0;
												$res2=mysqli_query($con,$sqlp);
												if (mysqli_num_rows($res2) > 0) {
												while($row2=mysqli_fetch_array($res2))
													{
														if($row2['id']==$agentid)
														{
															echo '<option value="'.$row2['id'].'" selected>'.$row2['Name'].'</option>';	
														}
														else
														{
															echo '<option value="'.$row2['id'].'">'.$row2['Name'].'</option>';	
														}
													
													}
												}
												else
												{	echo "<option value='x' disabled>No agents added yet please add one atleast</option>";
												}
													
											?>
											</select>
										  </div>
										</div>

										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label" for="name">Name</label>  
										  <div class="col-md-8">
										  <input id="name" name="name" type="text" pattern="{1,60}"  placeholder="Full Name" class="form-control input-md" required="">
											
										  </div>
										</div>

										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label" for="fathername">S/O W/O C/O</label>  
										  <div class="col-md-8">
										  <input id="fathername" name="fathername" type="text" pattern="{1,60}" placeholder="Father's name" class="form-control input-md" required="">
											
										  </div>
										</div>

										<!-- Textarea -->
										<div class="form-group">
										  <label class="col-md-4 control-label" for="Address">Address</label>
										  <div class="col-md-8">                     
											<textarea class="form-control" id="Address" name="Address" required></textarea>
										  </div>
										</div>

										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label" for="mobile">Mobile</label>  
										  <div class="col-md-8">
										  <input id="mobile" name="mobile" type="text" pattern="[0-9]{10}" placeholder="10 digit mobile no" class="form-control input-md" required="">
											
										  </div>
										</div>

										<!-- Text input-->
										<div class="form-group">
										  <label class="col-md-4 control-label" for="smobile">Alternative Mobile</label>  
										  <div class="col-md-8">
										  <input id="smobile" name="smobile" type="text" pattern="[0-9]{10}" placeholder="10 digit mobile no" class="form-control input-md">
											
										  </div>
										</div>

										<!-- Select Basic -->
										<div class="form-group">
										  <label class="col-md-4 control-label" for="AccType">Account Type</label>
										  <div class="col-md-8">
											<select id="AccType" name="AccType" class="form-control" onchange="ShowAccTypedetail();" required>
											  <?php
												$sqlp="SELECT * FROM `acctype`;";	
												$res2=mysqli_query($con,$sqlp);
												if (mysqli_num_rows($res2) > 0) {
												while($row2=mysqli_fetch_array($res2))
													{
														echo '<option value="'.$row2['id'].'" >'.$row2['Name'].'</option>';	
													}
												}
												else
												{
													echo "<option value='x' disabled>No AccTypes added yet please add one atleast</option>";
												}
													
											?>
											</select>
											<div id="acctypedetail"></div>
										  </div>
										</div>

										<!-- Textarea -->
										<div class="form-group">
										  <label class="col-md-4 control-label" for="Remarks">Remarks</label>
										  <div class="col-md-8">                     
											<textarea class="form-control" id="Remarks" name="Remarks"></textarea>
										  </div>
										</div>
										<!-- Button -->
										<div class="form-group">
										  <label class="col-md-4 control-label" for="submit"></label>
										  <div class="col-md-8">
											<button id="submit" name="submit" class="btn btn-primary">Add Account</button>
										  </div>
										</div>

										</fieldset>
										</form>

                                    <!-- ********************************************** -->
									</div>
									<div class="col-md-4 col-sm-12 col-xs-12">
									  <div id="results"></div>
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



