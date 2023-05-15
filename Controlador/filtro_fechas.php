<?php

include("../Controlador/controlador_users.php");


        function filtrar($filtro_start, $filtro_fin)
        {
            $resultado = findAllUsuario();


            $usuarios_disponibles = array();
            foreach ($resultado as $usuario) {
                $usuario_fecha_inicio1 = $usuario['disponibilidad_inicio1'];
                $usuario_fecha_fin1 = $usuario['disponibilidad_fin1'];

                if (
                    $filtro_start >= $usuario_fecha_inicio1 && $filtro_start <= $usuario_fecha_fin1 &&
                    $filtro_fin >= $usuario_fecha_inicio1 && $filtro_fin <= $usuario_fecha_fin1
                ) {
                    $usuarios_disponibles[] = $usuario['idUser'];
                }
            }
            return $usuarios_disponibles;
        }

        $filtro_start = $_GET['filtro-start'];
        $filtro_fin = $_GET['filtro-fin'];
        

        $filtrados = filtrar($filtro_start, $filtro_fin);

        $resultados = implode(',',$filtrados);

        filtros($resultados);

        header("Location:../Vista/listar_ofertas.php?filtro=si");

