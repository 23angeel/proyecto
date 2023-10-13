<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/style_usuariosCreados.css">
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
						<a href="Editar_usuario.php?id=<?php echo $fila['id']?> "><button>Editar</button></a>
						<a href="Eliminar_usuario.php?id=<?php echo $fila['id']?>"><button onclick="return Delete()">Eliminar</button></a>
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