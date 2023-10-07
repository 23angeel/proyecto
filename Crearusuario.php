<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ESCUELA DEL TRANSPORTE-CREAR USUARIO</title>
	<link rel="stylesheet" type="text/css" href="style1.cs">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<body>
	<div>
	<section class="img-back"></section>
	<div class="container">
		<section class="img-intt"> </section>
	<form method="post" action="">
		<h1>CREAR USUARIO</h1>

		<div  class="input-box">
			<div>
				<label>NOMBRE DE USUARIO</label><br>
				<input type="text" name="name"><br>
			</div>
			<div>
				<label>CONTRASEÑA</label><br>
				<input type="password" name="password"><br>
			</div>
		
		<label>ROL EN EL SISTEMA</label><br>
		ADMINISTRADOR<input type="radio" name="tipo" value="1">
		USUARIO<input type="radio" name="tipo" value="2">

		
		<div class="btns">
		<button type="submit" name="crear"> Crear </button>
		<button type="reset"> limpiar </button>
		</div>	 
	</form>
	</div>
</body>
</html>

<?php
		if(isset($_POST['crear'])){
			if (strlen($_POST['name']) >= 1 && strlen($_POST['password']) >= 1) {

			include 'conexion_bd.php';

			$usuario = $_POST['name'];
			$contrasena = $_POST['password'];
			$clase = $_POST['tipo'];

			//Encriptamiento de contraseña
			$contrasena = hash('sha512', $contrasena);

			$query = "INSERT INTO usuarios(usuario, contrasena, id_rol)
					  VALUES('$usuario', '$contrasena', '$clase')";

			$ejecutar = mysqli_query($conexion, $query);

			if($ejecutar){
				?>
				<h3>Usuario registrados correctamente</h3>
				<?php
			}else{
				?>
				<h3>Error al registrar el usuario</h3>
				<?php
			}
			mysqli_close($conexion);

				} else{
					?>
					<h3> Por favor complete los campos</h3>
					<?php
				}
			}
?>