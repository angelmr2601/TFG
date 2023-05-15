<?php
// Cargamos consultas del repositorio
include("../Modelo/usuario.php");

// Errores 
$errorContrasena = false;
$correoYaExiste = false;

// Comprobamos que hemos enviado el formulario mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$correo = $_POST['email'];
	$contrasena = $_POST['pswd'];
	$contrasenaConf = $_POST['pswd_2'];
	$direccion = $_POST['direccion'];
	$username= $_POST['usuario'];
	$disponibilidad_inicio1 = $_POST['disponibilidad_inicio1'];
	$disponibilidad_fin1= $_POST['disponibilidad_fin1'];

	// Comprobamos que las constraseñas sean iguales
	if ($contrasena == $contrasenaConf) {
		//Comprobamos que el correo del usuario no esta en la BD
		if (!findCorreoUsuario($correo)) {
			// Cifrado de la contraseña con SHA256
			$contasenaCifrada = hash('sha256', $contrasena);
			crearUsuario($username, $correo, $contasenaCifrada, $direccion,$disponibilidad_inicio1,$disponibilidad_fin1);
			header("Location:../Vista/index_user.php");
		} else {
			$correoYaExiste = true;
		}
	} else {
		$errorContrasena = true;
	}
}

?>