<?php
require_once "main.php";
   #Almacenando datos
    $clave_1 = limpiar_cadena($_POST['password']);
    $clave_2 = limpiar_cadena($_POST['password2']);
    $usuario = limpiar_cadena($_POST['usuario']);

    #Verificar datos obligatorios
        if($clave_1=="" || $clave_2=""){
            echo '
                 <script>
                    alert("No has llenado todo los campos que son obligatorios");
                    window.location = "index.php?vista=login"
                </script>
            ';
            exit();
        }

      #Verificar que las contraseñas coincidan
        if ($clave_1!=$clave_2) {
            $clave=password_hash($clave_1,PASSWORD_BCRYPT,["cost"=>10]);
        }else{
            echo '
                <script>
                    alert("Las contraseñas que ha ingresado no coinciden");
                    window.location = "../index.php?vista=login"
                </script>
            ';
        }


    /*Editar contraseña*/
    $recuperar_contraseña=conexion();
    $recuperar_contraseña=$recuperar_contraseña->prepare("UPDATE usuarios SET usuario_contrasena=:clave WHERE usuario_usuario=:usuario");

    $marcadores=[
    ":clave"=>$clave,
    "usuario"=>$usuario
    ];

    if ($recuperar_contraseña->execute($marcadores)){
        echo '
            <script>
                  alert("Cambio de contraseña exitoso");
                window.location = "../index.php?vista=login"
            </script>
        ';
    }else{
         echo '
            <script>
                alert("¡Ocurrio un error! No se pudo cambiar la contraseña");
                window.location = "../index.php?vista=login"
            </script>
        ';
    }
    $recuperar_contraseña=null;