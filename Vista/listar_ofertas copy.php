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
include("../Controlador/controlador_users.php");
?>

<body>
    <div id="frame1">
        <div class="filtro">
            <span>Filtrar Fecha</span>
            <div class="content">
                <form action="../Controlador/filtro_fechas.php" method="GET">
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
            echo "<a href='/Controlador/Logout.php'>Adios</a>";
        } else {
            echo "<a href='/Vista/login_user.php'>Hola</a>";
        }
        ?>
    </div>
    <div id="frame4">
        <?php

        if (isset($_SESSION["correo"])) {
            if ($_SESSION['rol'] == "empresa") {
                if (isset($_GET['id'])) {
                    if (count($usuarios) != 0) { ?>
                        <?php
                        foreach ($usuarios as $user) {
                        ?>
                            <a href="listar_users.php?idUser=<?php echo $user["idUser"] ?>">
                                <div id="container">
                                    <div id="users">
                                        <img src="./assets/images/user.png" alt="">
                                        <span><?php echo $user["nombre"] ?></span>
                                    </div>
                                    <p style="display: none;"><?php echo $user["idUser"] ?></p>
                                    <p>Direccion: <?php echo $user["direccion"] ?> </p>
                                    <p>Correo: <?php echo $user["correo"] ?> </p>
                                    <?php
                                    if (isset($user["disponibilidad_inicio1"])) {
                                    ?>
                                        <p>Disponibilidad Inicio: <?php echo $user["disponibilidad_inicio1"] ?> </p>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($user["disponibilidad_fin1"])) {
                                    ?>
                                        <p>Disponibilidad Fin: <?php echo $user["disponibilidad_fin1"] ?> </p>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (isset($user["disponibilidad_inicio2"])) {
                                    ?>
                                        <p>Disponibilidad Inicio2: <?php echo $user["disponibilidad_inicio2"] ?> </p>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($user["disponibilidad_fin2"])) {
                                    ?>

                                        <p>Disponibilidad Fin: <?php echo $user["disponibilidad_fin2"] ?> </p>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (isset($user["disponibilidad_inicio3"])) {
                                    ?>
                                        <p>Disponibilidad Inicio3: <?php echo $user["disponibilidad_inicio3"] ?> </p>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($user["disponibilidad_fin3"])) {
                                    ?>
                                        <p>Disponibilidad Fin: <?php echo $user["disponibilidad_fin3"] ?> </p>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </a>
                        <?php
                        }
                    } else if (isset($_GET['id'])) {
                        echo '<p>No hay usuarios</p>';
                    }
                } else {
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
        }
        ?>
    </div>
    <div id="frame5">
        <div id="avanzado">
            <h1 id="title"></h1>
        </div>
        <div id="contenedor">
            <?php

            if (isset($_GET['id'])) {
                if ($_SESSION['rol'] == "empresa") { ?>
                    <?php
                    $muestra = findOneByIdOferta($_GET['id']);
                    ?>
                    <h1><?php echo $muestra["nombre"] ?></h1>
                    <p style="display: none;"><?php echo $muestra["idOferta"] ?></p>
                    <p>Descripcion del evento: </p>
                    <p><?php echo $muestra["descripcion"] ?></p>
                    <p><?php
                        $originalDate = $muestra["evento_inicio"];
                        $originalDate2 = $muestra["evento_fin"];
                        $newDate = date("d/m/Y", strtotime($originalDate));
                        $newDate2 = date("d/m/Y", strtotime($originalDate2));
                        echo $newDate . "   -   " . $newDate2 ?>
                    </p>
                    <p>Salario: <?php echo $muestra["precio"] ?> </p>
                    <br>

                    <a class="button2" href="../Vista/editar_oferta.php?idOferta=<?php echo $muestra["idOferta"] ?>">Editar <i class="fa-solid fa-pen-to-square"></i></a>
                    <a class="delete" href="../Controlador/borrar_oferta.php?id=<?php echo $muestra["idOferta"] ?>">Borrar <i class="fa-solid fa-trash"></i></a>

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

        <?php
        $resultados = findfiltros();

        $casifinal = implode(",", $resultados);
        $final = explode(",", $casifinal);

        if (count($final) != 0) { ?>
            <?php
            foreach ($final as $fin) {

             $filtro = findOneByIdUser($fin);

             echo $filtro['nombre'];
            ?>
        <?php
            }
        } else {
            echo '<p>No hay ofertas</p>';
        }
        ?>

    </div>
</body>

</html>
<script src="https://kit.fontawesome.com/40f292c515.js" crossorigin="anonymous"></script>