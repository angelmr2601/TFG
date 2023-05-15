<?php
include("../Modelo/empresa.php");

session_start();

$error = false;

if (isset($_SESSION["correo"])) {
     header("Location:/");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $correo = $_POST["correo"];
        $pass = hash('sha256', $_POST["pass"]);

        $idEmpresa =findOneByCorreoEmpresa($correo)['idEmpresa'];
        $resultConsultaEncontrarUser = findCorreoPassActivoEmpresa($correo, $pass);

        // Comprobamos en el 1º IF que el usuario existe
        if ($resultConsultaEncontrarUser == true) {
            $_SESSION['correo'] = $correo;
            $_SESSION['rol'] = "empresa";
            $_SESSION['id'] = $idEmpresa;
            
            
            header("Location:../Vista/index_empresa.php");
        } else {
         header("Location:../Vista/Error.html");
        }
    }
}
?>