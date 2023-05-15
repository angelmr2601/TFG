<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoundConnect</title>
    <link rel="stylesheet" type="text/css" href="../Vista/assets/css/oferta.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <?php
        if (isset($_GET['idOferta'])) {
            include("../Modelo/oferta.php");
            $id = $_GET['idOferta'];
            $oferta = findOneByID($id);

        ?>

            <div class="signup">
                <form method="post" action="../Controlador/actualizar_oferta.php">
                    <label aria-hidden="true">Actualizar Oferta</label>
                    <input type="hidden" name="idOferta" value="<?php echo ($_GET['idOferta']) ?>">
                    <input type="text" name="nombre" placeholder="Nombre Oferta" value="<?php if (isset($oferta["nombre"]))
                                                                                            echo $oferta["nombre"] ?>" required="">
                    <textarea name="descripcion" placeholder="Descripcion Evento" rows="5" cols="28" required=""><?php if (isset($oferta["descripcion"]))
                                                                                                                        echo $oferta["descripcion"] ?></textarea>
                    <input type="date" name="evento_inicio" placeholder="Fecha Inicio Evento" value="<?php if (isset($oferta["evento_inicio"]))
                                                                                                        echo $oferta["evento_inicio"] ?>" required="">
                    <input type="date" name="evento_fin" placeholder="Fecha Fin Evento" value="<?php if (isset($oferta["evento_fin"]))
                                                                                                    echo $oferta["evento_fin"] ?>" required="">
                    <input type="float" name="precio" placeholder="Salario" required="" value="<?php if (isset($oferta["precio"]))
                                                                                                    echo $oferta["precio"] ?>" required="">
                    <button>Actualizar</button>
                </form>

            </div>
    </div>
<?php
        }
?>
</body>

</html>