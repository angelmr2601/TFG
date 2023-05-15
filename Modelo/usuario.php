<?php
include("conectar.php");

function crearUsuario($username, $correo, $contrasena, $direccion)
{
    $sqlCrear = "INSERT INTO usuario(nombre,correo, contraseña, direccion,activo)
    VALUES ('$username','$correo','$contrasena', '$direccion','1')";


    $GLOBALS["bd"]->query($sqlCrear);
}

function findCorreoUsuario($correo)
{
    $sqlFindCorreo = "SELECT * FROM usuario where correo = '$correo'";
    $result = $GLOBALS["bd"]->query($sqlFindCorreo);
    $res = true;

    if ($result->rowCount() == 0) {
        $res = false;
    }

    return $res;
}

function findCorreoPassActivoUsuario($correo, $pass)
{
    $sqlFindCorreoPassActivo = "SELECT * FROM usuario where correo = '$correo'
        and contraseña = '$pass' and activo = '1'";
    $result = $GLOBALS["bd"]->query($sqlFindCorreoPassActivo);

    $encuentraUser = true;

    if ($result->rowCount() == 0) {
        $encuentraUser = false;
    }

    return $encuentraUser;
}

function findUsername($correo)
{
    $user = findOneByCorreoUser($correo)["username"];
    return $user;
}

function findOneByIdUser($codUser)
{
    $sqlFindOne = "SELECT * FROM usuario WHERE idUser = '$codUser'";
    $result = $GLOBALS["bd"]->query($sqlFindOne);
    $res = $result->fetch(PDO::FETCH_ASSOC);

    return $res;
}

function banearDesbanear($codUser)
{
    $estaActivo = findOneByIdUser($codUser)["activo"];

    if ($estaActivo == "1") {
        $sqlBanearUser = "UPDATE usuario set activo = 0 where codUser = '$codUser'";
        $GLOBALS["bd"]->query($sqlBanearUser);
    } else {
        $sqlDesbanearUser = "UPDATE usuario set activo = 1 where codUser = '$codUser'";
        $GLOBALS["bd"]->query($sqlDesbanearUser);
    }
}

function findOneByCorreoUser($correo)
{
    $sqlFindOne = "SELECT * FROM usuario WHERE correo = '$correo'";
    $result = $GLOBALS["bd"]->query($sqlFindOne);
    $res = $result->fetch(PDO::FETCH_ASSOC);

    return $res;
}

$idUser = 0;

function updateVacioUsuario($correo)
{
    $idUser =  findOneByCorreoUser($correo)["codUser"];

    $sqlUpdateVacio = "UPDATE usuario set correo = '$idUser@usereli.com', username = 'GDPR',
                        direccion = 'GDPR', cp='00000', pais='GDPR', activo = '0' where correo = '$correo'";

    $GLOBALS["bd"]->query($sqlUpdateVacio);
}

function updateUsuario($correo, $username, $contrasena, $direccion, $disponibilidad_inicio1, $disponibilidad_fin1,$disponibilidad_inicio2, $disponibilidad_fin2,$disponibilidad_inicio3, $disponibilidad_fin3,$instagram,$yt,$spotify,$tiktok)
{
    $sqlUpdate = "UPDATE usuario SET nombre='$username' , contraseña = '$contrasena', direccion = '$direccion', disponibilidad_inicio1 = '$disponibilidad_inicio1', disponibilidad_fin1 = '$disponibilidad_fin1', disponibilidad_inicio2 = '$disponibilidad_inicio2', disponibilidad_fin2 = '$disponibilidad_fin2', disponibilidad_inicio3 = '$disponibilidad_inicio3', disponibilidad_fin3 = '$disponibilidad_fin3', instagram = '$instagram', yt = '$yt', spotify = '$spotify', tiktok = '$tiktok' where correo='$correo'";

    $GLOBALS["bd"]->query($sqlUpdate);
}

function findAllUsuario()
{
    $sqlFindAll = "SELECT * FROM usuario";

    $result = $GLOBALS["bd"]->query($sqlFindAll);
    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    return $res;
}



function findAllEmpresa()
{
    $sqlFindAll = "SELECT * FROM empresa";

    $result = $GLOBALS["bd"]->query($sqlFindAll);
    $res = $result->fetchAll(PDO::FETCH_ASSOC);

    return $res;
}

function filtros($resultado) {
    $sqlTemporal = "UPDATE filtro_tmp SET filtro_tmp = '$resultado' where id=1";

    $GLOBALS["bd"]->query($sqlTemporal);
}

function findfiltros() {
    $sqlTemporal = "SELECT filtro_tmp FROM filtro_tmp where id=1";

    $result = $GLOBALS["bd"]->query($sqlTemporal);
    $res = $result->fetch(PDO::FETCH_ASSOC);

    return $res;
}