<?php
include("../Modelo/usuario.php");
// Comprobamos que el usuario esta logueado para editarlo
if (isset($_SESSION["correo"])) {
    $correo = $_SESSION["correo"];
    $user = findOneByCorreoUser($correo);
} else {
    header("Location:../Vista/Error.html");
}

?>