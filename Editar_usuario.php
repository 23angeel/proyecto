<?php
session_start();
if($_SESSION['cargo'] == 1) {//administrador

}else{
    header("Location: Iniciodeseccion.php");
}

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
	<link rel="stylesheet" href="./css/style3.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
	<title>EDITAR USUARIO-ESCUELA DE TRANSPORTE </title>
</head>
<body>
<nav>
        <ul class="cont-ul">
            <li>INICIO</li>
            <li class="develop">
                CURSOS 
                <ul class="ul-second">
                    <li class="back">Resgistrar</li>
                    <li>Consultar</li>
                </ul>
            </li>
            <li class="develop">
                ESTUDIANTE
                <ul class="ul-second">
                    <li class="back">Resgistrar</li>
                    <li>Consultar</li>
                </ul>
            </li>
            <li>CONTROL DE ESTUDIOS</li>
        </ul>
    </nav>
<div class="container">
 <form method="post" action="">
		<section></section>
		<h1>EDITAR USUARIO</h1>

		<label>NOMBRE DE USUARIO</label>
		<input type="text" name="name" value="<?php echo $usuario['usuario'];?>"required>

		<label>CONTRASEÑA</label>
		<input type="password" name="password">

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
		<input type="hidden" name="accion" value="editar_usuario">
        <input type="hidden" name="id" value="<?php echo $id;?>">

		<button type="submit" name="editar" >Editar</button>
	</form>

</div>

</body>
</html>