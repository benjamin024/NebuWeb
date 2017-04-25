<?php
	include("menu.php");
	require("conexion.php");

	$sql = "SELECT * FROM estacion;";

	$consulta = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<?php 
						if($consulta->num_rows <= 0)
							echo "<center><span style='font-size: 2.8em; font-weight: bold;'>There are not any registered station</span></center>";
						else{
					?>
					<div class="table">
						<center><span style='font-size: 2.8em; font-weight: bold;'>Registered Stations</span>
						<table class="table-bordered table-hover table-responsive">
							<thead  style="text-align: center;">
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
										echo "<td>-</td>";
										echo "<td><a href='statics.php?deveui=".$resultado["deveui"]."'><span class='glyphicon glyphicon-signal' aria-hidden='true'></span> View Statics </a></td>";
										echo "</tr>";
									}
							}
							?>
							</tbody>
						</table></center>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
	
