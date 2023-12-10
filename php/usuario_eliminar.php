<?php
	$usuario_id=limpiar_cadena($_GET['user_id_del']);

	//Verifivar usuario
	$check_usuario=conexion();
	$check_usuario=$check_usuario->query("SELECT usuario_id FROM usuarios WHERE usuario_id = '$usuario_id'");
	if ($check_usuario->rowCount()==1) {

		$eliminar_usuario=conexion();
		$eliminar_usuario=$eliminar_usuario->prepare("DELETE FROM usuarios WHERE usuario_id=:id");

		$eliminar_usuario->execute([":id"=>$usuario_id]);

		if($eliminar_usuario->rowCount()==1){
			echo '
            <script>
                alert("El usuario se elimino con exito");
                window.location = "index.php?vista=usuario_list"
            </script>
        ';
		}else{
			echo '
            <script>
                alert("No se pudo eliminar el usuario, por favor intente nuevamente");
                window.location = "index.php?vista=home"
            </script>
        ';
		}
		$eliminar_usuario=null;

	}else{
		echo '
            <script>
                alert("El usuario que intenta eliminar no existe");
                window.location = "index.php?vista=usuario_list"
            </script>
        ';
	}
	$check_usuario=null;