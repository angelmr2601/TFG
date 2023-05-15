<?php

$usernameBD = "admin_soundconnect";
$passBD = "admin1234";
$cadena_conexion = "mysql:dbname=soundconnect;host=127.0.0.1";

try {
    $GLOBALS["bd"] = new PDO($cadena_conexion, $usernameBD, $passBD, array(PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {
    echo "Error en la conexión " . $e->getMessage();
}
?>