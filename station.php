<?php
	include("menu.php");
	require("conexion.php");
	$deveui =@$_GET["deveui"];
	$date =@$_GET["date"];
	$sql = "SELECT * FROM mensaje WHERE deveui = '$deveui' and CAST(mtime as DATE) = '$date' ORDER BY mtime DESC;";
	$consulta = $conn->query($sql);
	setlocale(LC_TIME, "en_US");
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
							echo "<center><span style='font-size: 2.8em; font-weight: bold;'>Station: $deveui </span>";
							echo "<br><span style='font-size: 1.3em; font-weight: bold;'>Date: ".$date."</span>";
					?>
					<div class="table">
						<table class="table-bordered table-hover table-responsive">
							<thead  style="text-align: center;">
								<tr>
									<th class="col-md-4">Time</th>
									<th class="col-md-4">Frequency</th>
									<th class="col-md-4">Status</th>
								</tr>
							</thead>
							<tbody  style="text-align: center;">
							<?php
									while($resultado = $consulta->fetch_assoc()) {
										echo "<tr>";
										echo "<td>".strftime("%H:%M:%S",strtotime($resultado["mtime"]))."</td>";
										echo "<td>".$resultado["frequency"]."</td>";
										echo "<td>".$resultado["data"]."</td>";
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