<head>
    <link rel="stylesheet" type="text/css" href="./css/curso_profile.css">
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
                	$grado="N/A";
                }
?>
<div class="container">
    <div class="caja">
    	<h2 class="titulo">Informacion del Curso</h2>
        <div class="button">
            <?php echo '<a href="./fpdf/cursos_pdf.php?curso_update&curso_id_up='.$id.'">Generar reporte</a><br>';?>
        </div>

    	<label><b>Nombre:</b></label><br>
    	<span><?php echo $datos['curso_nombre'];?></span><br>

        <label class="grado"><b>Grado:</b></label><br>
        <span class="grado"><?php echo $grado;?></span><br>

        <label class="mes"><b>Mes:</b></label><br>
        <span class="mes"><?php echo $datos['curso_mes'];?></span><br>

        <label class="año"><b>Año:</b></label><br>
        <span class="año"><?php echo $datos['curso_año'];?></span><br>
        <?php
        if (is_file("./Imagenes/curso/".$datos['curso_foto'])){
            echo'
            <div class="img">
                <img height="90px" src="./Imagenes/curso/'.$datos['curso_foto'].'"><br>
            </div>
            ';
        }else{
            echo'
            <div class="img">
                <img height="90px" src="./Imagenes/curso/cursos.jpeg"><br>
            </div>
            ';
        }
        ?>
    </div>
    <div class="table-content">
        <h1 class="historial">Estudiantes Registrados</h1>
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
        $url="index.php?vista=curso_profile&curso_id_up=".$id."&page=";
        $registros=5;
        $busqueda="";
        require_once './php/estudiantes_curso_lista.php';
        ?>
    </div>
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