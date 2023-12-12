<?php
if ($_SESSION['rol']== 1) {
?>
<head>
	<link rel="stylesheet" type="text/css" href="./css/style._editarUsuario.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<?php
	require_once "./php/main.php";

	$id = (isset($_GET['user_id_up'])) ? $_GET['user_id_up'] : 0;
	$id=limpiar_cadena($id);

	$check_usuario=conexion();
	$check_usuario=$check_usuario->query("SELECT * FROM usuarios WHERE usuario_id='$id'");
	if($check_usuario->rowCount()>0){
		$datos=$check_usuario->fetch();
?>
<div class="container">
	<form method="post" action="./php/usuario_editar.php" autocomplete="off">
		<section></section>
		<h1>Editar Usuario</h1>
		<div class="inputBox">
			<input type="hidden" name="usuario_id" value="<?php echo $datos['usuario_id'];?>" required>

			<label>Nombre de usuario</label>
			<input type="text" name="name" value="<?php echo $datos['usuario_usuario'];?>" required>
		</div>
		<div class="inputBox">
			<p>
				SI desea actualizar la clave de este usuario por favor llene el campo. Si NO desea actualizar la clave deje el campo vacíos.
			</p>
			<label>Contraseña</label>
			<input type="password" name="password" value="">
		</div>

		<div class="inputBox">
			<label>Rol en el sistema</label>
			<div class="roles">
				<?php
				if ($datos['rol_id'] == 1) {
				?>
				<label>
					ADMINISTRADOR<input type="radio" name="tipo" value="1" checked>
				</label>

				<label>
					USUARIO<input type="radio" name="tipo" value="2">
				</label>
				<?php
            	}else{
                ?>
                <label>
        			ADMINISTRADOR<input type="radio" name="tipo" value="1">
            	</label>

            	<label>
        			USUARIO<input type="radio" name="tipo" value="2" checked>
            	</label>
            	<?php
            	}
        		?>
			</div>
	</div>
	<p>
		Para poder actualizar los datos de este usuario por favor ingrese su USUARIO y CLAVE con la que ha iniciado sesion
	</p>
	<label>Nombre de usuario</label>
	<input type="text" name="usuario" required>
	<label>Contraseña</label>
	<input type="password" name="clave" value="" required><br> 

	<button type="submit" name="editar" >Editar</button>

	</form>
</div>
<?php
	}else{
		echo '
            <script>
                alert("No podemos obtener la informacion solicitada");
                window.location = "index.php?vista=usuario_list"
            </script>
            ';
	}
	$check_usuario=null;
?>
<?php
}else{
	header("Location: index.php?vista=login");
}
?>