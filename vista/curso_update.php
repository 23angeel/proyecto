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

    <div class="btns">
    	<label for="curso">NOMBRE DEL CURSO <span>*</span></label>
        <input type="text" id="curso" name="name" value="<?php echo $datos['curso_nombre'];?>" required>

        <label for="grado">GRADO <span>*</span></label>
        <input type="number" name="grado" id="grado" value="<?php echo $grado;?>">
        </div>
        <div class="texto">
        <span1>Colocar el grado cuando es para licencia</span1>
      </div><br>


	<div class="btns">
		<label for="mes">MES <span>*</span></label> 
        <input type="text" id="mes" name="mes" value="<?php echo $datos['curso_mes'];?>"> 
	
    	<label for="año">AÑOS <span>*</span></label>
    	<input type="number" id="año" name="año" value="<?php echo $datos['curso_año'];?>">

    	 <div class="button-container">
        <div class="btns">
          <p>Los campos obligatorios están marcados con un asterisco rojo *</p>
        </div>
      </div>
	        
	</div>
    <div class="btns">
	<button type="submit" name="editar" >Editar</button>
	</div>
        
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