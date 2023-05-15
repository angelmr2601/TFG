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
include("../Controlador/controlador_ofertas.php");
include("../Controlador/controlador_ver_user.php");
?>

<body>
    <div id="frame1">
        <div class="filtro">
            <span>Filtrar Fecha</span>
            <div class="content">
                <form action="../Controlador/filtro_fechas.php" method="post">
                    <p>Fecha Inicio</p>
                    <input type="date" name="filtro-start">
                    <p>Fecha Fin</p>
                    <input type="date" name="filtro-fin">
                    <input type="submit" value="Filtrar">
                </form>
            </div>
        </div>
    </div>
    <div id="frame2">
        <a class="button" href="./crearoferta.php">Crear oferta</a>
        <a class="button" href="./listar_ofertas.php">Mis ofertas</a>
    </div>
    <div id="frame3">
        <img src="./assets/images/user.png" alt="foto de perfil">
        <p>Nombre usuario</p>
        <span>Profesion</span>
        <?php
        if (isset($_SESSION["correo"])) {
            echo " <form action='./perfil_empresa.php' method='pos'><button id='editar_perfil'>Editar Perfil</button></form>";
        }
        ?>
    </div>
    <!-- <div id="filtros">
        <p>Filtros</p>
    </div> -->
    <div id="frame4">
        <?php

        if (isset($_SESSION["correo"])) {
            if ($_SESSION['rol'] == "empresa") {
                if (count($ofertas) != 0) { ?>
                    <?php
                    foreach ($ofertas as $oferta) {
                    ?>
                        <a href="listar_ofertas.php?id=<?php echo $oferta["idOferta"] ?>&inicio_evento=<?php echo $oferta["evento_inicio"] ?>&fin_evento=<?php echo $oferta["evento_fin"] ?>">
                            <div id="container">
                                <div id="users">
                                    <img src="./assets/images/maletin.png" width="50px" alt="">
                                    <span><?php echo $oferta["nombre"] ?></span>
                                </div>
                                <p style="display: none;"><?php echo $oferta["idOferta"] ?></p>
                                <p>Descripcion del evento: <?php echo $oferta["descripcion"] ?> </p>
                                <p>Fecha de Inicio: <?php echo $oferta["evento_inicio"] ?> </p>
                                <p>Fecha de Fin: <?php echo $oferta["evento_fin"] ?> </p>
                                <p>Salario: <?php echo $oferta["precio"] ?>€ </p>
                            </div>
                        </a>
        <?php
                    }
                } else {
                    echo '<p>No hay ofertas</p>';
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

            if (isset($_GET['idUser'])) {
                if ($_SESSION['rol'] == "empresa") { ?>
                    <?php
                    $idUser = $_GET['idUser'];
                    $muestra = findOneByIdUser($idUser);
                    ?>
                    <h1><?php echo $muestra["nombre"] ?></h1>
                    <p style="display: none;"><?php echo $muestra["idUser"] ?></p>
                    <p>Direccion: <?php echo $muestra["direccion"] ?> </p>
                    <p>Correo: <?php echo $muestra["correo"] ?> </p>
                    <?php
                    if (isset($muestra["disponibilidad_inicio1"])) {
                    ?>
                        <p>Disponibilidad Inicio: <?php echo $muestra["disponibilidad_inicio1"] ?> </p>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($muestra["disponibilidad_fin1"])) {
                    ?>
                        <p>Disponibilidad Fin: <?php echo $muestra["disponibilidad_fin1"] ?> </p>
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($muestra["disponibilidad_inicio2"])) {
                    ?>
                        <p>Disponibilidad Inicio2: <?php echo $muestra["disponibilidad_inicio2"] ?> </p>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($muestra["disponibilidad_fin2"])) {
                    ?>

                        <p>Disponibilidad Fin: <?php echo $muestra["disponibilidad_fin2"] ?> </p>
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($muestra["disponibilidad_inicio3"])) {
                    ?>
                        <p>Disponibilidad Inicio3: <?php echo $muestra["disponibilidad_inicio3"] ?> </p>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($muestra["disponibilidad_fin3"])) {
                    ?>
                        <p>Disponibilidad Fin: <?php echo $muestra["disponibilidad_fin3"] ?> </p>
                    <?php
                    }
                    ?>





                    <a href="mailto:<?php echo $muestra["correo"] ?>?subject=NOMBRE_DE_LA_EMPRESA%20te%20ha%20contactado">
                        <div id="contact">
                            Contacta
                        </div>

                    </a>

            <?php
                }
            } else {
                echo '<p>No hay</p>';
            }
            ?>
        </div>

    </div>
    <div id="frame6">
        <p>Frame 6</p>

    </div>
</body>

</html>