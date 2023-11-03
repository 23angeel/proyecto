<?php
session_start();
error_reporting(0);
$validar = $_SESSION['usuario'];
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
	<form method="post" action="funciones.php">
		<h1>Crear curso</h1>
		<label for="curso">NOMBRE DEl CURSO</label><br>
		<input required minlength="1" type="text" id="curso" name="name" maxlength="150"><br>

		<label for="año">AÑO DEL CURSO</label><br>
		<input required minlength="1" type="number" id="año" name="año" maxlength="4"> / <input required minlength="1" type="number" id="año" name="año1" maxlength="4"><br>

		<input type="hidden" name="curso" value="crear_curso">

		<button type="submit" name="crear">Crear</button>
		<button type="reset">Limpiar</button>
	</form>

</body>
</html>