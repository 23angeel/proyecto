<?php
	$curso_id=limpiar_cadena($_GET['curso_id_del']);

	//Verificar curso
	$check_curso=conexion();
	$check_curso=$check_curso->query("SELECT curso_id FROM cursos WHERE curso_id = '$curso_id'");
	if ($check_curso->rowCount()==1) {

		$eliminar_curso=conexion();
		$eliminar_curso=$eliminar_curso->prepare("DELETE FROM cursos WHERE curso_id=:id");

		$eliminar_curso->execute([":id"=>$curso_id]);

		if($eliminar_curso->rowCount()==1){
			echo '
            <script>
                alert("El curso se elimino con exito");
                window.location = "index.php?vista=cursos_list"
            </script>
        ';
		}else{
			echo '
            <script>
                alert("No se pudo eliminar el curso, por favor intente nuevamente");
                window.location = "index.php?vista=home"
            </script>
        ';
		}
		$eliminar_cursos=null;

	}else{
		echo '
            <script>
                alert("El curso que intenta eliminar no existe");
                window.location = "index.php?vista=usuario_list"
            </script>
        ';
	}
	$check_curso=null;