<!DOCTYPE html>
<html class=" ">
    <head>
       <?php
	   if(isset($_SESSION['uid']))
		{
		}
		else
		{
			header("location:login");
		}
	   $pheadtitle="Update About";
	   require("corehead.php");
	   ?>
	    <link href="assets/plugins/jquery-ui/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datepicker/css/datepicker.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/daterangepicker/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/timepicker/css/timepicker.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datetimepicker/css/datetimepicker.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/ios-switch/css/switch.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/select2/select2.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/typeahead/css/typeahead.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/multi-select/css/multi-select.css" rel="stylesheet" type="text/css" media="screen"/> 
		<script src="ckeditor/ckeditor.js"></script>
		<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 



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
                                <h1 class="title">About Editor</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="home"><i class="fa fa-home"></i>Home</a>
                                    </li>
									<li>
                                        <a href="<?php echo $_SERVER['REQUEST_URI'];?>"><i class="fa fa-edit"></i>Page Editor</a>
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
                                <h2 class="title pull-left">Edit About Pages</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">



                                        <!-- ********************************************** -->
<?php
	if(isset($_GET['nid']))
	{
		$sqlp="SELECT * FROM `about` WHERE `id` = ".intval($_GET['nid']).";";
		$res2=mysqli_query($con,$sqlp);
		if (mysqli_num_rows($res2) > 0) {
		while($row2=mysqli_fetch_array($res2))
			{
				$nid=$row2['id'];
				$ntitle=$row2['title'];
				$nbody=$row2['description'];
				$NewsNotFoundError=0;
			}
		}
		else
		{
			$NewsNotFoundError=1;
		}
		$NewsUpdate=1;							
	}
	else
	{
		$NewsNotFoundError=0;
		$NewsUpdate=0;
		$nid="";
		$ntitle="";
		$nbody="";
	}
	if($NewsNotFoundError==0)
	{
	?>
	<form action="AboutUpdate.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label class="form-label" for="Title">Title</label>
		<span class="desc">e.g. "Today is the.."</span>
		<div class="controls">
			<input type="text" class="form-control" id="ntitle" name="ntitle" value="<?php echo $ntitle;?>" required>
			<?php if($NewsUpdate==1){ ?>
			<input type="hidden" class="form-control" id="nid" name="nid" value="<?php echo $_GET['nid'];?>" required>
			<input type="hidden" class="form-control" id="nsubtype" name="nsubtype" value="update" required>
			<?php } else { ?>
			<input type="hidden" class="form-control" id="nsubtype" name="nsubtype" value="insert" required>
			<?php } ?>
		</div>
	</div>
    
	<div class="form-group">
		<label class="form-label" for="field-6">Body</label>
		<span class="desc">e.g. "Enter News description here."</span>
		<div class="controls">
			<textarea class="form-control" cols="5" id="bodyeditor" name="nbody" required><?php echo $nbody;?></textarea>
			<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'bodyeditor' );
				CKEDITOR.config.removeButtons = 'Save';
				CKEDITOR.dtd.$removeEmpty['span'] = false;
            </script>
		</div>
	</div>
	<div class="form-group">
	<input type="submit" class="btn btn-primary" value="Save">
	</div>
	</form>
	<?php
	}
	else
	{
	include '404.php';	
	}
?>
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
        <script src="assets/plugins/jquery-ui/smoothness/jquery-ui.min.js" type="text/javascript"></script> <script src="assets/plugins/datepicker/js/datepicker.js" type="text/javascript"></script> <script src="assets/plugins/daterangepicker/js/moment.min.js" type="text/javascript"></script> <script src="assets/plugins/daterangepicker/js/daterangepicker.js" type="text/javascript"></script> <script src="assets/plugins/timepicker/js/timepicker.min.js" type="text/javascript"></script> <script src="assets/plugins/datetimepicker/js/datetimepicker.min.js" type="text/javascript"></script> <script src="assets/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js" type="text/javascript"></script> <script src="assets/plugins/colorpicker/js/bootstrap-colorpicker.min.js" type="text/javascript"></script> <script src="assets/plugins/tagsinput/js/bootstrap-tagsinput.min.js" type="text/javascript"></script> <script src="assets/plugins/select2/select2.min.js" type="text/javascript"></script> <script src="assets/plugins/typeahead/typeahead.bundle.js" type="text/javascript"></script> <script src="assets/plugins/typeahead/handlebars.min.js" type="text/javascript"></script> <script src="assets/plugins/multi-select/js/jquery.multi-select.js" type="text/javascript"></script> <script src="assets/plugins/multi-select/js/jquery.quicksearch.js" type="text/javascript"></script> <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->




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
        <!-- modal end -->
    </body>
</html>