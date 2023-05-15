<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vista/assets/css/index.css">
    <title>SoundConnect</title>
</head>
<?php
include("./assets/includes/header.php");
include("../Controlador/controlador_users.php");
?>

<?php



?>

<body>
    <div id="frame1">
        <div class="filtro">
            <span>Filtrar Fecha</span>
            <div class="content">
                <p>Fecha Inicio</p>
                <input type="date" id="inicio" name="filtro-start">
                <p>Fecha Fin</p>
                <input type="date" id="fin" name="filtro-start">
            </div>
        </div>
    </div>
    <div id="frame2">
    </div>
    <div id="frame3">
        <img src="./assets/images/user.png" alt="foto de perfil">
        <?php
        if (isset($_SESSION["correo"])) {
            echo "<p>" . $usuario['nombre'] . "</p>";
        }
        ?>
        <?php
        if (isset($_SESSION["correo"])) {
            if (empty($usuario['sobre_mi']) or empty($usuario['etiqueta1']) or empty($usuario['instagram']) or empty($usuario['yt']) or empty($usuario['spotify']) or empty($usuario['tiktok'])) {
                echo " <form action='./perfil_user.php' method='pos'><button id='editar_perfil'><span><abbr title='Perfil incompleto'>Editar Perfil</abbr></span> <i class='fa-solid fa-circle-exclamation'style='color: #ff0a0a;'></i></button></form>";
            } else {
                echo " <form action='./perfil_user.php' method='pos'><button id='editar_perfil'>Editar Perfil</abbr></button></form>";
            }
        }

        ?>
    </div>
    <div id="frame4">
    </div>
    <div id="frame5">
        <div id="avanzado">
            <h1 id="title"></h1>
        </div>
        <div id="contenedor">
            <?php

            if (isset($_SESSION["correo"])) {
                if ($_SESSION['rol'] == "usuario") {
                    echo "<p>Hola user</p>";
                } else {
                    echo "<p>Hola empresa</p>";
                }
            }
            ?>
        </div>

    </div>
    <div id="frame6">
        <p>Enlaces de interes</p>

        <a><i class="fa-brands fa-instagram"></i> Instagram </a>
        <a><i class="fa-brands fa-youtube"></i> Youtube</a>
        <a><i class="fa-brands fa-spotify"></i> Spotify</ap>
            <a><i class="fa-brands fa-tiktok"></i> Tiktok</a>

    </div>
</body>

</html>