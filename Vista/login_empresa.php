<?php
include("../Controlador/login_empresa.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoundConnect</title>
	<link rel="stylesheet" type="text/css" href="../Vista/assets/css/login.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
			<form method="post" action="../Controlador/login_empresa.php">
					<label for="chk" aria-hidden="true">Inicia sesión</label>
					<input type="email" name="correo" placeholder="Correo electrónico" required="">
					<input type="password" name="pass" placeholder="Contraseña" required="">
					<button>Inicia sesión</button>
					<a href="login_user.php">¿Eres un usuario?</a>
				</form>
				
			</div>

			 <div class="login">
				<form method="post" action="../Controlador/registro_empresa.php">
					<label for="chk" aria-hidden="true">Registrate</label>
					<input type="text" name="nif" placeholder="NIF de la empresa" required="">
					<input type="text" name="usuario" placeholder="Nombre de usuario" required="">
					<input type="email" name="email" placeholder="Correo electrónico" required="">
					<input type="text" name="direccion" placeholder="Dirección" required="">
					<input type="password" name="pswd" placeholder="Contraseña" required="">
					<input type="password" name="pswd_2" placeholder="Repita la contraseña" required="">
					<button>Registrate</button>
				</form>
			</div>
	</div>
</body>
</html>
