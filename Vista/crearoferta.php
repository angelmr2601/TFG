<?php
session_start();
?>
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

			<div class="signup">
			<form method="post" action="../Controlador/crear_oferta.php">
					<label aria-hidden="true">Crear Oferta</label>
					<input type="hidden" name="idEmpresa" value="<?php echo ($_SESSION["id"]) ?>">
					<input type="text" name="nombre" placeholder="Nombre Oferta" required="">
                    <textarea name="descripcion" placeholder="Descripcion Evento" rows="5" cols="28"></textarea>
					<input type="date" name="fecha_inicio" placeholder="Fecha Inicio Evento">
					<input type="date" name="fecha_fin" placeholder="Fecha Fin Evento">
                    <input type="float" name="precio" placeholder="Salario" required="">
					<button>Crear Oferta</button>
				</form>
				
			</div>
	</div>
</body>
</html>
