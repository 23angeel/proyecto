<?php

include 'conexion_bd.php';

$id = $_GET['id'];

$eliminar = "DELETE FROM usuarios WHERE id = $id";

mysqli_query($conexion, $eliminar);

if ($eliminar) {
	echo'
	<script>
		alert("Usuario eliminado");
		window.location = "Usuarios_creados.php"
	</script>
	';
}
?>