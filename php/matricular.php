<?php
   require_once "../include/session_start.php";
   require_once "main.php";

   #Almacenando datos
   $estudiante = limpiar_cadena($_POST['estudiante']);
   $curso = limpiar_cadena($_POST['curso']);
   $teorica = limpiar_cadena($_POST['teorica']);
   $practica = limpiar_cadena($_POST['practica']);

   #Verificar datos obligatorios
     if($estudiante=="" || $curso==""){
      echo '
            <script>
                alert("No has llenado todo los campos que son obligatorios");
                window.location = "../index.php?vista=home"
            </script>
        ';
        exit();
    }

   //Verificar el estudiante
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
      }
      $check_estudiante=null;

   //Verificar el curso
      $check_curso=conexion();
      $check_curso=$check_curso->query("SELECT * FROM cursos WHERE curso_id='$curso'");
      if ($check_curso->rowCount()<=0) {
         echo '
               <script>
                   alert("El curso no existe en el sistema");
                   window.location = "index.php?vista=home"
               </script>
           ';
           exit();
      }
      $check_curso=null;

   #GUARDAR DATOS
      $matricular=conexion();
      $matricular=$matricular->prepare("INSERT INTO estudiantes_cursos(id_curso, id_estudiante, evaluacion_teorica, evaluacion_practica) VALUES( :curso,:estudiante, :teorica, :practica)");

      $marcadores=[
      ":curso"=>$curso,
      ":estudiante"=>$estudiante,
      ":teorica"=>$teorica,
      ":practica"=>$practica
      ];
      $matricular->execute($marcadores);

      if($matricular->rowCount()==1){
         echo '
            <script>
               alert("El estudiante se matriculo con exito");
               window.location = "../index.php?vista=cursos_list"
            </script>
         ';
      }else{
         echo '
            <script>
               alert("No se pudo matricular a el estudiante, intentelo nuevamente");
               window.location = "../index.php?vista=cursos_list"
            </script>
         ';
      }
      $matricular=null;