<?php

session_start();
// Cargamos consultas del repositorio
include("../Modelo/usuario.php");

// Comprobamos que el usuario esta logueado para editarlo
if (isset($_SESSION["correo"])) {
    $correo = $_SESSION["correo"];
    $user = findOneByCorreoUser($correo);
} else {
    header("Location:/");
}

// Comprobamos que hemos enviado el formulario mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $direccion = $_POST['direccion'];
    $correo = $_SESSION["correo"];
    $username = $_POST["username"];
    $contrasena = $user["contraseña"];
    $disponibilidad_inicio1 = $_POST["disponibilidad_inicio1"];
    $disponibilidad_fin1 = $_POST["disponibilidad_fin1"];
    $disponibilidad_inicio2 = $_POST["disponibilidad_inicio2"];
    $disponibilidad_fin2= $_POST["disponibilidad_fin2"];
    $disponibilidad_inicio3 = $_POST["disponibilidad_inicio3"];
    $disponibilidad_fin3 = $_POST["disponibilidad_fin3"];

    $instagram = $_POST["instagram"];
    $yt = $_POST["yt"];
    $spotify = $_POST["spotify"];
    $tiktok = $_POST["tiktok"];

    if (isset($_POST['passwordNueva']) && $_POST['passwordNueva'] != "") {
        if ($user["contraseña"] == hash('sha256', $_POST['passwordActual'])) {
            if ($_POST['passwordNueva'] == $_POST['passwordNuevaComprobar']) {
                $contrasena = hash('sha256', $_POST["passwordNueva"]);
            } else {
                header("Location:../Vista/Error.html");
            }
        }

    }

    updateUsuario($correo, $username, $contrasena, $direccion, $disponibilidad_inicio1, $disponibilidad_fin1,$disponibilidad_inicio2, $disponibilidad_fin2,$disponibilidad_inicio3, $disponibilidad_fin3,$instagram,$yt,$spotify,$tiktok);
    header("Location:/");
}

?>