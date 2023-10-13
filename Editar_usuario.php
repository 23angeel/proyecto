<?php

$id= $_GET['id'];
include 'conexion_bd.php';
$consulta= "SELECT * FROM usuarios WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/style._editarUsuario.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
	<title>EDITAR USUARIO-ESCUELA DE TRANSPORTE </title>
</head>
<body>
	<form method="post" action="">
		<section></section>
		<h1>EDITAR USUARIO</h1>

		<label>NOMBRE DE USUARIO</label>
		<input type="text" name="name" value="<?php echo $usuario['usuario'];?>"required>

		<label>CONTRASEÑA</label>
		<input type="password" name="password" value="<?php echo $usuario['contrasena'];?>"required>

		<label>ROL EN EL SISTEMA</label><br>
		ADMINISTRADOR<input type="radio" name="tipo" value="1">
		USUARIO<input type="radio" name="tipo" value="2">

		<?php
		if ($usuario['id_rol'] == 1) {
		?>
				<p>El usuario tiene el rol de administrador</p>
				<?php
			}else{
				?>
				<p>El usuario tiene el rol de usuario</p>
				<?php
			}
		?>

		<button type="submit" name="editar" >Editar</button>
	</form>

</body>
</html>

<?php
if(isset($_POST['editar'])){

	include 'conexion_bd.php';

	$usuario = $_POST['name'];
	$contraseña = $_POST['password'];
	$clase = $_POST['tipo'];

	//Encriptamiento de contraseña
	$contrasena = hash('sha512', $contraseña);

	$consulta="UPDATE usuarios SET usuario = '$usuario', contrasena = '$contrasena', id_rol = '$clase'  WHERE id = '$id' ";

	mysqli_query($conexion, $consulta);

	echo'
	<script>
		alert("Usuario editado correctamente");
		window.location = "Usuarios_creados.php"
	</script>
	';
}
?>