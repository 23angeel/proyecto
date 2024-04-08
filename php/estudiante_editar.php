<?php
	require_once "../include/session_start.php";
	require_once "main.php";

	$id=limpiar_cadena($_POST['estudiantes_id']);

	// Verificar el estudiante
	$check_estudiante=conexion();
	$check_estudiante=$check_estudiante->query("SELECT * FROM estudiantes WHERE estudiantes_id='$id'");
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

	#Almacenando datos
	$fecha_registro = limpiar_cadena($_POST['inscripcion']);
   	$nombre = limpiar_cadena($_POST['name']);
    $apellidos = limpiar_cadena($_POST['ape']);
    $n = limpiar_cadena($_POST['cedula']);
    $cedula= limpiar_cadena($_POST['cedu']);
    $fecha_nacimiento = limpiar_cadena($_POST['nacimiento']);
    $sexo = limpiar_cadena($_POST['tipo']);
    $habitacion = limpiar_cadena($_POST['codihabit']."".$_POST['habit']);
    $celular = limpiar_cadena($_POST['codicelu']."".$_POST['celu']);
    $oficina = limpiar_cadena($_POST['codiofi']."".$_POST['ofi']);
    $otro = limpiar_cadena($_POST['codiotro']."".$_POST['otro']);
    $correo = limpiar_cadena($_POST['correo']);              
    $correo2 = limpiar_cadena($_POST['correo2']);
    $direcion = limpiar_cadena($_POST['direc']);

    #Verificar datos obligatorios
    if($fecha_registro=="" || $nombre=="" || $apellidos=="" || $n=="" || $cedula=="" || $fecha_nacimiento=="" || $sexo=="" || $correo==""){
      echo '
            <script>
                alert("No has llenado todo los campos que son obligatorios");
                window.location = "../index.php?vista=home"
            </script>
        ';
        exit();
    }

    #PASANDO LOS DATOS A MAYUSCULA
    $nombre=strtoupper($nombre);
    $apellidos=strtoupper($apellidos);
    $direcion=strtoupper($direcion);

    #Verificar integridad de los datos
    if (verificar_datos("[0-9.]{1,10}", $cedula)) {
      echo '
            <script>
                alert("El numero de cedula no coincide con el formato solicitado");
                window.location = "../index.php?vista=estudiante_new"
            </script>
        ';
        exit();
    }

    #EDITAR DATOS
    $editar_estudiante=conexion();
    $editar_estudiante=$editar_estudiante->prepare("UPDATE estudiantes SET estudiantes_cedula=:cedula, estudiantes_n=:n, estudiantes_nombres=:nombre,estudiantes_apellidos=:apellidos, estudiantes_naciemineto=:fecha_nacimiento, estudiantes_sexo=:sexo, estudiantes_habitacion=:habitacion, estudiantes_celular=:celular, estudiantes_oficia=:oficina,estudiantes_otro=:otro, estudiantes_correo=:correo, estudiantes_correo2=:correo2, estudiantes_direccion=:direcion, estudiantes_inscripcion=:direcion WHERE estudiantes_id=:id");
    
    $marcadores=[
        ":id"=>$id, 
        ":cedula"=>$cedula, 
        ":n"=>$n, 
        ":nombre"=>$nombre, 
        ":apellidos"=>$apellidos, 
        ":fecha_nacimiento"=>$fecha_nacimiento, 
        ":sexo"=>$sexo, 
        ":habitacion"=>$habitacion, 
        ":celular"=>$celular, 
        ":oficina"=>$oficina, 
        ":otro"=>$otro, 
        ":correo"=>$correo, 
        ":correo2"=>$correo2, 
        ":direcion"=>$direcion, 
        ":fecha_registro"=>$fecha_registro
    ];

    if($editar_estudiante->execute($marcadores)){
        echo '
            <script>
                alert("El estudiante se edito correctamente");
                window.location = "../index.php?vista=estudiantes_list"
            </script>
        ';
    }else{
        echo '
            <script>
                alert("No se pudo editar el estudiante, intentelo nuevamente");
                window.location = "../index.php?vista=estudiante_list"
            </script>
        ';
    }
    $editar_estudiante=null;