<?php
include("./assets/includes/header.php");
include("../Controlador/datosperfil_empresa.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/perfil.css">
    <title>Perfil</title>
</head>

<body>
    <div id="contenedor">
        <form action="../Controlador/actualizarperfil_empresa.php" method="post">
            <fieldset>
                <h1>Datos Personales</h1>
                <input type="text" name="username" placeholder="Nombre"value="<?php if (isset($username))
                                                                                                                                                    echo $username ?>" />
                <input type="text" name="direccion" placeholder="Direccion" value="<?php if (isset($direccion))
                                                                                                                                                    echo $direccion ?>" />
            </fieldset>
            <fieldset>
                <h1>Contraseña</h1>
                <input type="password" name="passwordActual" placeholder="Contrasenia Actual">
                <input type="password" name="passwordNueva" placeholder="Contrasenia Nueva">
                <input type="password" name="passwordNuevaComprobar" placeholder="Repita Contrasenia ">
            </fieldset>
            <input type="submit" name="submit" value="Actualizar">
        </form>
    </div>
</body>

</html>