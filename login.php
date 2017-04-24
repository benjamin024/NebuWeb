<?php
	session_start();
	require('conexion.php');
	$user=@$_POST['user'];
	$pass=@$_POST['pass'];
	
	$sql = "SELECT * FROM usuario WHERE User='$user' and Pass='$pass';";
	

	$consultaUser = $conn->query($sql);
	if($consultaUser->num_rows > 0){ //Usuario Correcto
		while($resultado = $consultaUser->fetch_assoc()) {
			$_SESSION['usuario'] = $resultado["user"];
			$_SESSION['nombre'] = $resultado["nombre"];
			$_SESSION['tipo'] = $resultado["tipo"];
		}
		//echo $_SESSION['nombre']."<br>".$_SESSION['usuario']."<br>".$_SESSION['tipo'];
		header('Location: indexUser.php');
			
	}else{
		echo "<div class=container><div class=row><div class='col-md-8 col-md-offset-2'>";
		echo "<center><span style='font-size: 3.0em; font-weight: bold;'>Usuario y/o Contraseña Incorrectos</span><br>";
		echo "<span style='font-size: 1.5em; font-weight: bold;'>Revisa tu usuario y contraseña e inténtalo nuevamente <br> ¿Aún no tienes cuenta? <a href='formUsuario.php?tipo=1'>Regístrate</a></span></center>";
		echo "</div></div></div>";	
	}
	
	
?>
