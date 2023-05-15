<?php

session_start();
// Cargamos consultas del repositorio
include("../Modelo/empresa.php");

// Comprobamos que el usuario esta logueado para editarlo
if (isset($_SESSION["correo"])) {
    $correo = $_SESSION["correo"];
    $user = findOneByCorreoEmpresa($correo);
} else {
    header("Location:/");
}

// Comprobamos que hemos enviado el formulario mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $direccion = $_POST['direccion'];
    $correo = $_SESSION["correo"];
    $username = $_POST["username"];
    $contrasena = $user["contraseña"];

    if (isset($_POST['passwordNueva']) && $_POST['passwordNueva'] != "") {
        if ($user["contraseña"] == hash('sha256', $_POST['passwordActual'])) {
            if ($_POST['passwordNueva'] == $_POST['passwordNuevaComprobar']) {
                $contrasena = hash('sha256', $_POST["passwordNueva"]);
            } else {
                header("Location:../Vista/Error.html");
            }
        }

    }

    updateEmpresa($correo, $username, $contrasena, $direccion);
    header("Location:/");
}

?>