<?php
	require_once "../include/session_start.php";
	require_once "main.php";

	$id=limpiar_cadena($_POST['curso_id']);

	// Verificar el curso
	$check_curso=conexion();
	$check_curso=$check_curso->query("SELECT * FROM cursos WHERE curso_id='$id'");
	if ($check_curso->rowCount()<=0) {
		echo '
            <script>
                alert("El curso no existe en el sistema");
                window.location = "index.php?vista=home"
            </script>
        ';
        exit();
	}else{
		$datos=$check_curso->fetch();
	}
	$check_curso=null;

	#Almacenando datos
    $curso = limpiar_cadena($_POST['name']);
    $grado = limpiar_cadena($_POST['grado']);
    $mes = limpiar_cadena($_POST['mes']);
    $año = limpiar_cadena($_POST['año']);

    #Verificar datos obligatorios
    if($curso=="" || $mes=="" || $año==""){
    	echo '
            <script>
                alert("No has llenado todo los campos que son obligatorios");
                window.location = "../index.php?vista=cursos_list"
            </script>
        ';
        exit();
    }

    //Editar datos
    $editar_curso=conexion();
    $editar_curso=$editar_curso->prepare("UPDATE cursos SET curso_nombre=:curso, curso_grado=:grado, curso_mes=:mes, curso_año=:tiempo WHERE curso_id=:id");

    $marcadores=[
    	":id"=>$id,
        ":curso"=>$curso,
        ":grado"=>$grado,
        ":mes"=>$mes,
        ":tiempo"=>$año
	];

    if ($editar_curso->execute($marcadores)){
       	echo '
            <script>
               	alert("El curso fue editado correctamente");
                window.location = "../index.php?vista=cursos_list"
            </script>
        ';
    }else{
       	echo '
            <script>
                alert("¡Ocurrio un error! No se pudo editar el curso");
                window.location = "../index.php?vista=cursos_list"
            </script>
        ';
    }
    $editar_curso=null;
