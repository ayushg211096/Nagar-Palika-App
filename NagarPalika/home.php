
<!DOCTYPE html>
<html class=" ">
    <head>
       <?php
	   $pagetitled="Dashboard";
	   require("corehead.php");
	   ?>
	   
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <link href="assets/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
		<link href="assets/plugins/jquery-ui/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" media="screen"/> 
	<script src="assets/cavasjs/canvasjs.min.js"></script>
	<script type="text/javascript">

window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer", {
		theme: "theme2",//theme1
		title:{
			text: "Agent Wise Clients "              
		},
		animationEnabled: true,
		data: [              
		{
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "column",
			dataPoints: [
			<?php
				$sqlp="SELECT agent.Name as Agent ,count(*) as TotalReg FROM `accounts` JOIN agent on accounts.dealer = agent.id GROUP BY  agent;";	
				$res2=mysqli_query($con,$sqlp);
				$tmc=0;
				if (mysqli_num_rows($res2) > 0) {
				while($row2=mysqli_fetch_array($res2))
					{
						$cdate=$row2['Agent'];
						$cTotalCalls=$row2['TotalReg'];
						$tmc=$tmc+$cTotalCalls;
						?>
				{ label: "<?php echo $cdate; ?>",  y: <?php echo $cTotalCalls; ?>  },
				<?php
					}
				}
				else
				{
					?>
					{ label: "No Entry",  y: 0  },
						<?php
				}
			?>
			]
		}
		]
	});
	chart.render();
	
	var chartag = new CanvasJS.Chart("chartAG", {
		theme: "theme1",
		animationEnabled: true,
		data: [              
		{
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "pie",
			dataPoints: [
			<?php
				$sqlp="SELECT acctype.Name as AccTypeN,count(*) as TotalReg FROM `accounts` JOIN acctype on accounts.AccType = acctype.id GROUP BY `AccType` ;";	
				$res2=mysqli_query($con,$sqlp);
				$tmc=0;
				if (mysqli_num_rows($res2) > 0) {
				while($row2=mysqli_fetch_array($res2))
					{
						$cdate=$row2['AccTypeN'];
						$cTotalCalls=$row2['TotalReg'];
						$tmc=$tmc+$cTotalCalls;
						?>
				{ label: "<?php echo $cdate; ?>",  y: <?php echo $cTotalCalls; ?>  },
				<?php
					}
				}
				else
				{
					?>
					{ label: "No Entry",  y: 0  },
						<?php
				}
			?>
			]
		}
		],title:{
			text: "Clients By Account Types [Total : <?php echo $tmc; ?>]"              
		}
	});
	chartag.render();
}
</script>
<!-- ------------------------------------------- -->
<script type="text/javascript">

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
                                <h1 class="title">Dashboard</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="dashboard.php"><i class="fa fa-home"></i>Home</a>
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
                                <h2 class="title pull-left">Quick View</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                </div>
                            </header>
                            <div class="content-body">    
							<div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                        <!-- ********************************************** -->
									<div class="col-md-8 col-sm-8 col-xs-12">
                                        <div id="chartContainer" style="height: 300px; width: 100%;border:solid green 1px;"></div>
                                    </div>
									
									<div class="col-md-4 col-sm-4 col-xs-12">
									<div id="chartAG" style="height: 300px; width: 100%;border:solid green 1px;"></div>
                                    </div>
                                </div>
                            </div>  
							<div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                        <!-- ********************************************** -->
										
                                        <!-- ********************************************** -->
                                </div>
                            </div>
                            </div>
                </section>
            </section>
            <!-- END CONTENT -->
        <!-- END CONTAINER -->
        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->
<?php include("coreend.php"); ?>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<script src="assets/plugins/chartjs-chart/Chart.min.js" type="text/javascript"></script><script src="assets/js/chart-chartjs.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
 <script src="assets/plugins/count-to/countto.js" type="text/javascript"></script> 




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



