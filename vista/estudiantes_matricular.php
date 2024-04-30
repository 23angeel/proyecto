<head>
	<link rel="stylesheet" type="text/css" href="./css/matricular_curso.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
	<script>
		$(function(){
		// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
			$("#adicional").on('click', function(){
				$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
			});
		// Evento que selecciona la fila y la elimina 
			$(document).on("click",".eliminar",function(){
				var parent = $(this).parents().get(0);
				$(parent).remove();
			});
		});
	</script>
</head>
<?php 
	require_once "./php/main.php";

	$id = (isset($_GET['curso_id_up'])) ? $_GET['curso_id_up'] : 0;
	$id=limpiar_cadena($id);

	$check_curso=conexion();
	$check_curso=$check_curso->query("SELECT * FROM cursos WHERE curso_id='$id'");
	if($check_curso->rowCount()>0){
		$datos=$check_curso->fetch();
		$curso=$datos['curso_nombre'];
		if ($datos['curso_grado']!=0) {
                	$grado=$datos['curso_grado'];
                }else{
                	$grado="";
                }
        $trayecto=$datos['curso_mes'].$datos['curso_año'];

?>
<h1>Matricular Estudiantes</h1>
<label>¿CUANTOS ESTUDIANTES QUIERE MATRICULAR?</label>
<input type="radio" value="uno" name="matricula" onclick="matricula(this)"> UN ESTUDIANTE
<input type="radio" value="mas" name="matricula" onclick="matricula(this)"> MAS DE UN ESTUDIANTE

<div id="uno" style="display:none">
	<form method="post" action="./php/matricular.php">
		<table>
			<thead>
				<tr>
					<th>Estudiante</th>
					<th>Curso</th>
				</tr>
			</thead>
	        <tbody>
	        	<tr>
	        		<td><select name="estudiante">
						<option>Seleccionar Estudiante</option>
						<?php
						require_once "./php/main.php";
						$estudiante=conexion();
						$estudiante=$estudiante->query("SELECT * FROM estudiantes ORDER BY estudiantes_cedula");
						while($datos=$estudiante->fetch()){
							$ide=$datos['estudiantes_id'];
							$nombres=$datos['estudiantes_nombres'];
							$apellidos=$datos['estudiantes_apellidos'];
							$cedula=$datos['estudiantes_n'].$datos['estudiantes_cedula'];
						?>
						<option value="<?php echo $ide;?>"><?php echo $cedula." ".$nombres." ".$apellidos;?></option>
						<?php
						}
						?>
					</select></td>
					<td><?php echo $curso." ".$grado." ".$trayecto; ?>
	        		<input type="hidden" name="curso" value="<?php echo $id?>">
					<input type="hidden" name="teorica" value="0" required>
					<input type="hidden" name="practica" value="0" required></td>
				</tr>
			</tbody>
	    </table><br>
		<input type="submit" name="insertar" value="Matricular" class="btn btn-matricular" />
	</form>
</div>

<div id="mas" style="display:none">
	<form method="post" action="./php/matricular_estudiante.php">
		<table id="tabla">
			<thead>
				<tr>
					<th>Estudiante</th>
					<th>Curso</th>
				</tr>
			</thead>
	        <tbody>
	        	<tr>
	        		<td><select name="estudiante[]">
						<option>Seleccionar Estudiante</option>
						<?php
						require_once "./php/main.php";
						$estudiante=conexion();
						$estudiante=$estudiante->query("SELECT * FROM estudiantes ORDER BY estudiantes_cedula");
						while($datos=$estudiante->fetch()){
							$ide=$datos['estudiantes_id'];
							$nombres=$datos['estudiantes_nombres'];
							$apellidos=$datos['estudiantes_apellidos'];
							$cedula=$datos['estudiantes_n'].$datos['estudiantes_cedula'];
						?>
						<option value="<?php echo $ide;?>"><?php echo $cedula." ".$nombres." ".$apellidos;?></option>
						<?php
						}
						?>
					</select></td>
					<td><?php echo $curso." ".$grado." ".$trayecto; ?>
	        		<input type="hidden" name="curso[]" value="<?php echo $id?>">
					<input type="hidden" name="teorica[]" value="0" required>
					<input type="hidden" name="practica[]" value="0" required></td>
					<td class="eliminar"><input type="button" value="Menos -"></td>
				</tr>
			</tbody>
	    </table><br>

		<button id="adicional" name="adicional" type="button" class="btn btn-warning">Más +</button><br>
		<input type="submit" name="insertar" value="Matricular" class="btn btn-matricular" />
	</form>
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

<script>
	function matricula(elemento) {
		    if(elemento.value=="uno") {
		      document.getElementById("uno").style.display = "block";
		      document.getElementById("mas").style.display = "none";
		    }else{
		      if(elemento.value=="mas"){
		        document.getElementById("uno").style.display = "none"; 
		        document.getElementById("mas").style.display = "block";
		      }
		    }
		  }
</script>