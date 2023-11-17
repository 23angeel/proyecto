<?php

session_start();
error_reporting(0);

$validar = $_SESSION['usuario'];
$rol = $_SESSION['cargo'];

if( $validar == null || $validar = ''){

  header("Location: Iniciodeseccion.php");
  die();
  
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Crear curso</title>
</head>
<body>
	<form method="post" action="funciones.php" enctype="multipart/form-data">
		<h1>Crear curso</h1>
		<label for="curso">NOMBRE DEl CURSO</label><br>
		<input required minlength="1" type="text" id="curso" name="name" placeholder="Licencia" maxlength="150"><br>

		<label for="grado">GRADO</label><br>
		<input type="number" name="grado" id="grado" placeholder="2" maxlength="10"><br>
		<b>Colocar el grado para cuando es para licencia</b><br>

		<label for="mes">MES</label> <label for="año">AÑO</label><br>
		<input required minlength="1" type="text" id="mes" name="mes" placeholder="Enero" maxlength="50"> /
		<input required minlength="1" type="number" id="año" name="año" placeholder="2024" maxlength="4"><br>

		<label>Seleccione una imagen para el curso</label><br>
		<input type="file" name="imagen"><br>

		<input type="hidden" name="curso" value="crear_curso">
		<input type="hidden" name="rol" value="<?php echo $rol;?>">

		<button type="submit" name="crear">Crear</button>
		<button type="reset">Limpiar</button>
	</form>

</body>
</html>