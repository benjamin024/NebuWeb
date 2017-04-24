<?php
	$servername = "sql9.freesqldatabase.com";
	$username = "sql9170572";
	$password = "JJZhLPtbKw";
	$dbname = "sql9170572";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Falló la Conexión: " . $conn->connect_error);
	}
?>
