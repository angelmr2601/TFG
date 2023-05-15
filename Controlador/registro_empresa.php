<?php
// Cargamos consultas del repositorio
include("../Modelo/empresa.php");

// Errores 
$errorContrasena = false;
$correoYaExiste = false;

// Comprobamos que hemos enviado el formulario mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$correo = $_POST['email'];
    $nif = $_POST['nif'];
	$contrasena = $_POST['pswd'];
	$contrasenaConf = $_POST['pswd_2'];
	$direccion = $_POST['direccion'];
	$username= $_POST['usuario'];

	// Comprobamos que las constraseñas sean iguales
	if ($contrasena == $contrasenaConf) {
		//Comprobamos que el correo del usuario no esta en la BD
		if (!findCorreoEmpresa($correo)) {
			// Cifrado de la contraseña con SHA256
			$contasenaCifrada = hash('sha256', $contrasena);
			crearEmpresa($nif,$username, $correo, $contasenaCifrada, $direccion);
			header("Location:/");
		} else {
			$correoYaExiste = true;
		}
	} else {
		$errorContrasena = true;
	}
}

?>