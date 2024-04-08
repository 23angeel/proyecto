<?php
   require_once "../include/session_start.php";
   require_once "main.php";

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

    /*Verificando numero de cedula*/
    $check_cedula=conexion();
    $check_cedula=$check_cedula->query("SELECT estudiantes_cedula FROM estudiantes WHERE estudiantes_cedula='$cedula'");
    if($check_cedula->rowCount()>0){
      echo '
      <script>
            alert("El numero de cedula ingresado ya existe en el sistema");
            window.location = "../index.php?vista=estudiante_new"
         </script>
      ';
      exit();
   }
   $check_cedula=null;

   #GUARDAR DATOS
    $guardar_estudiante=conexion();
    $guardar_estudiante=$guardar_estudiante->prepare("INSERT INTO estudiantes(estudiantes_cedula, estudiantes_n, estudiantes_nombres,estudiantes_apellidos, estudiantes_naciemineto, estudiantes_sexo, estudiantes_habitacion, estudiantes_celular, estudiantes_oficia,estudiantes_otro, estudiantes_correo, estudiantes_correo2, estudiantes_direccion, estudiantes_inscripcion) VALUES( :cedula, :n, :nombre, :apellidos, :fecha_nacimiento, :sexo, :habitacion, :celular, :oficina, :otro, :correo, :correo2, :direcion, :fecha_registro)");

    $marcadores=[
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
    $guardar_estudiante->execute($marcadores);

    if($guardar_estudiante->rowCount()==1){
        echo '
            <script>
                alert("El estudiante se registro correctamente");
                window.location = "../index.php?vista=estudiantes_list"
            </script>
        ';
    }else{
        echo '
            <script>
                alert("No se pudo registrar el estudiante, intentelo nuevamente");
                window.location = "../index.php?vista=estudiante_new"
            </script>
        ';
    }
    $guardar_estudiante=null;



