<head>
    <link rel="stylesheet" type="text/css" href="./css/estudiantes_profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<?php
    require_once "./php/main.php";

    $id = (isset($_GET['estudiante_id_up'])) ? $_GET['estudiante_id_up'] : 0;
    $id=limpiar_cadena($id);

    $check_estudiante=conexion();
    $check_estudiante=$check_estudiante->query("SELECT * FROM estudiantes WHERE estudiantes_id='$id'");
    if($check_estudiante->rowCount()>0){
        $datos=$check_estudiante->fetch();
        if ($datos['estudiantes_habitacion']!="") {
            $habitacion=$datos['estudiantes_habitacion'];
        }else{
            $habitacion="N/A";
        }
        if ($datos['estudiantes_celular']!="") {
            $celular=$datos['estudiantes_celular'];
        }else{
            $celular="N/A";
        }
        if ($datos['estudiantes_oficia']!="") {
            $oficina=$datos['estudiantes_oficia'];
        }else{
            $oficina="N/A";
        }
        if ($datos['estudiantes_otro']!="") {
            $otro=$datos['estudiantes_otro'];
        }else{
            $otro="N/A";
        }
        if ($datos['estudiantes_correo']!="") {
            $correo=$datos['estudiantes_correo'];
        }else{
            $correo="N/A";
        }
        if ($datos['estudiantes_correo2']!="") {
            $correo=$datos['estudiantes_correo2'];
        }else{
            $correo2="N/A";
        }
?>
<div class="container">
    <div class="caja">
        <h2 class="titulo">Informacion del Estudiante</h2>
        <div class="button">
            <?php echo '<a href="./fpdf/estudiantes_pdf.php?estudiante_update&estudiante_id_up='.$id.'">Generar reporte</a><br>';?>
        </div>

        <label class="fecha"><b>Fecha de Registro:</b></label><br>
        <span class="fecha"><?php echo $datos['estudiantes_inscripcion'];?></span><br>

        <label class="cedula"><b>Cedula de Identidad:</b></label><br>
        <span class="cedula"><?php echo $datos['estudiantes_cedula'];?></span><br>
    
        <label class="nombre"><b>Nombres:</b></label><br>
        <span class="nombre"><?php echo $datos['estudiantes_nombres'];?></span><br>

        <label class="apellido"><b>Apellidos:</b></label><br>
        <span class="apellido"><?php echo $datos['estudiantes_apellidos'];?></span><br>
        <label class="nacimiento"><b>Fecha de Naciemiento:</b></label><br>
        <span class="nacimiento"><?php echo $datos['estudiantes_naciemineto'];?></span><br>

        <label class="sexo"><b>Sexo:</b></label><br>
        <span class="sexo"><?php echo $datos['estudiantes_sexo'];?></span><br>

        <legend class="numeros"><b>Numeros de Telefonos:</b></legend>

        <label class="habitacion"><b>Habitacion:</b></label><br>
        <span class="habitacion"><?php echo $habitacion;?></span><br>

        <label class="celular"><b>Celular:</b></label><br>
        <span class="celular"><?php echo $celular;?></span><br>

        <label class="oficina"><b>Oficina:</b></label><br>
        <span class="oficina"><?php echo $oficina;?></span><br>

        <label class="otro"><b>Otro:</b></label><br>
        <span class="otro"><?php echo $otro;?></span><br>

        <legend class="correos"><b>Correos Electronicos:</b></legend>
        <label class="correo"><b>Principal:</b></label><br>
        <span class="correo"><?php echo $correo;?></span><br>

        <label class="correo2"><b>Otro:</b></label><br>
        <span class="correo2"><?php echo $correo2;?></span><br>

        <label class="direc"><b>Direccion:</b></label><br>
        <span class="direc"><?php echo $datos['estudiantes_direccion'];?></span><br>
    </div>
    <div class="table-content">
      <legend class="historial">Historial academico</legend>
        <?php
        require_once "./php/main.php";

        //Eliminar matricula
        if(isset($_GET['matricula_id_del'])){
            require_once "./php/matricula_eliminar.php";
        }

        if (!isset($_GET['page'])) {
            $pagina=1;
        }else{
            $pagina=(int) $_GET['page'];
            if($pagina<=1){
                $pagina=1;
            }

        }

        $pagina=limpiar_cadena($pagina);
        $url="index.php?vista=estudiante_profile&estudiante_id_up=".$id."&page=";
        $registros=5;
        $busqueda="";

        require_once './php/curso_estudiantes_lista.php';
        ?>
    </div>
</div>

<?php
    }else{
        echo '
            <script>
                alert("No podemos obtener la informacion solicitada");
                window.location = "index.php?vista=estudiantes_list"
            </script>
            ';
    }
    $check_estudiante=null;
?>