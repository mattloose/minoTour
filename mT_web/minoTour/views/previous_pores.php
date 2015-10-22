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
                    <h1 class="page-header">Previous Data Summary - run: <?php echo cleanname($_SESSION['focusrun']); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<ul class="nav nav-pills">
			  <li><a href="previous_summary.php">Read Summaries</a></li>
			  <li><a href="previous_histogram.php">Read Histograms</a></li>
			  <li><a href="previous_rates.php">Sequencing Rates</a></li>
			  <li class="active"><a href="previous_pores.php">Pore Activity</a></li>
  			  <li><a href="previous_quality.php">Read Quality</a></li>
  			   <?php if ($_SESSION['focusreference'] != "NOREFERENCE") {?>
  			  <li><a href="previous_coverage.php">Coverage Detail</a></li>
  			  <?php }; ?>
  			  <li><a href="previous_bases.php">Base Coverage</a></li>
  			  <!--<li class="active"><a href="previous_development.php">W.I.M.M (Dev)</a></li>-->
			</ul>
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title"><!-- Button trigger modal -->
<button class="btn btn-info" data-toggle="modal" data-target="#modal3">
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
        Active Channels Over Time<br>
		The number of channels actively generating sequence data over the course of the run in 1 minute intervals.<br><br>
		Reads Per Pore<br>
		The number of reads generated by each pore in total over the lifetime of the run.<br><br>
		Traces Per Pore<br>
		The number of traces generated by each pore in total over the lifetime of the run.<br><br>
		Reads Per Pore/Mux<br>
		The number of reads generated by each pore in each mux in total over the lifetime of the run.<br><br>
		Baes Per Pore/Mux<br>
		The number of bases generated by each pore in each mux in total over the lifetime of the run.<br><br>
		  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div></h3>
			  </div>
			  <div class="panel-body">
                  <?php if ($_SESSION['focusBASE'] > 0) {?>
					<div id="activechannels" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x" ></i> Calculating Active Channels Over Time</div>
                    <div id="occupancyrate" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x" ></i> Calculating Pore Occupancy Over Time</div>
					<div id="poreproduction" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Pore Read Productivity</div>
					<div id="baseproduction" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Pore Base Productivity</div>
					<div id="traceproduction" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Pore Trace Productivity</div>
					<?php if ($_SESSION['focus_minup'] >= 0.37) {?>
					<div id="readmuxproduction" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Pore Trace Productivity</div>
					<?php } ?>
					<?php if ($_SESSION['focus_minup'] >= 0.37) {?>
					<div id="basemuxproduction" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Pore Base Productivity</div>
                    <div id="passfailperporemux" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Pore Pass Fail Rates</div>
                    <div id="passfailcountperporemux" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Pore Pass Fail Rates</div>
					<?php } ?>
                <?php }else { echo "Currently pore data is oncly calculated from basecalled data. This will change in the future."; }?>
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
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

	<!-- Highcharts Addition -->
	<script src="http://code.highcharts.com/4.0.3/highcharts.js"></script>
	<script type="text/javascript" src="js/themes/grid-light.js"></script>
	<script src="http://code.highcharts.com/4.0.3/modules/heatmap.js"></script>
	<script src="http://code.highcharts.com/modules/data.js"></script>
	<script src="http://code.highcharts.com/modules/exporting.js"></script>
    <script src="http://highslide-software.github.io/export-csv/export-csv.js"></script>



			<script>
		$(document).ready(function() {
		    var options = {
		        chart: {
		            renderTo: 'activechannels',
					zoomType: 'x'
		            //type: 'line'
		        },
		        title: {
		          text: 'Active Channels Over Time'
		        },
				xAxis: {
					type: 'datetime',
			            dateTimeLabelFormats: { // don't display the dummy year
               				month: '%e. %b',
           				    year: '%b',
				            },
				            title: {
				                text: 'Time/Date'
				            }
				        },
						yAxis: {
						            title: {
						                text: 'Number of Active Channels'
						            },
						            min: 0
						        },
								credits: {
								    enabled: false
								  },
		        legend: {
		            title: {
                text: 'Read Type <span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>',
                style: {
                    fontStyle: 'italic'
                }
            },
			            layout: 'horizontal',
                                        align: 'center',
                                        verticalAlign: 'bottom',
			            borderWidth: 0
		        },
		        series: []
		    };

		    $.getJSON('jsonencode/active_channels_over_time.php?prev=1&callback=?', function(data) {
				//alert("success");
		        options.series = data; // <- just assign the data to the series property.



		        //options.series = JSON2;
				var chart = new Highcharts.Chart(options);
				});
		});

			//]]>

			</script>


            <script>
		$(document).ready(function() {
		    var options = {
		        chart: {
		            renderTo: 'occupancyrate',
					zoomType: 'x'
		            //type: 'line'
		        },
		        title: {
		          text: 'Occupancy Rate'
		        },
				xAxis: {
					type: 'datetime',
			            dateTimeLabelFormats: { // don't display the dummy year
               				month: '%e. %b',
           				    year: '%b',
				            },
				            title: {
				                text: 'Time/Date'
				            }
				        },
						yAxis: [{ // Primary yAxis
            labels: {
                format: '{value} %',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            min: 0,
            max: 100,
            title: {
                text: 'Occupancy %',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }
        }, { // Secondary yAxis
            title: {
                text: 'Channels',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: '{value}',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },

            min: 0,
            opposite: true
        }],
								credits: {
								    enabled: false
								  },
		        legend: {
		            title: {
                text: 'Read Type <span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>',
                style: {
                    fontStyle: 'italic'
                }
            },
			            layout: 'horizontal',
                                        align: 'center',
                                        verticalAlign: 'bottom',
			            borderWidth: 0
		        },
		        series: []
		    };

		    $.getJSON('jsonencode/occupancyrate.php?prev=1&callback=?', function(data) {
				//alert("success");
		        options.series = data; // <- just assign the data to the series property.



		        //options.series = JSON2;
				var chart = new Highcharts.Chart(options);
				});
		});

			//]]>

			</script>


			<script>
			$(document).ready(function() {
			    var options = {
			        chart: {
						renderTo: 'poreproduction',
			            type: 'heatmap',
			            marginTop: 40,
			            marginBottom: 40
			        },


			        title: {
			            text: 'Reads Per Pore'
			        },

			        xAxis: {
			            title: null,
						labels: {
						    enabled: false
						  },

			        },

			        yAxis: {
			            title: null,
						labels: {
						    enabled: false
						  },

			        },
					credits: {
					    enabled: false
					  },
			        colorAxis: {
			            min: 0,
			            minColor: '#FFFFFF',
			            maxColor: Highcharts.getOptions().colors[0]
			        },

			        legend: {
			            align: 'right',
			            layout: 'vertical',
			            margin: 0,
			            verticalAlign: 'top',
			            y: 25,
			            symbolHeight: 320
			        },

			        series: []

			    };
			    $.getJSON('jsonencode/readsperpore.php?prev=1&callback=?', function(data) {
					//alert("success");
			        options.series = data; // <- just assign the data to the series property.



			        //options.series = JSON2;
					var chart = new Highcharts.Chart(options);
				});
			});
			</script>
			<script>
			$(document).ready(function() {
			    var options = {
			        chart: {
						renderTo: 'baseproduction',
			            type: 'heatmap',
			            marginTop: 40,
			            marginBottom: 40
			        },


			        title: {
			            text: 'Bases (Kb) Per Pore'
			        },

			        xAxis: {
			            title: null,
						labels: {
						    enabled: false
						  },

			        },

			        yAxis: {
			            title: null,
						labels: {
						    enabled: false
						  },

			        },
					credits: {
					    enabled: false
					  },
			        colorAxis: {
			            min: 0,
			            minColor: '#FFFFFF',
			            maxColor: Highcharts.getOptions().colors[0]
			        },

			        legend: {
			            align: 'right',
			            layout: 'vertical',
			            margin: 0,
			            verticalAlign: 'top',
			            y: 25,
			            symbolHeight: 320
			        },

			        series: []

			    };
			    $.getJSON('jsonencode/basesperpore.php?prev=1&callback=?', function(data) {
					//alert("success");
			        options.series = data; // <- just assign the data to the series property.



			        //options.series = JSON2;
					var chart = new Highcharts.Chart(options);
				});
			});
			</script>
			<script>
			$(document).ready(function() {
			    var options = {
			        chart: {
						renderTo: 'traceproduction',
			            type: 'heatmap',
			            marginTop: 40,
			            marginBottom: 40
			        },


			        title: {
			            text: 'Traces Per Pore'
			        },

			        xAxis: {
			            title: null,
						labels: {
						    enabled: false
						  },

			        },

			        yAxis: {
			            title: null,
						labels: {
						    enabled: false
						  },

			        },
					credits: {
					    enabled: false
					  },
			        colorAxis: {
			            min: 0,
			            minColor: '#FFFFFF',
			            maxColor: Highcharts.getOptions().colors[0]
			        },

			        legend: {
			            align: 'right',
			            layout: 'vertical',
			            margin: 0,
			            verticalAlign: 'top',
			            y: 25,
			            symbolHeight: 320
			        },

			        series: []

			    };
			    $.getJSON('jsonencode/tracesperpore.php?prev=1&callback=?', function(data) {
					//alert("success");
			        options.series = data; // <- just assign the data to the series property.



			        //options.series = JSON2;
					var chart = new Highcharts.Chart(options);
				});
			});
			</script>

			<script>
			$(document).ready(function() {
			    var options = {
			        chart: {
						renderTo: 'readmuxproduction',
			            type: 'heatmap',
			            marginTop: 30,
			            marginBottom: 30
			        },


			        title: {
			            text: 'Reads Per Pore/Mux'
			        },

			        xAxis: {
			        	categories: [],
			            title: 'Columns',
						labels: {
						    enabled: false
						  },

			        },

			        yAxis: {
			        	categories: [],
			            title: 'Rows',
						labels: {
						    enabled: false
						  },

			        },
					credits: {
					    enabled: false
					  },
			        colorAxis: {
			            min: 0,
			            minColor: '#FFFFFF',
			            maxColor: Highcharts.getOptions().colors[0]
			        },

			        legend: {
			            align: 'right',
			            layout: 'vertical',
			            margin: 0,
			            verticalAlign: 'top',
			            y: 25,
			            symbolHeight: 320
			        },

			        series: []

			    };
			    $.getJSON('jsonencode/readsperporemux.php?prev=1&callback=?', function(data) {
					//alert("success");
			        options.series = data; // <- just assign the data to the series property.



			        //options.series = JSON2;
					var chart = new Highcharts.Chart(options);
				});
			});
			</script>

						<script>
			$(document).ready(function() {
			    var options = {
			        chart: {
						renderTo: 'basemuxproduction',
			            type: 'heatmap',
			            marginTop: 30,
			            marginBottom: 30
			        },


			        title: {
			            text: 'Bases Per Pore/Mux'
			        },

			        xAxis: {
			        	categories: [],
			            title: 'Columns',
						labels: {
						    enabled: false
						  },

			        },

			        yAxis: {
			        	categories: [],
			            title: 'Rows',
						labels: {
						    enabled: false
						  },

			        },
					credits: {
					    enabled: false
					  },
			        colorAxis: {
			            min: 0,
			            minColor: '#FFFFFF',
			            maxColor: Highcharts.getOptions().colors[0]
			        },

			        legend: {
			            align: 'right',
			            layout: 'vertical',
			            margin: 0,
			            verticalAlign: 'top',
			            y: 25,
			            symbolHeight: 320
			        },

			        series: []

			    };
			    $.getJSON('jsonencode/basesperporemux.php?prev=1&callback=?', function(data) {
					//alert("success");
			        options.series = data; // <- just assign the data to the series property.



			        //options.series = JSON2;
					var chart = new Highcharts.Chart(options);
				});
			});
			</script>



            <script>
$(document).ready(function() {
    var options = {
        chart: {
            renderTo: 'passfailperporemux',
            type: 'heatmap',
            marginTop: 30,
            marginBottom: 30
        },


        title: {
            text: 'Percentage pass reads per pore'
        },

        xAxis: {
            categories: [],
            title: 'Columns',
            labels: {
                enabled: false
              },

        },

        yAxis: {
            categories: [],
            title: 'Rows',
            labels: {
                enabled: false
              },

        },
        credits: {
            enabled: false
          },
        colorAxis: {
            min: 0,
            minColor: '#FFFFFF',
            maxColor: Highcharts.getOptions().colors[0]
        },

        legend: {
            align: 'right',
            layout: 'vertical',
            margin: 0,
            verticalAlign: 'top',
            y: 25,
            symbolHeight: 320
        },

        series: []

    };
    $.getJSON('jsonencode/passfailperporemux.php?prev=1&callback=?', function(data) {
        //alert("success");
        options.series = data; // <- just assign the data to the series property.



        //options.series = JSON2;
        var chart = new Highcharts.Chart(options);
    });
});
</script>
<script>
    $(document).ready(function() {
        var options = {
            chart: {
                renderTo: 'passfailcountperporemux',
                type: 'scatter',
                zoomType: 'xy'
            },
            title: {
            text: 'Percentage Pass Reads against Number of Reads Generated'
        },
        xAxis: {
            title: {
                enabled: true,
                text: 'Read Counts',
            },
            min : 0,
            startOnTick: true,
            endOnTick: true,
            showLastLabel: true
        },
        yAxis: {
            max : 100,
            min : 0,
            title: {
                text: '% Pass Reads',
            }
        },
        credits: {
            enabled: false
          },
        legend: {
            enabled: false,
        },
        plotOptions: {
            scatter: {
                marker: {
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true,
                            lineColor: 'rgb(100,100,100)'
                        }
                    }
                },
                states: {
                    hover: {
                        marker: {
                            enabled: false
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<b>Reads and Pass</b><br>',
                    pointFormat: '{point.x} read, {point.y} % pass'
                }
            }
        },
            series: []

        };
        $.getJSON('jsonencode/passfailcountperporemux.php?prev=1&callback=?', function(data) {
//alert("success");
            options.series = data; // <- just assign the data to the series property.
//options.series = JSON2;
            var chart = new Highcharts.Chart(options);
        });
    });
</script>


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
