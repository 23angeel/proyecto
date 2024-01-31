<?php
	require_once "../include/session_start.php";
	require_once "main.php";

	$curso=limpiar_cadena($_POST['curso_id']);

	// Verificar el curso
	$check_curso=conexion();
	$check_curso=$check_curso->query("SELECT * FROM cursos WHERE curso_id='$curso'");
	if ($check_curso->rowCount()<=0) {
		echo '
            <script>
                alert("El curso no existe en el sistema");
                window.location = "../index.php?vista=cursos_list"
            </script>
        ';
        exit();
	}else{
		$datos=$check_curso->fetch();
	}
	$check_curso=null;

	#Almacenando datos
    $estudiante = limpiar_cadena($_POST['estudiante']);

    #Verificar datos obligatorios
    if($estudiante==""){
    	echo '
            <script>
                alert("No has llenado todo los campos que son obligatorios");
                window.location = "../index.php?vista=cursos_list"
            </script>
        ';
        exit();
    }

    // Verificar el estudiante
	$check_estudiante=conexion();
	$check_estudiante=$check_estudiante->query("SELECT * FROM estudiantes WHERE estudiantes_id='$estudiante'");
	if ($check_estudiante->rowCount()<=0) {
		echo '
            <script>
                alert("El estudiante no existe en el sistema");
                window.location = "index.php?vista=home"
            </script>
        ';
        exit();
	}else{
		$datos=$check_estudiante->fetch();
	}
	$check_estudiante=null;

    $evaluacion_teorica = 0;
    $evaluacion_practica = 0;

	//Matricular estudiante
	$matricular_estudiante=conexion();
    $matricular_estudiante=$matricular_estudiante->prepare("INSERT INTO estudiantes_cursos(id_curso, id_estudiante, evaluacion_teorica, evaluacion_practica) VALUES( :curso, :estudiante, :evaluacion_teorica, :evaluacion_practica)");

    $marcadores=[
        ":curso"=>$curso,
        ":estudiante"=>$estudiante,
        ":evaluacion_teorica"=>$evaluacion_teorica,
        ":evaluacion_practica"=>$evaluacion_practica
    ];
    $matricular_estudiante->execute($marcadores);

    if($matricular_estudiante->rowCount()==1){
        echo '
            <script>
                alert("El estudiante se matriculo con exito");
                window.location = "../index.php?vista=cursos_list"
            </script>
        ';
    }else{
        echo '
            <script>
                alert("No se pudo matricular al estudiante, intentelo nuevamente");
                window.location = "../index.php?vista=curso_new"
            </script>
        ';
    }
    $matricular_estudiante=null;