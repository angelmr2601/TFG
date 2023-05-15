<?php
session_start();
include("../Modelo/empresa.php");
// Comprobamos que el usuario esta logueado para editarlo
if (isset($_SESSION["correo"])) {
    $correo = $_SESSION["correo"];
    $empresa = findOneByCorreoEmpresa($correo);

    $correo = $empresa['correo'];
    $direccion = $empresa['direccion'];
    $username = $empresa['nombre'];
} else {
    header("Location:../Vista/Error.html");
}

?>