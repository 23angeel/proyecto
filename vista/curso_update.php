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
<form method="post" action="./php/curso_editar.php">
	<h1>Editar Curso</h1>

	<input type="hidden" name="curso_id" value="<?php echo $datos['curso_id'];?>" required>

    <div class="inputBox">
    	<label for="curso">NOMBRE DEl CURSO</label>
        <input type="text" id="curso" name="name" value="<?php echo $datos['curso_nombre'];?>" required>
    </div>

    <div class="inputBox">
        <label for="grado">GRADO</label>
        <?php
        if ($datos['curso_grado']==0) {
        	?>
			<select name="grado">
				<option>Seleccionar Gradro</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
        <?php
        }elseif ($datos['curso_grado']==2) {
        	?>
			<select name="grado">
				<option>Seleccionar Gradro</option>
				<option value="2" selected>2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		<?php
		}elseif ($datos['curso_grado']==3) {
			?>
			<select name="grado">
				<option>Seleccionar Gradro</option>
				<option value="2">2</option>
				<option value="3" selected>3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		<?php
		}elseif ($datos['curso_grado']==4) {
			?>
			<select name="grado">
				<option>Seleccionar Gradro</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4" selected>4</option>
				<option value="5">5</option>
			</select>
		<?php 
		}else{
			?>
			<select name="grado">
				<option>Seleccionar Gradro</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5" selected>5</option>
			</select>
		<?php
		}
		?>

        <b>Colocar el grado para cuando es para licencia</b> 
	</div>

	<div class="dates">
	<div class="date">
		<label for="mes">MES</label> 
        <input type="text" id="mes" name="mes" value="<?php echo $datos['curso_mes'];?>"> 
	</div>
	<div class="date"> 
    	<label for="año">AÑO</label>
    	<input type="number" id="año" name="año" value="<?php echo $datos['curso_año'];?>">
	</div>        
	</div>
    <button type="submit" name="crear">Editar</button>
        
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