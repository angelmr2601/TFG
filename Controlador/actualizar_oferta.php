<?php

session_start();
// Cargamos consultas del repositorio
include("../Modelo/oferta.php");

// Comprobamos que el usuario esta logueado para editarlo
if (isset($_SESSION["correo"])) {
    $correo = $_SESSION["correo"];
} else {
    header("Location:/");
}

// Comprobamos que hemos enviado el formulario mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST["descripcion"];
    $evento_inicio = $_POST["evento_inicio"];
    $evento_fin = $_POST["evento_fin"];
    $idOferta = $_POST["idOferta"];

    updateEmpresa($nombre,$descripcion, $evento_inicio, $evento_fin,$idOferta);

   
    header("Location:/Vista/listar_ofertas.php");
}
