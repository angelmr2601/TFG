<?php
include("../Modelo/usuario.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$usuarios = findAllUsuario();

$empresas = findAllEmpresa();

if($_SESSION['rol'] == "usuario"){
   $usuario = findOneByCorreoUser($_SESSION["correo"]); 
}



?>