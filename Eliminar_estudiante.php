<?php

include 'conexion_bd.php';

$id = $_GET['id'];

$eliminar = "DELETE FROM estudiantes WHERE id = $id";

mysqli_query($conexion, $eliminar);

if ($eliminar) {
	echo'
	<script>
		alert("estudiantes eliminado correctamente");
		window.location = "Estudiantes_admin.php"
	</script>
	';
}
?>