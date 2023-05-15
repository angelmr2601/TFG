<?php
session_start();
?>
<html>

<head>
    <link rel="stylesheet" href="/Vista/assets/css/header.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<header>
    <nav id="nav">
        <div class="container flex">
            <a href="/index.php">SoundConnect</a>
            <div class="links">
                <a href="#">Buscar Ofertas</a>
                <a href="#">Mis contratos</a>
                <a href="#">Contratos solicitados</a>
            </div>
            <?php
            if (isset($_SESSION["correo"])) {
                echo "<a href='/Controlador/Logout.php'>Adios</a>";
            } else {
                echo "<a href='/Vista/login_user.php'>Hola</a>";
            }
            ?>
        </div>
    </nav>
</header>
<script src="/Vista/assets/js/header.js"></script>

</html>
<script src="https://kit.fontawesome.com/40f292c515.js" crossorigin="anonymous"></script>