<?php
	require_once "../include/session_start.php";
	require_once "main.php";

	$id=limpiar_cadena($_POST['usuario_id']); 

	// Verificar el usuario 
	$check_usuario=conexion();
	$check_usuario=$check_usuario->query("SELECT * FROM usuarios WHERE usuario_id='$id'");
	if ($check_usuario->rowCount()<=0) {
		echo '
            <script>
                alert("El usuario no existe en el sistema");
                window.location = "index.php?vista=home"
            </script>
        ';
        exit();
	}else{
		$datos=$check_usuario->fetch();
	}
	$check_usuario=null;

	$admin_usuario=limpiar_cadena($_POST['nombre']);
	$admin_contraseña=limpiar_cadena($_POST['contraseña']);

	//Verificar campos obligatorios
	if ($admin_usuario=="" || $admin_contraseña=="") {
		echo '
            <script>
                alert("No has llenado todos los campos obligatorios que corresponden a su USUARIO y CONTRASEÑA");
                window.location = "../index.php?vista=usuario_list"
            </script>
        ';
        exit();
	}

	//Verificando admin
	$check_admin=conexion();
	$check_admin=$check_admin->query("SELECT usuario_usuario, usuario_contrasena FROM usuarios WHERE usuario_usuario='$admin_usuario' AND usuario_id='".$_SESSION['id']."'");

	if ($check_admin->rowCount()==1) {
		$check_admin=$check_admin->fetch();

		if ($check_admin['usuario_usuario']!=$admin_usuario || !password_verify($admin_contraseña,$check_admin['usuario_contrasena'])) {
			echo '
            <script>
                alert("USUARIO o CONTRASEÑA DE administrador incorrectos");
                window.location = "../index.php?vista=usuario_list"
            </script>
        ';
        exit();
		}
		
	}else{
		echo '
            <script>
                alert("USUARIO o CONTRASEÑA DE administrador incorrectos");
                window.location = "../index.php?vista=usuario_list"
            </script>
        ';
        exit();
	}
	$check_admin=null;

	#Almacenando datos
    $usuario = limpiar_cadena($_POST['name']);
    $contrasena = limpiar_cadena($_POST['password']);
    $clase = limpiar_cadena($_POST['tipo']);

    #Verificar datos obligatorios
    if($usuario=="" || $clase==""){
    	echo '
            <script>
                alert("No has llenado todo los campos que son obligatorios");
                window.location = "../index.php?vista=usuario_list"
            </script>
        ';
        exit();
    }

    //Verficando usuario
    if ($usuario!=$datos['usuario_usuario']) {
    	$check_usuario=conexion();
	    $check_usuario=$check_usuario->query("SELECT usuario_usuario FROM usuarios WHERE usuario_usuario='$usuario'");
	    if ($check_usuario->rowCount()>0) {
	    	echo '
            <script>
                alert("El usuario ingresado ya se encuentra registrado, por favor elija otro");
                window.location = "../index.php?vista=usuario_list"
            </script>
        ';
        exit();
	    }
    }

    //Verificando clave
    if ($contrasena!=""){
    	$contrasena=password_hash($contrasena,PASSWORD_BCRYPT,["cost"=>10]);
    }else{
    	$contrasena=$datos['usuario_contrasena'];

    }

    //Editar datos
    $editar_usuario=conexion();
    $editar_usuario=$editar_usuario->prepare("UPDATE usuarios SET usuario_usuario=:usuario, usuario_contrasena=:contrasena, rol_id=:clase WHERE usuario_id=:id");

    $marcadores=[
    	":id"=>$id,
        ":usuario"=>$usuario,
        ":contrasena"=>$contrasena,
        ":clase"=>$clase
        ];

        if ($editar_usuario->execute($marcadores)){
        	echo '
            <script>
                alert("El usuario fue editado correctamente");
                window.location = "../index.php?vista=usuario_list"
            </script>
        ';
        }else{
        	echo '
            <script>
                alert("¡Ocurrio un error! No se pudo editar el usuario");
                window.location = "../index.php?vista=usuario_list"
            </script>
        ';
        }
        $editar_usuario=null;

