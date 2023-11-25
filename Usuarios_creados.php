<?php
session_start();
if($_SESSION['cargo'] == 1) { //administrador
}else{
    header("Location: Iniciodeseccion.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/style_usuariosCreados.css">
	<link rel="stylesheet" href="./css/style0.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
	<title>Usuarios-Escuela de Transporte</title>
</head>

<script type="text/javascript">
		function Delete()
		{
			var respuesta = confirm("¿Estas seguro de eliminar este usuario?");

			if (respuesta == true) {
				return true;
			}else{
				return false;
			}
		}
	</script>

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
	<div class="form">
		<section></section>
	<h1>Lista de Usuarios Creados</h1>

	<div>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>USUARIO</th>
					<th>ROL</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include 'conexion_bd.php';

				$sql = "SELECT usuarios.id, usuarios.usuario, rol.rol FROM usuarios LEFT JOIN rol ON usuarios.id_rol = rol.id";
				$datos = mysqli_query($conexion, $sql);

				if($datos -> num_rows >0){
					while($fila=mysqli_fetch_array($datos)){
				?>
				<tr>
					<td><?php echo $fila['id'];?></td>
					<td><?php echo $fila['usuario'];?></td>
					<td><?php echo $fila['rol'];?></td>

					<td>
						<a href="Editar_usuario.php?id=<?php echo $fila['id']?> "><img class="img-btn-edit" src="./Imagenes/edit.svg"></a>
						<a href="Eliminar_usuario.php?id=<?php echo $fila['id']?>"><img class="img-btn-delete" onclick="return Delete()" src="./Imagenes/eliminar.svg"></button></a>
					</td>
				</tr>
				<?php
			}
		}else{

			?>
			<tr>
				<td>No existen registros</td>
			</tr>
			<?php
		}
		?>
			</tbody>
		</table>
	</div>
	</div>
</body>
</html>