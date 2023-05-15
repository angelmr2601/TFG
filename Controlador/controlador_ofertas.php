<?php

include("../Modelo/oferta.php");

$ofertas = findOneByIDEmpresa($_SESSION['id']);

function findOneByIdOferta($id) {
    $sqlfindOneByIdOferta = "SELECT * FROM ofertas WHERE idOferta = '$id'";
    $result = $GLOBALS["bd"]->query($sqlfindOneByIdOferta);
    $res = $result->fetch(PDO::FETCH_ASSOC);

    return $res;
}
