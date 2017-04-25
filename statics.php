<?php
	include("menu.php");
	$deveui =@$_GET["deveui"];
?>
<!DOCTYPE html>
<html>
	<head>
		  <script type="text/javascript" src="https://momentjs.com/downloads/moment.js"></script>
		  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
		  <script type="text/javascript" src="js/Chart.js"></script>
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
		  
	</head>
	<body>
		<style>
		    	.flex-parent{
			  display: -ms-flex;
			  display: -webkit-flex;
			  display: flex;
			}
			 
			.flex-child{
			  display: -ms-flex;
			  display: -webkit-flex;
			  display: flex;
			  justify-content: center;
			  flex-direction: column;
			}
		</style>
		<div class="container">
			<div class="row flex-parent">
				<div class="col-md-8 col-md-offset-2">
					<center><span style='font-size: 2.8em; font-weight: bold;'><?php echo "Station: $deveui"; ?> </span><br>
					<span style='font-size: 1.2em; font-weight: bold;'>Select a time interval:</span><br><br>
					<div class='col-md-6'>
						<div class="form-group">
						    <div class='input-group date' id='datetimepicker6'>
							<input type='text' class="form-control" value="2017-04-12 08:00"/>
							<span class="input-group-addon">
							    <span class="glyphicon glyphicon-calendar"></span>
							</span>
						    </div>
						</div>
					</div>
					    <div class='col-md-6'>
						<div class="form-group">
						    <div class='input-group date' id='datetimepicker7'>
							<input type='text' class="form-control"  value="2017-04-28 08:00"/>
							<span class="input-group-addon">
							    <span class="glyphicon glyphicon-calendar"></span>
							</span>
						    </div>
						</div>
					</div>
					<button class="btn btn-primary">Submit</button><br><br><br><br>
					<div class="col-md-6">
					<canvas id="myChart" width="50" height="50"></canvas>
					<script>
					var ctx = document.getElementById("myChart");
					var myDoughnutChart = new Chart(ctx, {
					    type: 'doughnut',
					    data: {
						    labels: [
							"Green",
							"Yellow",
							"Red",
							"Blue"
						    ],
						    datasets: [
							{
							    data: [65, 12,3, 20],
							    backgroundColor: [
								"#088A08",
								"#FACC2E",
								"#DF0101",
								"#0489B1"
							    ],
							    hoverBackgroundColor: [
								"#088A08",
								"#FACC2E",
								"#DF0101",
								"#0489B1"
							    ]
							}]
						},
					    options: {
						        animation:{
						          animateScale:true
						        }
						      }
					});
					</script>
					</div>
					<div class="col-md-6 col-md-offset flex-child" style="font-size: 1.2em; text-align: left;">
						<br><br><br><br>
						Total time in Green status: 65 minutes<br>
						Total time in Blue status: 20 minutes<br>
						Total time in Yellow status: 12 minutes<br>
						Total time in Red status: 3 minutes<br><br><br><br><br>
					</div>
					<a href="stations.php"><button class="btn btn-primary">Back to stations</button></a>
				</div>
				
			</div>
		</div>
		<script type="text/javascript">
		    $(function () {
			$('#datetimepicker6').datetimepicker({
			    format: 'YYYY-MM-DD HH:mm',
			    sideBySide: true
			});
			$('#datetimepicker7').datetimepicker({
			    useCurrent: false,
			    format: 'YYYY-MM-DD HH:mm',
			    sideBySide: true
			});
			$("#datetimepicker6").on("dp.change", function (e) {
			    $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
			});
			$("#datetimepicker7").on("dp.change", function (e) {
			    $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
			});
			$("#datetimepicker-input").val(output + " 00:01:00");
		    });
		</script>
	<body>
</html>
