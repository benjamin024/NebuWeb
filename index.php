<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NebuServer</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
  </head>
  <body>
    <div class="container">
    	<div class="row flex-parent">
    		<div class="col-md-4 col-md-offset-4 flex-child" >
    			<center><span style="font-size: 4.0em; font-weight: bold;">Inicia Sesión</span>
    			<form action="login.php" method="post">
			  <div class="form-group">
			    <label for="user">Nombre de Usuario:</label>
			    <input type="text" class="form-control" id="user" name="user" placeholder="Nombre de Usuario" required/>
			  </div>
			  <div class="form-group">
			    <label for="pass">Contraseña:</label>
			    <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required/>
			  </div>
			  <div style="text-align: right;">
			  	<a href="#">¿Olvidaste tu contraseña?</a><br><br>
			  </div> 
			  <button type="submit" class="btn btn-primary">Aceptar</button>
			</form></center>
    		</div>
    	</div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
