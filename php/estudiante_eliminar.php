<?php
	$estudiante_id=limpiar_cadena($_GET['estudiante_id_del']);

	//Verificar estudiante
	$check_estudiante=conexion();
	$check_estudiante=$check_estudiante->query("SELECT estudiantes_id FROM estudiantes WHERE estudiantes_id = '$estudiante_id'");
	if ($check_estudiante->rowCount()==1) {

		$eliminar_estudiante=conexion();
		$eliminar_estudiante=$eliminar_estudiante->prepare("DELETE FROM estudiantes WHERE estudiantes_id=:id");

		$eliminar_estudiante->execute([":id"=>$estudiante_id]);

		if($eliminar_estudiante->rowCount()==1){
			echo '
            <script>
                alert("El estudiante se elimino con exito");
                window.location = "index.php?vista=estudiantes_list"
            </script>
        ';
		}else{
			echo '
            <script>
                alert("No se pudo eliminar el estudiante, por favor intente nuevamente");
                window.location = "index.php?vista=home"
            </script>
        ';
		}
		$eliminar_estudiante=null;

	}else{
		echo '
            <script>
                alert("El estudiante que intenta eliminar no existe");
                window.location = "index.php?vista=estudiantes_list"
            </script>
        ';
	}
	$check_estudiantes=null;