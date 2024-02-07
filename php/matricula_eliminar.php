<?php
	$matricula_id=limpiar_cadena($_GET['matricula_id_del']);

	//Verificar curso
	$check_matricula=conexion();
	$check_matricula=$check_matricula->query("SELECT id FROM estudiantes_cursos WHERE id = '$matricula_id'");
	if ($check_matricula->rowCount()==1) {

		$eliminar_matricula=conexion();
		$eliminar_matricula=$eliminar_matricula->prepare("DELETE FROM estudiantes_cursos WHERE id=:id");

		$eliminar_matricula->execute([":id"=>$matricula_id]);

		if($eliminar_matricula->rowCount()==1){
			echo '
            <script>
                alert("El estudiante se elimino con exito del curso");
                window.location = "index.php?vista=home"
            </script>
        ';
		}else{
			echo '
            <script>
                alert("No se pudo eliminar al estudiante del curso, por favor intente nuevamente");
                window.location = "index.php?vista=home"
            </script>
        ';
		}
		$eliminar_matricula=null;

	}else{
		echo '
            <script>
                alert("La matricula que intenta eliminar no existe");
                window.location = "index.php?vista=home"
            </script>
        ';
	}
	$check_matricula=null;