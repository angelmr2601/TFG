<?php

session_start();
// Cargamos consultas del repositorio
include("../Modelo/usuario.php");

// Comprobamos que el usuario esta logueado para editarlo
if (isset($_SESSION["correo"])) {
    $correo = $_SESSION["correo"];
    $user = findOneByCorreoUser($correo);
} else {
    header("Location:../Vista/index_user.php");
}

// Comprobamos que hemos enviado el formulario mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $direccion = $_POST['direccion'];
    $idUser = $_POST["idUser"];
    $username = $_POST["username"];
    $contrasena = $user["contraseña"];

    $sobre_mi = $_POST["sobre_mi"];


    $disponibilidad_inicio1 = $_POST["disponibilidad_inicio1"] ?? NULL;
    $disponibilidad_inicio2 = $_POST['disponibilidad_inicio2'] ?? NULL;
    $disponibilidad_inicio3 = $_POST['disponibilidad_inicio3'] ?? NULL;
    $disponibilidad_fin1 = $_POST["disponibilidad_fin1"] ?? NULL;
    $disponibilidad_fin2 = $_POST['disponibilidad_fin2'] ?? NULL;
    $disponibilidad_fin3 = $_POST['disponibilidad_fin3'] ?? NULL;

    $instagram = $_POST["instagram"]?? NULL;
    $yt = $_POST["yt"]?? NULL;
    $spotify = $_POST["spotify"]?? NULL;
    $tiktok = $_POST["tiktok"] ?? NULL;



    if (isset($_POST['passwordNueva']) && $_POST['passwordNueva'] != "") {
        if ($user["contraseña"] == hash('sha256', $_POST['passwordActual'])) {
            if ($_POST['passwordNueva'] == $_POST['passwordNuevaComprobar']) {
                $contrasena = hash('sha256', $_POST["passwordNueva"]);
            } else {
                header("Location:../Vista/Error.html");
            }
        }
    }

    updateUsuario(
        $idUser,
        $username,
        $contrasena,
        $direccion,
        $sobre_mi,
        $disponibilidad_inicio1,
        $disponibilidad_fin1,
        $disponibilidad_inicio2,
        $disponibilidad_fin2,
        $disponibilidad_inicio3,
        $disponibilidad_fin2,
        $instagram,
        $yt,
        $spotify,
        $tiktok
    );
    header("Location:../Vista/index_user.php");
}
