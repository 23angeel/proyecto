<?php
	require_once "../include/session_start.php";
	require_once "main.php";

    foreach ($_POST['id_control'] as $id){
        $conexion = mysqli_connect("localhost", "root", "", "escuela del transporte");
        $teorica=mysqli_real_escape_string($conexion, $_POST['teorica'][$id]);
        $practica=mysqli_real_escape_string($conexion, $_POST['practica'][$id]);

        $actualiza=conexion();
        $actualiza=$actualiza->query("UPDATE estudiantes_cursos SET evaluacion_teorica='$teorica', evaluacion_practica='$practica' WHERE id='$id'");
    }

    if ($actualiza==true) {
        echo '
            <script>
                alert("Se registraron las notas con exito");
                window.location = "../index.php?vista=studies_control"
            </script>
        ';
    }else{
        echo '
            <script>
                alert("¡Ocurrio un error! No se pudo registrar las notas");
                window.location = "../index.php?vista=studies_control"
            </script>
        ';
    }
    $actualiza=null;
        

