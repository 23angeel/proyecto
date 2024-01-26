<head>
  	<link rel="stylesheet" type="text/css" href="./css/editar_estudiante.css">
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
?>
<form method="post" action="./php/estudiante_editar.php">
	<h1>Editar Estudiante</h1>

	<input type="hidden" name="estudiantes_id" value="<?php echo $datos['estudiantes_id'];?>" required>

	<label for="fecha">Fecha de inscripcion:</label>
    <input type="date" name="inscripcion" id="fecha" value="<?php echo $datos['estudiantes_inscripcion'];?>"required><br>
    <div class="inputBox">
    	<div class="btns">
    		<label for="nombre">Nombres:</label>
    		<input type="text" name="name" id="nombre" value="<?php echo $datos['estudiantes_nombres'];?>"required><br>
    		<label for="ape">Apellidos:</label>
    		<input type="text" name="ape" id="ape" value="<?php echo $datos['estudiantes_apellidos'];?>"required><br>
    	</div><br>

    	<div class="btns">
    		<label for="id">Cedula de Identidad:</label>
    		<?php
    		if ($datos['estudiantes_n'] == "V-") {
    		?>
    		<select name="cedula">
            	<option value="V-" selected>V-</option>
            	<option value="E-">E-</option>
        	</select>
        	<?php
        	}else{
        		?>
        		<select name="cedula">
            		<option value="V-">V-</option>
            		<option value="E-" selected>E-</option>
            	</select>
        	<?php
      		}
    		?>
    		<input type="text" name="cedu" id="id" value="<?php echo $datos['estudiantes_cedula'];?>"required><br>

    		<label for="nacimiento">Fecha de Nacimiento:</label>
    		<input type="date" name="nacimiento" id="nacimiento" value="<?php echo $datos['estudiantes_naciemineto'];?>"required>

    		<label>Sexo:</label>
    		<?php
		    if ($datos['estudiantes_sexo'] == "F") {
		    ?>
		    Femenino<input type="radio" class="radio" name="tipo" value="F" checked> </span>
		    Masculino<input type="radio" class="radio" name="tipo" value="M"></span><br>
		    <?php
      		}else{
	        ?>
	        Femenino<input type="radio" class="radio" name="tipo" value="F"> </span>
	        Masculino<input type="radio" class="radio" name="tipo" value="M" checked></span><br>
	        <?php
	      	}
	    	?>
    </div>
    <label>Numeros de Telefono:</label>
    <div class="btns">
    	Habitacion:<input type="number" name="habit" value="<?php echo $datos['estudiantes_habitacion'];?>"><br>
    	Celular:<input type="number" name="celu" value="<?php echo $datps['estudiantes_celular'];?>"><br>
    </div><br>
    <div class="btns">
    	Oficina:<input type="number" name="ofi" value="<?php echo $datos['estudiantes_oficia'];?>"><br>
    	Otro:<input type="number" name="otro" value="<?php echo $datos['estudiantes_otro'];?>"><br>
    </div><br>

    <label>Correos Electronicos:</label>
    <div class="btns">
    <span>Principal:<input type="email" name="correo" value="<?php echo $datos['estudiantes_correo'];?>" required></span><br><br>
    <span>Otro:<input type="email" name="correo2" value="<?php echo $datos['estudiantes_correo2'];?>"></span><br>
    </div>

    <label>Direccion de Habitacion</label>
    <textarea name="direc" maxlength="100"><?php echo $datos['estudiantes_direccion'];?></textarea><br>
    <button type="submit" name="editar">Editar</button>
</form>
<?php
	}else{
		echo '
            <script>
                alert("No podemos obtener la informacion solicitada");
                window.location = "index.php?vista=estudiantes_list"
            </script>
            ';
	}
	$check_estudiantes=null;
?>