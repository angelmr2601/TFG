<?php
// Cargamos consultas del repositorio
include("../Modelo/oferta.php");

// Comprobamos que hemos enviado el formulario mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$idEmpresa = $_POST['idEmpresa'];
    $nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$fecha_inicio = $_POST['fecha_inicio'];
	$fecha_fin = $_POST['fecha_fin'];
	$precio= $_POST['precio'];
    crearOferta($nombre, $descripcion,$fecha_inicio, $fecha_fin, $precio, $idEmpresa);
    header("Location:../Vista/index_empresa.php");
}

?>
