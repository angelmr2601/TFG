<?php
include("../Controlador/login_user.php");
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SoundConnect</title>
	<link rel="stylesheet" type="text/css" href="../Vista/assets/css/login.css">
	<script src="../Vista/assets/js/validacion.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>

<body>
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">

		<div class="signup">
			<!-- <form method="post" action="../Controlador/login_user.php"> -->
				<label for="chk" aria-hidden="true">Inicia sesión</label>
				<input type="email" name="correo" placeholder="Correo electrónico" required="">
				<input type="password" name="pass" placeholder="Contraseña" required="">
				<button>Inicia sesión</button>
				<a href="login_empresa.php">¿Eres una empresa?</a>
				<?php
					if(isset($_GET["error"])){
						echo "<p class=error>Correo o contraseña incorrecta</p>";
					}
				?>
			</form>

		</div>

		<div class="login">
			<form id="form_registro" method="post" action="../Controlador/registro_user.php">
				<label for="chk" aria-hidden="true">Registrate</label>
				<input type="text" id="usuario" name="usuario" placeholder="Nombre de usuario" >
				<p id="avisoNombre" class="invisible">Nombre incorrecto</p>
				<input type="email" id="email" name="email" placeholder="Correo electrónico">
				<p id="avisoCorreo" class="invisible">Correo incorrecto</p>
				<input type="text" name="direccion" placeholder="Dirección">
				<p for="disponibilidad_inicio1">Indica una fecha de disponibilidad</p>
				<input type="date" name="disponibilidad_inicio1">
				<input type="date" name="disponibilidad_fin1">
				<p id="avisoFecha" class="invisible">Fecha Incorrecta</p>
				<input type="password" id="pswd" name="pswd" placeholder="Contraseña">
				<p id="avisoPass" class="invisible">Contraseña Incorrecta</p>
				<input type="password" name="pswd_2" placeholder="Repita la contraseña">
				<input type="submit" value="Registrate">
			</form>
		</div>
	</div>
</body>

</html>