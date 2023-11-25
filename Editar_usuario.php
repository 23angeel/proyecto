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
	<link rel="stylesheet" href="./css/style0.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
	<title>EDITAR USUARIO-ESCUELA DE TRANSPORTE </title>
</head>
<body>
     <nav class="nav">

        <div class="nav__container">

            <ul class="dropdown" id="menu">

                <li>
                    <a href="#" class="logo">
                        <img src="./Imagenes/zyro-image (2).png">
                        <span href="#" class="nav__link">Escuela de Transporte</span>
                    </a>
                </li>

                <li class="dropdown__list">
                    <a href="#" class="dropdown__link">
                        <img src="./Imagenes/Perfiles_12.svg" width="45">
                        <span class="dropdown__span">Usuario</span>
                        <img src="./Imagenes/arrow12.svg" width="30" class="dropdown__arrow">

                        <input type="checkbox" class="dropdown__check">
                    </a>

                    <div class="dropdown__content">

                        <ul class="dropdown__sub">

                            <li class="dropdown__li">
                                <a href="./Crearusuario.php" class="dropdown__anchor">Registrar</a>
                            </li>
                            <li class="dropdown__li">
                                <a href="Usuarios_creados.php" class="dropdown__anchor">Consultar</a>
                            </li>

                        </ul>

                <li class="dropdown__list">
                    <a href="#" class="dropdown__link">
                        <img src="./Imagenes/cursos_12.svg" width="45">
                        <span class="dropdown__span">Cursos</span>
                        <img src="./Imagenes/arrow12.svg" width="30" class="dropdown__arrow">

                        <input type="checkbox" class="dropdown__check">
                    </a>

                    <div class="dropdown__content">

                        <ul class="dropdown__sub">

                            <li class="dropdown__li">
                                <a href="Crearcurso.php" class="dropdown__anchor">Resgitrar</a>
                            </li>
                            <li class="dropdown__li">
                                <a href="Cursos_admin.php" class="dropdown__anchor">Consultar</a>
                            </li>

                        </ul>

                    </div>
                </li>

                <li class="dropdown__list">
                    <a href="#" class="dropdown__link">
                        <img src="./Imagenes/Estudiantes_12.svg" width="45">
                        <span class="dropdown__span">Estudiante</span>
                       <img src="./Imagenes/arrow12.svg" width="30" class="dropdown__arrow">

                        <input type="checkbox" class="dropdown__check">
                    </a>

                    <div class="dropdown__content">

                        <ul class="dropdown__sub">

                            <li class="dropdown__li">
                                <a href="Crearestudiante.php" class="dropdown__anchor">Resgitrar</a>
                            </li>
                            <li class="dropdown__li">
                                <a href="Estudiantes_admin.php" class="dropdown__anchor">Consultar</a>
                            </li>
                          

                        </ul>

                    </div>

                </li>
                 <li class="dropdown__list">
                    <a href="#" class="dropdown__link">
                        <img src="./Imagenes/controlde_12.svg" width="45">
                        <span class="dropdown__span">Control de Estudios</span>
                    </a>
                </li>
                <br><br>
                 <li class="dropdown__list">
                    <a href="iniciodeseccion.php" class="dropdown__link">
                        <img src="./Imagenes/cerrar (12).svg" width="45">
                        <span class="dropdown__span">Cerrar sesión</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
<div class="container">
 <form method="post" action="funciones.php">
		<section></section>
		<h1>EDITAR USUARIO</h1>

    <div class="inputBox">
		<label>Nombre de usuario</label>
		<input type="text" name="name" value="<?php echo $usuario['usuario'];?>"required>
		  </div>

			<div class="inputBox">
		<label>Contraseña</label>
		<input type="password" name="password" value="<?php echo $usuario['contrasena'];?>"required>
			</div>

    <div class="inputBox">
		<label>Rol en el sistema</label>
		
		<div class="roles">
			<label>
		Administrador<input type="radio" name="tipo" value="1">
			</label>
			<label>
		Usuario<input type="radio" name="tipo" value="2">
			</label>
		 </div>
		<input type="hidden" name="accion" value="editar_usuario">
        <input type="hidden" name="id" value="<?php echo $id;?>">
		</div>
		<?php
		if ($usuario['id_rol'] == 1) {
		?>
		ADMINISTRADOR<input type="radio" name="tipo" value="1" checked>
		USUARIO<input type="radio" name="tipo" value="2">
		<?php
			}else{
				?>
				ADMINISTRADOR<input type="radio" name="tipo" value="1">
				USUARIO<input type="radio" name="tipo" value="2" checked>
				<?php
			}
		?>
		<button type="submit" name="editar" >Editar</button>
	</form>

</div>

</body>
</html>