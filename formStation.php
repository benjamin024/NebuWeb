<?php
	include("menu.php");
	require("conexion.php");
	$deveui =@$_POST["deveui"];
	$descripcion =@$_POST["description"];
	if(!empty($deveui) && !empty($descripcion)){
		$sql = "INSERT INTO estacion(deveui,descripcion) VALUES('$deveui','$descripcion');";
		if($conn->query($sql) === TRUE)
			header("location: stations.php");
		else
			echo "Error! Try again";
	}
?>
<html>
	<head></head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<center><span style='font-size: 2.8em; font-weight: bold;'>Register a new station</span><br>
					<form class="form" method="post" action="formStation.php">
						<div class="form-group">
						  <label class="control-label" for="deveui">Station ID:</label>
						  <input class="form-control" id="deveui" name="deveui" placeholder="DevEUI" required/>
						</div>
						<div class="form-group">
						  <label class="control-label" for="description">Description:</label>
						  <textarea class="form-control" id="description" name="description" placeholder="Station description"  rows="5" style="resize: none;" required></textarea>
						</div>
						<button class="btn btn-primary " name="submit" type="submit">Submit</button>
					</form></center>
				</div>
			</div>
		</div>
	</body>
</html>
