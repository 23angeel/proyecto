<?php
	require_once "../include/session_start.php";
	require_once "main.php";

	$items1 = ($_POST['curso']);
    $items2 = ($_POST['estudiante']);
    $items3 = ($_POST['teorica']);
    $items4 = ($_POST['practica']);

    while (true) {
        $item1 = current($items1);
        $item2 = current($items2);
        $item3 = current($items3);
        $item4 = current($items4);

        $curso=(($item1 !== false) ? $item1 : ", &nbsp;");
        $estudiante=(($item2 !== false) ? $item2 : ", &nbsp;");
        $teorica=(($item3 !== false) ? $item3 : ", &nbsp;");
        $practica=(($item4 !== false) ? $item4 : ", &nbsp;");

        $valores='('.$curso.',"'.$estudiante.'","'.$teorica.'","'.$practica.'"),';

        $valores_final = substr($valores, 0, -1);

        $sql=conexion();
        $sql="INSERT INTO estudiantes_cursos(id_curso, id_estudiante, evaluacion_teorica, evaluacion_practica) VALUES $valores_final";
        $sqlRes=conexion();
        $sqlRes=$sqlRes->query($sql) or mysql_error();

        $item1 = next ($items1);
        $item2 = next ($items2);
        $item3 = next ($items3);
        $item4 = next ($items4);

        if($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;
        if ($sqlRes) {
            echo'
            <script>
                alert("Los estudiantes se matricularon con exito");
                window.location = "../index.php?vista=cursos_list"
            </script>
            ';
        }else{
            echo'
            <script>
                alert("No se pudo matricular a los  estudiantes");
                window.location = "../index.php?vista=cursos_list"
            </script>
            ';
        }
    }