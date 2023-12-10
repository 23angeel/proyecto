<?php
    require_once "main.php";

        #Almacenando datos
        $usuario = limpiar_cadena($_POST['name']);
        $contrasena = limpiar_cadena($_POST['password']);
        $clase = limpiar_cadena($_POST['tipo']);

        #Verificar datos obligatorios
        if($usuario=="" || $contrasena=="" || $clase==""){
            echo '
                 <script>
                    alert("No has llenado todo los campos que son obligatorios");
                    window.location = "../index.php?vista=usuario_new"
                </script>
            ';
            exit();
        }

        /*Verificando usuario*/
        $check_usuario=conexion();
        $check_usuario=$check_usuario->query("SELECT usuario_usuario FROM usuarios WHERE usuario_usuario='$usuario'");
        if($check_usuario->rowCount()>0){
            echo '
                <script>
                    alert("El usuario ingresado ya existe");
                    window.location = "../index.php?vista=usuario_new"
                </script>
            ';
            exit();
        }
        $check_usuario=null;

        #Encriptar contraseña
        $contrasena=password_hash($contrasena,PASSWORD_BCRYPT,["cost"=>10]);
        
        #GUARDAR DATOS
        $guardar_usuario=conexion();
        $guardar_usuario=$guardar_usuario->prepare("INSERT INTO usuarios(usuario_usuario, usuario_contrasena, usuario_rol) VALUES( :usuario,:contrasena, :clase)");

        $marcadores=[
            ":usuario"=>$usuario,
            ":contrasena"=>$contrasena,
            ":clase"=>$clase
        ];
        $guardar_usuario->execute($marcadores);

        if($guardar_usuario->rowCount()==1){
            echo '
                <script>
                    alert("El usuario se registro correctamente");
                    window.location = "../index.php?vista=usuario_list"
                </script>
            ';
        }else{
            echo '
                <script>
                    alert("No se pudo registrar el usuario, intentelo nuevamente");
                    window.location = "../index.php?vista=usuario_new"
                </script>
            ';
        }
        $guardar_usuario=null;
    