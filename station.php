<?php
	include("menu.php");
	require("conexion.php");
	setlocale(LC_TIME, 'es_MX.UTF-8');
	$deveui =@$_GET["deveui"];
	$date =@$_GET["date"];
	$sql = "SELECT * FROM mensaje WHERE deveui = '$deveui' and CAST(mtime as DATE) = '$date' ORDER BY mtime DESC;";
	$consulta = $conn->query($sql);
	setlocale(LC_TIME, "en_US");
?>
<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
		<script>
		    $(document).ready(function(){
		      var date_input=$('input[name="date"]'); //our date input has the name "date"
		      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		      var options={
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		      };
		      date_input.datepicker(options);
		    })
		</script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<?php 
						echo "<center><span style='font-size: 2.8em; font-weight: bold;'>Station: $deveui </span>";
					?>
					<form method="get" class="form-inline">
				        <div class="form-group"> <!-- Date input -->
					  <label class="control-label" for="date">Date</label>
					  <input class="form-control" id="date" name="date" placeholder="Click to choose a date" type="text" value="<?php echo $date; ?>"/>
				        </div>
				        <input type="hidden" name="deveui" value="<?php echo $deveui; ?>">
				        <div class="form-group"> <!-- Submit button -->
					  <button class="btn btn-primary " name="submit" type="submit">Submit</button>
				        </div>
				       </form><br><br>
				       <?php
						if($consulta->num_rows <= 0)
							echo "<center><span style='font-size: 1.8em; font-weight: bold;'>There are not any registered station</span></center>";
						else{
					?>
					<div class="table">
						<table class="table-bordered table-hover table-responsive">
							<thead  style="text-align: center;" class="bg-primary">
								<tr>
									<th class="col-md-3">Time</th>
									<th class="col-md-3">Frequency</th>
									<th class="col-md-3">Status</th>
								</tr>
							</thead>
							<tbody  style="text-align: center;">
							<?php
									while($resultado = $consulta->fetch_assoc()) {
										echo "<tr>";
										echo "<td>".strftime("%H:%M:%S",strtotime($resultado["mtime"]))."</td>";
										echo "<td>".$resultado["frequency"]."</td>";
										$celda = "<td>-</td>";
										switch($resultado["data"]){
											case 0:
												$celda = "<td class='alert alert-danger'><b>RED</b></td>";
												break;
											case 1:
												$celda = "<td class='alert alert-warning'><b>YELLOW</b></td>";
												break;
											case 2:
												$celda = "<td class='alert alert-info'><b>BLUE</b></td>";
												break;
											case 3:
												$celda = "<td class='alert alert-success'><b>GREEN</b></td>";
												break;
											default:
												$celda = "<td>-</td>";
										}
										echo $celda;
										echo "</tr>";
									}
							}
							?>
							</tbody>
						</table>
						<br><a href="stations.php"><button class="btn btn-primary">Back to stations</button></a>
						</center>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
