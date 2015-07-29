<?php
// load the functions
require_once("includes/functions.php");

?>
<!DOCTYPE html>
<html>

<?php include "includes/head.php";?>
<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">

			<?php include 'navbar-header.php' ?>
            <!-- /.navbar-top-links -->
			<?php include 'navbar-top-links.php'; ?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">

						<?php include 'includes/run_check.php';?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Current Data Summary - run: <?php echo cleanname($_SESSION['active_run_name']); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>


            <div class="row">



                <div class="col-lg-12">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal0"><i class="fa fa-info-circle"></i> Processing Activity</button>
					<div class="modal fade" id="modal0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title" id="myModalLabel">Processing Activity</h4>
								</div>
								<div class="modal-body">
									This panel shows you how reads have been processed and uploaded by the minUp scripts and the background alignment data processing.
								</div>
								 <div class="modal-footer">
			        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
						  </div>
						  <div id="processingcoverage">
						  <div class="panel-body">
						  <div class="row">
						  <div class="col-md-12" id="processing" style="height:300px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Processing Rates</div>
						  </div>
						   </div>
						</div>

					</div>


						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title"><input type="checkbox" name="colorCheckbox" id="readsummarycheck" value="RC" checked><!-- Button trigger modal -->
			<button class="btn btn-info  btn-sm" data-toggle="modal" data-target="#modal1">
			 <i class="fa fa-info-circle"></i> Reads And Coverage Summary
			</button>

			<!-- Modal -->
			<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close  btn-sm" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="myModalLabel">Reads And Coverage Summary</h4>
			      </div>
			      <div class="modal-body">
			        This panel provides information on the number of reads of each type generated by the metrichor analysis. The avergae read lengths and the maximum read length for each are shown.<br><br>
					Where a reference sequence is available for mapping, the proportion of the reference covered by reads is shown as "Percentage of Reference with Read".<br><br>
					The average depth of sequencing over these positions is shown as "Average Depth Of Sequenced Positions".<br>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default  btn-sm" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
						  </div>
						  <div id="readsncoverage">
						  <div class="panel-body">
									<div class="row">
									<div class="col-md-3" id="readnum" style="height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Read Numbers</div>
									<div class="col-md-3" id="yield" style="height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Yield</div>
									<div class="col-md-3" id="avglen" style="height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Read Average Length</div>
									<div class="col-md-3" id="maxlen" style="height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Read Max Length</div>


								</div>
                                <div id="lengthtimewindow" style="height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Read Lengths Over Time.</div>
								<div class="row">
								<?php if ($_SESSION['activereference'] != "NOREFERENCE") {?>
									<?php foreach ($_SESSION['activerefnames'] as $key => $value) {
										//echo $key . " " . $value . "<br>";?>
										<div class="col-md-6" id="percentcoverage<?php echo $key;?>" style="height:200px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Reference Coverage for <?php echo $value;?></div>
										<div class="col-md-6" id="depthcoverage<?php echo $key;?>" style="height:200px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Reference Depth for <?php echo $value;?></div>
                                        <?php
									}
									?>
                                    <div class="col-md-12" id="mappabletime" style="height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> 2D Reads Mapping Over Time.</div>
								<!---<div class="col-md-6" id="percentcoverage" style="width:50%; height:200px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Reference Coverage</div>--->
								<!---<div class="col-md-6" id="depthcoverage" style="width:50%; height:200px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Reference Depth</div>--->


							<?php }else { ?>
															<div><p class="text-center"><small>This dataset has not been aligned to a reference sequence.</small></p></div>
							<?php }; ?>
							</div>


						  </div>
						</div>

					</div>
					<?php if ($_SESSION['currentbarcode'] >= 1) {?>
<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title"><input type="checkbox" name="colorCheckbox" id="barcodingcheck" value="BC" checked><!-- Button trigger modal -->
			<button class="btn btn-info  btn-sm" data-toggle="modal" data-target="#modalbarcode">
			 <i class="fa fa-info-circle"></i> Barcoding Summary
			</button>

			<!-- Modal -->
			<div class="modal fade" id="modalbarcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close  btn-sm" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="myModalLabel">Barcoding Summary</h4>
			      </div>
			      <div class="modal-body">
			        This panel provides information on the number of reads assigned to each barcode using the Oxford Nanopore barcoding protocol.<br><br>
			        The standard ONT barcoding analysis only searches for barcodes in PASS reads - i.e those reads generating full 2D sequence. Reads which cannot be classified are moved to the fail bin. We therefore show as unclassified (UC) those reads which generated 2D sequence but could not be barcoded by the ONT pipeline in the charts below.<br><br>
					Note that further barcoding analysis options are availble under the specific barcoding tab in the left hand menu.<br>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default  btn-sm" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
						  </div>
						  <div id="barcoding">
						  <div class="panel-body">
									<div class="row">
									<div class="col-md-5" id="barcod" style="height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Barcoding</div>
									<div class="col-md-7" id="barcodcov" style="height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Barcode Coverage</div>


								</div>

						  </div>
						</div>

					</div>
					<?php }; ?>


						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title"><input type="checkbox" name="colorCheckbox" id="sequencingratecheck" value="SR" checked><!-- Button trigger modal -->
			<button class="btn btn-info  btn-sm" data-toggle="modal" data-target="#modal2">
			 <i class="fa fa-info-circle"></i> Sequencing Rate Information</h4>
			</button>

			<!-- Modal -->
			<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="myModalLabel"> Sequencing Rate Information
			      </div>
			      <div class="modal-body">
			        Rate of Basecalling<br>
					This plot show the number of reads generated in one minute intervals over the course of the sequencing run.<br><br>
								      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div></h3>
						  </div>
						  <div>
							<div class="row">
								<div class="col-md-12" id="cumulativeyield" style="height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Cumulative Yield.</div>
                                <div class="col-md-12" id="sequencingrate" style="height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Sequencing Rates.</div>
								<div class="col-md-12" id="ratio2dtemplate" style="height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Ratio 2D to Template.</div>
								<div class="col-md-12" id="ratiopassfail" style="height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Pass Fail Reads.</div>
							</div>
							</div>
						  <div id="sequencerate">
						  <div class="panel-body">
								<div id="readrate" style="height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Read Rate</div>

						  </div>
						</div>
					</div>


						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title"><input type="checkbox" name="colorCheckbox" id="poreactivitycheck" value="PI" checked><!-- Button trigger modal -->
			<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal3">
			 <i class="fa fa-info-circle"></i> Pore Activity</h4>
			</button>

			<!-- Modal -->
			<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="myModalLabel"> Pore Activity
			      </div>
			      <div class="modal-body">
					Reads Per Pore<br>
					The number of reads generated by each pore in total over the lifetime of the run.<br><br>
					  </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div></h3>
						  </div>
						  <div id="poreinfo">
						  <div class="panel-body">
								<div id="poreproduction" style="height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Pore Productivity</div>
								<?php if ($_SESSION['active_minup'] >= 0.37) {?>
					<div id="readmuxproduction" style="height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Mux Productivity</div>
					<?php } ?>
						  </div>
						</div>
					</div>

						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title"><input type="checkbox" name="colorCheckbox" id="qualityinfocheck" value="QI" checked> <!-- Button trigger modal -->
			<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal4">
			 <i class="fa fa-info-circle"></i> Quality Information</h4>
			</button>

			<!-- Modal -->
			<div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="myModalLabel"> Quality Information
			      </div>
			      <div class="modal-body">
			        Read Number Over Length<br>
					This plot shows the numbers of reads at each length which align.<br><br>
					  </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div></h3>
						  </div>
						  <div id="qualityinfo">
						  <div class="panel-body">
						  <?php if ($_SESSION['activereference'] != "NOREFERENCE") {?>
				  			<div id="numberoverlength"  style="height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Number of Aligned Reads By Length</div>
				  			<?php }else { ?>
															<div><p class="text-center"><small>This dataset has not been aligned to a reference sequence.</small></p></div>
							<?php }; ?>


								  </div>
						</div>
					</div>

						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title"><input type="checkbox" name="colorCheckbox" value="RS" checked><!-- Button trigger modal -->
			<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal6">
			 <i class="fa fa-info-circle"></i> Run Summary</h4>
			</button>

			<!-- Modal -->
			<div class="modal fade" id="modal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="myModalLabel"> Run Summary
			      </div>
			      <div class="modal-body">
			      <div class="row">
						  <div class="col-md-12">
			Key details on the run.<br><br>
			</div></div>
					  </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div></h3>
						  </div>
						  <div id="runinfo">
						  <div class="panel-body" id="runsummary">
				  			Content
								  </div>


						</div>

			</div>

			                </div>

			                <!-- /.col-lg-12 -->
			            </div>
			        </div>

			        <!-- /#page-wrapper -->

			    </div>
			    <!-- /#wrapper -->


			    <!-- Core Scripts - Include with every page -->
			    <script src="js/jquery-1.10.2.js"></script>
			    <script src="js/bootstrap.min.js"></script>
			    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

			    <!-- Page-Level Plugin Scripts - Dashboard -->
			    <script type="text/javascript" src="js/pnotify.custom.min.js"></script>
			    <script type="text/javascript">
				PNotify.prototype.options.styling = "fontawesome";
				</script>
			    <script type="text/javascript">
				PNotify.prototype.options.styling = "fontawesome";
				</script>
			    <!--<script src="js/plugins/morris/raphael-2.1.0.min.js"></script>-->
			    <!--<script src="js/plugins/morris/morris.js"></script>-->
				<script type="text/javascript">
				    $(document).ready(function(){
				        $('input[type="checkbox"]').click(function(){
				            if($(this).attr("value")=="RC"){
				                $("#readsncoverage").toggle();
				            }
				            if($(this).attr("value")=="RH"){
				                $("#readhistograms").toggle();
				            }
				            if($(this).attr("value")=="SR"){
				                $("#sequencerate").toggle();
				            }
				            if($(this).attr("value")=="PI"){
				                $("#poreinfo").toggle();
				            }
				            if($(this).attr("value")=="QI"){
				                $("#qualityinfo").toggle();
				            }
				            if($(this).attr("value")=="RS"){
				                $("#runinfo").toggle();
				            }
				             if($(this).attr("value")=="BC"){
				                $("#barcoding").toggle();
				            }
				        });
				    });
				</script>
				<script>
				$(document).ready(function(){
					$('#runsummary').load('includes/runsummary.php');
					setInterval(function(){
    			 	$('#runsummary').load('includes/runsummary.php');
    				}, <?php echo $_SESSION['pagerefresh'] ;?>);
				});
				</script>

				<!-- Highcharts Addition -->
				<script src="js/highcharts.js"></script>
				<script type="text/javascript" src="js/themes/grid-light.js"></script>
				<script src="http://code.highcharts.com/4.0.3/modules/heatmap.js"></script>
				<script src="http://code.highcharts.com/modules/exporting.js"></script>


				<?php if (isset($_SESSION['first_visit'])) {}else{?>
				<script type="text/javascript">
					$(function(){
						new PNotify({
  						title: 'Auto Updates',
    					text: 'This page autoupdates - you do not need to manually refresh. It contains a subset of data available.',
    					icon: 'fa fa-info-circle',
					    type: 'info'
					});
				});
				</script>
				<?php }; $_SESSION['first_visit']=1;?>

				<?php include 'includes/livecharts.php'; ?>

			    <!-- SB Admin Scripts - Include with every page -->
			    <script src="js/sb-admin.js"></script>

			    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
			    <script src="js/demo/dashboard-demo.js"></script>

     <script>
        $( "#infodiv" ).load( "alertcheck.php" ).fadeIn("slow");
        var auto_refresh = setInterval(function ()
            {
            $( "#infodiv" ).load( "alertcheck.php" ).fadeIn("slow");
            //eval(document.getElementById("infodiv").innerHTML);
            }, 10000); // refresh every 5000 milliseconds
    </script>



			<?php include "includes/reporting.php";?>
</body>

			</html>
