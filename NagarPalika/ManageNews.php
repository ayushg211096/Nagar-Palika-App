
<!DOCTYPE html>
<html class=" ">
    <head>
       <?php
	   $pheadtitle="Manage Issues";
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
                                <h1 class="title">Manage News</h1>                            </div>

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
                                <h2 class="title pull-left">Manage News</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">



                                        <!-- ********************************************** -->
										<a href="EditNews"><button class="btn btn-primary btn-icon bottom15 right15" style="float:right;">
                                            <i class="fa fa-plus"></i> &nbsp; <span>Add New News</span>
                                        </button></a>
										
                                        <!-- ********************************************** -->
										<table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Tags</th>
                                                    <th>Timestamp</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>

                                            <tfoot>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Tags</th>
                                                    <th>Timestamp</th>
                                                    <th>Options</th>
                                                </tr>
                                            </tfoot>

                                            <tbody>
											<?php
												$sqlp="select * from news;";	
												$res2=mysqli_query($con,$sqlp);
												if (mysqli_num_rows($res2) > 0) {
												while($row2=mysqli_fetch_array($res2))
													{
														$newsid=$row2['id'];
														$newstitle=$row2['title'];
														$newstags=$row2['tags'];
														$newstimestamp=$row2['timestamp'];
														?>
														 <tr>
                                                    <td><?php echo $newstitle; ?></td>
                                                    <td><?php echo $newstags; ?></td>
                                                    <td><?php echo $newstimestamp; ?></td>
                                                    <td>
														<div class="btn-group bottom15 right15">
															<div class="dropdown">
																<button class="btn btn-purple dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">
																	Options
																	<span class="caret"></span>
																</button>
																<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
																<li role="presentation"><a role="menuitem" tabindex="-1" href="EditNews.php?nid=<?php echo $newsid;?>">Edit</a></li>
																<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:Delete('news',<?php echo $newsid;?>,'ManageNews')">delete</a></li>
																</ul>
															</div>
														</div>
													</td>
                                                </tr>
														<?php
													}
												}
												else
												{
													?>
													No issue in this Category
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



