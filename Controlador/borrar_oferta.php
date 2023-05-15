<?php
    // Cargamos consultas del repositorio
    include("../Modelo/oferta.php");
    
    session_start();

    if(isset($_GET["id"]) && isset($_SESSION["rol"])) {
        $idOferta = $_GET["id"];
        deleteProducto($idOferta);
        header("Location:../Vista/listar_ofertas.php");
    } else {
        header("Location:/index_empresa");
    }
?>