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
	<title>EDITAR USUARIO-ESCUELA DE TRANSPORTE </title>
</head>
<body>
	<form method="post" action="">
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

	$consulta="UPDATE usuarios SET usuario = '$usuario', contrasena = '$contraseña', id_rol = '$clase'  WHERE id = '$id' ";

	mysqli_query($conexion, $consulta);

	?>
	<p>El usuario editado con exito</p>
	<?php
}
?>