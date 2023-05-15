<?php
include("conectar.php");

function crearOferta($nombre, $descripcion, $evento_inicio, $evento_fin, $precio, $idEmpresa)
{
    $sqlCrearOferta = "INSERT INTO ofertas(nombre, descripcion,evento_inicio, evento_fin, precio, idEmpresa)
    VALUES ('$nombre','$descripcion','$evento_inicio','$evento_fin', '$precio','$idEmpresa')";


    $GLOBALS["bd"]->query($sqlCrearOferta);
}

function findOneByIDEmpresa($id)
{
    $sqlFindOne = "SELECT * FROM ofertas WHERE idEmpresa = '$id'";
    $result = $GLOBALS["bd"]->query($sqlFindOne);
    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    return $res;
}

function findOneByID($id)
{
    $sqlFindOne = "SELECT * FROM ofertas WHERE idOferta = '$id'";
    $result = $GLOBALS["bd"]->query($sqlFindOne);
    $res = $result->fetch(PDO::FETCH_ASSOC);

    return $res;
}

function findAllOfertas(){
    $sqlFindOne = "SELECT * FROM ofertas";
    $result = $GLOBALS["bd"]->query($sqlFindOne);
    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    return $res;
}

function updateEmpresa($nombre,$descripcion, $evento_inicio, $evento_fin,$idOferta) {
    $sqlUpdate = "UPDATE ofertas SET nombre='$nombre' , descripcion = '$descripcion', evento_inicio = '$evento_inicio', evento_fin = '$evento_fin' where idOferta='$idOferta'";
     
    $GLOBALS["bd"]->query($sqlUpdate);
}

function deleteProducto($idOferta) {
    $sqlDeleteProducto = "DELETE FROM ofertas where idOferta = '$idOferta'";

    $GLOBALS["bd"]->query($sqlDeleteProducto);
}
