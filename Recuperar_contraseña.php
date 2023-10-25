<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/Recuperar_contraseña.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
	<title>¿Has olvidado la contraseña? | No puedo entrar | Escuela de Trasnporte</title>
</head>
<body>
	<form method="post" action="">
		<div>
			<h1>Recupera tu cuenta</h1><br>
			<label>Introduce tu nombre de usuario para buscar tu cuenta en la base de datos del sistema</label><br>
			<input type="text" name="name" placeholder="usuario"><br>
			<label>Ingrese su nueva contraseña</label><br>
	        <input type="password" name="password" placeholder="contraseña"><br>
	        <label>Confirmar contraseña</label><br>
	        <input type="password" name="password2" placeholder="contraseña"><br>
				</div>
				<div class="btn-actions">
	<button type="submit" name="buscar">Guardar</button>
	<a href="Iniciodeseccion.php"><button type= "button">Cancelar</button></a>
				</div>
	</form>
</body>
</html>
<?php
if(isset($_POST['buscar'])){
	$usuario = $_POST['name'];
	include 'conexion_bd.php';
	$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
	$resultado = mysqli_query($conexion, $consulta);
	$usuarios = mysqli_fetch_assoc($resultado);
	if ($usuarios) {
		$contraseña = $_POST['password'];
		$contraseña2 = $_POST['password2'];
		if ($contraseña == $contraseña2) {
			include 'conexion_bd.php';

		   //Encriptamiento de contraseña
		   $contrasena = hash('sha512', $contraseña);

		   $consulta="UPDATE usuarios SET contrasena = '$contrasena' WHERE usuario = '$usuario' ";
		   mysqli_query($conexion, $consulta);

		   echo'
		   <script>
		      alert("Cambio de contraseña exito");
		      window.location = "Iniciodeseccion.php"
		   </script>
		   '; 
		}else{
		   echo'
		   <script>
		      alert("No coinciden los datos");
		      window.location = "Recuperar_contraseña.php"
		   </script>
		   ';
		}
	}else{
	   echo'
	   <script>
	      alert("El usuario ingresado no existe");
	      window.location = "iniciodeseccion.php"
	   </script>
	   ';
	}
}

