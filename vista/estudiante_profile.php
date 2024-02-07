<head>
	
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
<div>
	<h5>Informacion del Estudiante</h5>
	<a href="">Hacer PDF</a>
</div>
<div>
    <label><b>Fecha de Registro</b></label><br>
    <div><?php echo $datos['estudiantes_inscripcion'];?></div><br>

    <label><b>Cedula de Identidad</b></label><br>
    <div><?php echo $datos['estudiantes_cedula'];?></div><br>

    <label><b>Nombres</b></label><br>
    <div><?php echo $datos['estudiantes_nombres'];?></div><br>

    <label><b>Apellidos</b></label><br>
    <div><?php echo $datos['estudiantes_apellidos'];?></div><br>

    <label><b>Fecha de Naciemiento</b></label><br>
    <div><?php echo $datos['estudiantes_naciemineto'];?></div><br>

    <label><b>Sexo</b></label><br>
    <div><?php echo $datos['estudiantes_sexo'];?></div><br>

    <legend><b>Numeros de Telefonos</b></legend>
    <label><b>Habitacion</b></label><br>
    <div><?php echo $habitacion;?></div><br>

    <label><b>Celular</b></label><br>
    <div><?php echo $celular;?></div><br>

    <label><b>Oficina</b></label><br>
    <div><?php echo $oficina;?></div><br>

    <label><b>Otro</b></label><br>
    <div><?php echo $otro;?></div><br>

    <legend><b>Correos Electronicos</b></legend>
    <label><b>Principal</b></label><br>
    <div><?php echo $correo;?></div><br>

    <label><b>Otro</b></label><br>
    <div><?php echo $correo2;?></div><br>

    <label><b>Direccion</b></label><br>
    <div><?php echo $datos['estudiantes_direccion'];?></div><br>
</div>
<div>
  <legend>Historia Academica</legend>
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
    $registros=15;
    $busqueda="";

    require_once './php/curso_estudiantes_lista.php';
?>
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