<?php

include 'conexion_bd.php';

$id = $_GET['id'];

$eliminar = "DELETE FROM cursos WHERE id = $id";

mysqli_query($conexion, $eliminar);

if ($eliminar) {
	echo'
	<script>
		alert("Curso eliminado correctamente");
		window.location = "Cursos_admin.php"
	</script>
	';
}
?>