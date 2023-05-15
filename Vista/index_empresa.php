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
        <a class="button" href="./crearoferta.php">Crear oferta</a>
        <a class="button" href="./listar_ofertas.php">Mis ofertas</a>
    </div>
    <div id="frame3">
    <?php
        if (isset($_SESSION["correo"])) {
            echo "<a href='/Controlador/Logout.php'><span><i id='logout' class='fa-solid fa-arrow-right-from-bracket'></i></span></a>";
        }else {
            echo "<a href='/Vista/login_user.php'>Hola</a>";
        }
        ?>
        <img src="./assets/images/user.png" alt="foto de perfil">
        <p>Nombre usuario</p>
        <span>Profesion</span>
        <?php
        if (isset($_SESSION["correo"])) {
            echo "<form action='./perfil_empresa.php' method='pos'><button id='editar_perfil'>Editar Perfil</button></form>";
        }else {
            echo "<a href='/Vista/login_user.php'>Hola</a>";
        }
        ?>
    </div>
    <div id="frame4">
        <?php

        if (isset($_SESSION["correo"])) {
            if ($_SESSION['rol'] == "empresa") {
                if (count($usuarios) != 0) { ?>
                    <?php
                    foreach ($usuarios as $usuario) {
                    ?>
                    <a href="listar_users.php?idUser=<?php echo $usuario["idUser"] ?>">
                        <div id="container">
                            <div id="users">
                                <img src="./assets/images/user.png" alt="">
                                <span><?php echo $usuario["nombre"] ?></span>
                            </div>
                            <p style="display: none;"><?php echo $usuario["idUser"] ?></p>
                            <p>Direccion: <?php echo $usuario["direccion"] ?> </p>
                            <p>Correo: <?php echo $usuario["correo"] ?> </p>
                            <p>Disponibilidad Inicio: <?php echo $usuario["disponibilidad_inicio1"] ?> </p>
                            <p>Disponibilidad Fin: <?php echo $usuario["disponibilidad_fin1"] ?> </p>
                        </div>
                    </a>
        <?php
                    }
                } else {
                    echo '<p>No hay usuarios</p>';
                }
            }
        }
        ?>
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
        <p>Frame 6</p>

    </div>
</body>

</html>
<script src="https://kit.fontawesome.com/40f292c515.js" crossorigin="anonymous"></script>