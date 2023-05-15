<?php

include("../Modelo/conectar.php");

function findOneByIdUser($id) {
    $sqlfindOneByIdUser = "SELECT * FROM usuario WHERE idUser = '$id'";
    $result = $GLOBALS["bd"]->query($sqlfindOneByIdUser);
    $res = $result->fetch(PDO::FETCH_ASSOC);

    return $res;
}

?>