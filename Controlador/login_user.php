<?php
include("../Modelo/usuario.php");

session_start();

$error = false;

if (isset($_SESSION["correo"])) {
    header("Location:/");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $correo = $_POST["correo"];
        $pass = hash('sha256', $_POST["pass"]);

        $resultConsultaEncontrarUser = findCorreoPassActivoUsuario($correo, $pass);

        // Comprobamos en el 1º IF que el usuario existe, en el 2º el rol que tiene
        if ($resultConsultaEncontrarUser == true) {
            $_SESSION['correo'] = $correo;
            $_SESSION['rol'] = "usuario";
            header("Location:../Vista/index_user.php");
        } else {
            header("Location:../Vista/login_user.php?error");
        }
    }
}
