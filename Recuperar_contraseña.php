<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>¿Has olvidado la contraseña? | No puedo entrar | Escuela de Trasnporte</title>
</head>
<body>
	<form method="post" action="">
		<div>
			<h1>Recupera tu cuenta</h1><br>
			<labeñ>Introduce tu nombre de usuario para buscar tu cuenta en la base de datos del sistema</label><br>
			<input type="text" name="name" placeholder="usuario"><br>
		</div>
	<button type="submit" name="buscar">Buscar</button></a>
	</form>
	<a href="Iniciodeseccion.php"><button>Cancelar</button></a>
</body>
</html>
<?php
if(isset($_POST['buscar'])){
	$usuario = $_POST['name'];
	include 'conexion_bd.php';
	$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
	$resultado = mysqli_query($conexion, $consulta);
	$usuario = mysqli_fetch_assoc($resultado);
	if ($usuario) {
		?>
		<!DOCTYPE html>
	   <html>
	   <head>
	      <meta charset="utf-8">
	      <meta name="viewport" content="width=device-width, initial-scale=1">
	      <title>Restablecer contraseña</title>
	   </head>
	   <body>
	      <form method="post" action="Rcontraseña.php">
	         <h1>Restablezcer contraseña</h1><br>
	         <label>Ingrese su nueva contraseña</label>
	         <input type="password" name="password" placeholder="contraseña"><br>
	         <label>Confirmar contraseña</label>
	         <input type="password" name="password2" placeholder="contraseña"><br>
	   <button name="id" value=<?php $usuario['id']?>>Editar</button>
	   </form>
	   </body>
	   </html>
	   <?php
	}else{
	   echo'
	   <script>
	      alert("El usuario ingresado no existe");
	      window.location = "iniciodeseccion.php"
	   </script>
	   ';
	}
}
?>