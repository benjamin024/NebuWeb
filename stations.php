<?php
	include("menu.php");
	require("conexion.php");

	$sql = "SELECT DISTINCT e.deveui, e.descripcion, m.data, m.mtime from estacion as e, mensaje as m where e.deveui = m.deveui and m.mtime IN (SELECT max(mtime) from mensaje WHERE deveui = m.deveui AND data IN ('00000000','00000001','00000002', '00000003'));";

	$consulta = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<br><br>
					<?php 
						if($consulta->num_rows <= 0)
							echo "<center><span style='font-size: 2.8em; font-weight: bold;'>There are not any registered station</span></center>";
						else{
					?>
					<div class="table">
						<center><span style='font-size: 2.8em; font-weight: bold;'>Registered Stations</span>
						<table class="table-bordered table-hover table-responsive">
							<thead  style="text-align: center;" class="bg-primary">
								<tr>
									<th class="col-md-4">ID</th>
									<th class="col-md-4">Description</th>
									<th class="col-md-2">Status</th>
									<th class="col-md-2">Statics</th>
								</tr>
							</thead>
							<tbody  style="text-align: center;">
							<?php
									while($resultado = $consulta->fetch_assoc()) {
										echo "<tr>";
										echo "<td><a href='station.php?deveui=".$resultado["deveui"]."&date=".gmdate("Y-m-d")."'>".$resultado["deveui"]."</td>";
										echo "<td>".$resultado["descripcion"]."</td>";
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
										echo "<td><a href='statics.php?deveui=".$resultado["deveui"]."'><span class='glyphicon glyphicon-signal' aria-hidden='true'></span> View Statics </a></td>";
										echo "</tr>";
									}
							}
							?>
							</tbody>
						</table>
						<br><br><a href="formStation.php"><button class="btn btn-primary">Add a new station</button></a>
						</center>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
	
