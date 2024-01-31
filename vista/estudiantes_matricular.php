<head>
	<link rel="stylesheet" type="text/css" href="./css/editar_curso.css">
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
<form method="post" action="./php/matricular_estudiante.php">
	<h1>Matricular Estudiantes <?php echo $datos['curso_nombre']." ".$grado;?></h1>
	<input type="hidden" name="curso_id" value="<?php echo $datos['curso_id'];?>" required>

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
    $url="index.php?vista=estudiantes_list_matricular&page=";
    $registros=15;
    $busqueda="";
    require_once './php/estudiantes_lista_matricula.php';
	?>
	<button type="submit" name="matricular">Matricular</button>
        
</form>

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