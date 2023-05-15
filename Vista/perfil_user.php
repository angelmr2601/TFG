<?php
include("./assets/includes/header.php");
include("../Controlador/datosperfil_user.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/perfil_user.css">
    <title>Perfil</title>
</head>

<body>
    <div id="contenedor">
        <form action="../Controlador/actualizarperfil_user.php" method="post">
            <fieldset>
                <h1>Datos Personales</h1>

                <input type="hidden" name="idUser" placeholder="Nombre" value="<?php if (isset($user['idUser']))
                                                                                    echo $user['idUser'] ?>" />
                <input type="text" name="username" placeholder="Nombre" value="<?php if (isset($user['nombre']))
                                                                                    echo $user['nombre'] ?>" />
                <input type="text" name="direccion" placeholder="Direccion" value="<?php if (isset($user['direccion']))
                                                                                        echo $user['direccion'] ?>" />
                <textarea name="sobre_mi" placeholder="Sobre mi" rows="10" cols="34"><?php if (isset($user["sobre_mi"]))
                                                                                            echo $user["sobre_mi"] ?></textarea>

            </fieldset>
            <fieldset>
                <h1>Disponibilidad</h1>
                <label for="chk" aria-hidden="true">Fecha 1</label>

                <input type="date" name="disponibilidad_inicio1" value="<?php if (isset($user['disponibilidad_inicio1']))
                                                                            echo $user['disponibilidad_inicio1'] ?>" />
                <input type="date" name="disponibilidad_fin1" value="<?php if (isset($user['disponibilidad_fin1']))
                                                                            echo $user['disponibilidad_fin1'] ?>" />
                <label for="chk" aria-hidden="true">Fecha 2 </label>

                <input type="date" name="disponibilidad_inicio2" value="<?php if (isset($user['disponibilidad_inicio2']))
                                                                            echo $user['disponibilidad_inicio2'] ?>" />
                <input type="date" name="disponibilidad_fin2" value="<?php if (isset($user['disponibilidad_fin2']))
                                                                            echo $user['disponibilidad_fin2'] ?>" />
                <label for="chk" aria-hidden="true">Fecha 3</label>

                <input type="date" name="disponibilidad_inicio3" value="<?php if (isset($user['disponibilidad_inicio3']))
                                                                            echo $user['disponibilidad_inicio3'] ?>" />
                <input type="date" name="disponibilidad_fin3" value="<?php if (isset($user['disponibilidad_fin3']))
                                                                            echo $user['disponibilidad_fin3'] ?>" />
            </fieldset>
            <fieldset>
                <h1>Enlaces</h1>
                <i class="fa-brands fa-instagram"></i>
                <input type="text" name="instagram" placeholder="Instagram" value="<?php if (isset($user['instagram']))
                                                                                    echo $user['instagram'] ?>" />
                <i class="fa-brands fa-youtube"></i>
                <input type="text" name="yt" placeholder="Youtube" value="<?php if (isset($user['yt']))
                                                                                echo $user['yt'] ?>" />
                <i class="fa-brands fa-spotify"></i>
                <input type="text" name="spotify" placeholder="Spotify" value="<?php if (isset($user['spotify']))
                                                                                    echo $user['spotify'] ?>" />
                <i class="fa-brands fa-tiktok"></i>
                <input type="text" name="tiktok" placeholder="TikTok" value="<?php if (isset($user['tiktok']))
                                                                                    echo $user['tiktok'] ?>" />
            </fieldset>
            <fieldset>
                <h1>Contraseña</h1>
                <input type="password" name="passwordActual" placeholder="Contrasenia Actual">
                <input type="password" name="passwordNueva" placeholder="Contrasenia Nueva">
                <input type="password" name="passwordNuevaComprobar" placeholder="Repita Contrasenia ">
                <a href="../Vista/index_user.php">Atras</a>
            </fieldset>
            <input type="submit" name="submit" value="Actualizar">
            <a href="../Vista/index_user.php">Atras</a>

        </form>

        
    </div>
</body>

</html>