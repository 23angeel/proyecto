<?php
	#Almacenando datos
    $usuario = limpiar_cadena($_POST['usuario']);
    $contrasena = limpiar_cadena($_POST['password']);

    #Verificar datos obligatorios
        if($usuario=="" || $contrasena==""){
            echo '
                 <script>
                    alert("No has llenado todo los campos que son obligatorios");
                    window.location = "../index.php?vista=usuario_new"
                </script>
            ';
            exit();
        }

        $check_usuario=conexion();
        $check_usuario=$check_usuario->query("SELECT * FROM usuarios WHERE usuario_usuario='$usuario'");
        if ($check_usuario->rowCount()==1) {
        	$check_usuario=$check_usuario->fetch();

        	if ($check_usuario['usuario_usuario']==$usuario && password_verify($contrasena, $check_usuario['usuario_contrasena'])) {

        		$_SESSION['id']=$check_usuario['usuario_id'];
        		$_SESSION['usuario']=$check_usuario['usuario_usuario'];
        		$_SESSION['rol']=$check_usuario['usuario_rol'];

        		if (headers_sent()) {
        			echo "<script> window.location.href='index.php?vista=home'; </script>";
        		}else{
        			header("Location: index.php?vista=home");

        		}
        		
        	}else{
        		echo '
                 <script>
                    alert("El usuario o clave ingresado son incorrecta");
                    window.location = "index.php?vista=login"
                </script>
            ';
        	}
        	
        }else{
        	echo '
                 <script>
                    alert("El usuario ingresado no existe en el sistema");
                    window.location = "index.php?vista=login"
                </script>
            ';

        }
        $check_usuario=null;