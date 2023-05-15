<?php
include("conectar.php");

// La función se utiliza para insertar una nueva empresa en la tabla, utilizando los valores proporcionados como parámetros.

function crearEmpresa($nif, $username, $correo, $contrasena, $direccion) {
    $sqlCrear = "INSERT INTO empresa(nif, nombre,correo, contraseña, direccion,activo)
    VALUES ('$nif','$username','$correo','$contrasena', '$direccion','1')";

     
    $GLOBALS["bd"]->query($sqlCrear);
}

// La función busca en la tabla si existe una empresa con el correo electrónico proporcionado, devolviendo un valor booleano (true o false) que indica si se encontró o no.

function findCorreoEmpresa($correo) {
    $sqlFindCorreo = "SELECT * FROM empresa where correo = '$correo'";
    $result = $GLOBALS["bd"]->query($sqlFindCorreo);
    $res = true;

    if ($result->rowCount() == 0) {
        $res = false;
    }

    return $res;
}

// La función busca una empresa en la tabla que coincida con el correo electrónico y la contraseña proporcionados, y que también tenga un valor de "activo" igual a 1. 
// Devuelve un valor booleano que indica si se encontró una empresa que cumpla con estos requisitos.

function findCorreoPassActivoEmpresa($correo, $pass) {
    $sqlFindCorreoPassActivo = "SELECT * FROM empresa where correo = '$correo'
        and contraseña = '$pass' and activo = '1'";
    $result = $GLOBALS["bd"]->query($sqlFindCorreoPassActivo);

    $encuentraUser = true;
    
    if ($result->rowCount() == 0) {
        $encuentraUser = false;
    }    

    return $encuentraUser;
}

// La función busca una empresa en la tabla que coincida con el correo electrónico proporcionado y devuelve un arreglo asociativo con los valores de la fila correspondiente.

function findOneByCorreoEmpresa($correo) {
    $sqlFindOne = "SELECT * FROM empresa WHERE correo = '$correo'";
    $result = $GLOBALS["bd"]->query($sqlFindOne);
    $res = $result->fetch(PDO::FETCH_ASSOC);

    return $res;
}

// La función "updateEmpresa" actualiza los valores de una empresa en la tabla, utilizando el correo electrónico como identificador.

function updateEmpresa($correo,$username, $contrasena, $direccion) {
    $sqlUpdate = "UPDATE empresa SET nombre='$username' , contraseña = '$contrasena', direccion = '$direccion' where correo='$correo'";
     
    $GLOBALS["bd"]->query($sqlUpdate);
}

function findAllUsuario() {
    $sqlFindAll = "SELECT * FROM usuario";

    $result = $GLOBALS["bd"]->query($sqlFindAll);
    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    return $res;
}

?>