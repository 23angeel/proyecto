<head>
	<link rel="stylesheet" type="text/css" href="./css/perfil_curso.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<?php
	require_once "./php/main.php";

	$id = (isset($_GET['curso_id_up'])) ? $_GET['curso_id_up'] : 0;
	$id=limpiar_cadena($id);

	$check_curso=conexion();
	$check_curso=$check_curso->query("SELECT * FROM cursos WHERE curso_id='$id'");
	if($check_curso->rowCount()>0){
		$datos=$check_curso->fetch();
		if ($datos['curso_grado']!=0) {
                	$grado=$datos['curso_grado'];
                }else{
                	$grado="";
                }
?>
<div>
	<h5>Informacion del Curso</h5>
    <a href="">Hacer PDF</a>
</div>
<div>
	<div class="inputBox">
    	<label><b>Nombre</b></label><br>
    	<div><?php echo $datos['curso_nombre'];?></div>
    </div>
<div class="inputBox">
    <label><b>Grado</b></label><br>
    <div><?php echo $grado;?></div><br>
</div>

    <label><b>Trayecto</b></label><br>
    <div><?php echo $datos['curso_mes']."/".$datos['curso_año'];?></div><br>
    <?php
    if (is_file("./Imagenes/curso/".$datos['curso_foto'])){
    ?>
    <div><img height="50px" src="./Imagenes/curso/'..'"></div><br>
    <?php
	}else{
	?>
    <div><img height="50px" src="./Imagenes/curso/curso.png"></div><br>
    <?php
	}
	?>
</div>
<div>
	<legend>Estudiantes Registrados</legend>
	<?php
	if (!isset($_GET['page'])) {
		$pagina=1;
    }else{
        $pagina=(int) $_GET['page'];
        if($pagina<=1){
            $pagina=1;
        }
    }

    $pagina=limpiar_cadena($pagina);
    $url="index.php?vista=estudiantes_cursos_list&page=";
    $registros=15;
    $busqueda="";
    require_once './php/estudiantes_curso_lista.php';
?>
</div>
<?php
	}else{
		echo '
            <script>
                alert("No podemos obtener la informacion solicitada");
                window.location = "index.php?vista=cursos_list"
            </script>
            ';
	}
	$check_curso=null;
?>