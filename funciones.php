<?php
   
include 'conexion_bd.php';

//Inicio de seccion
if (isset($_POST['inicio'])){ 
    switch ($_POST['inicio']){
        case 'acceso_user':
            acceso_user();
            break;
    }
}


function acceso_user() {
    if (strlen($_POST['usuario']) >= 1 && strlen($_POST['password']) >= 1) {
        
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['password'];

        $contraseña = hash('sha512', $contraseña);

        include 'conexion_bd.php';

        $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contraseña'");
        $detalles = mysqli_fetch_array($consulta);

        if ($detalles) {
            session_start();
            $_SESSION['usuario'] = $detalles['usuario'];
            $_SESSION['cargo'] = $detalles['id_rol'];

            if ($_SESSION['cargo'] == 1) { //admin
               header("Location: Menu_admin.php");
            }
            if ($_SESSION['cargo'] == 2) { //usuario
               header("Location: Menu.php");
            }     
        }else{
            ?>
            <script>
                alert("El usuario ingresado no existe en el sistema");
                window.location = "Iniciodeseccion.php"
            </script>
             <?php
        }
    }else{
         ?>
         <script>
            alert("Por favor complete los campos");
        </script>
         <?php
    }
}

//Modulo de usuario
if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){

        case 'crear_usuario':
            crear_usuario();
            break; 

            case 'editar_usuario';
            editar_usuario();
    
            break;

	}

}

function editar_usuario() {
    include 'conexion_bd.php';

    $id = $_POST['id'];
    $usuario = $_POST['name'];
    $contraseña = $_POST['password'];
    $clase = $_POST['tipo'];

    //Encriptamiento de contraseña
    $contrasena = hash('sha512', $contraseña);

    $consulta="UPDATE usuarios SET usuario = '$usuario', contrasena = '$contrasena', id_rol = '$clase'  WHERE id = '$id' ";

    mysqli_query($conexion, $consulta);

    echo'
    <script>
        alert("Usuario editado correctamente");
        window.location = "Usuarios_creados.php"
    </script>
    ';
}

function crear_usuario() {
    if (strlen($_POST['name']) >= 1 && strlen($_POST['password']) >= 1) {

        include 'conexion_bd.php';

        $usuario = $_POST['name'];
        $contrasena = $_POST['password'];
        $clase = $_POST['tipo'];

        //Encriptamiento de contraseña
        $contrasena = hash('sha512', $contrasena);

        $query = "INSERT INTO usuarios(usuario, contrasena, id_rol)
                    VALUES('$usuario', '$contrasena', '$clase')";
        
        //Verificar que el usuario no se repita en la base de datos
        $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
        if(mysqli_num_rows($verificar_usuario) > 0){
            ?>
            <script>
                alert("Ese nombre de usuario ya esta registrado, intente con otro diferente");
                window.location = "Crearusuario.php"
            </script>
            <?php
            exit();
            mysqli_close($conexion);
        }

        $ejecutar = mysqli_query($conexion, $query);

        if($ejecutar){
            ?>
            <script>
                alert("Usuario registrados correctamente");
                window.location = "Usuarios_creados.php"
            </script>
            <?php
            }else {
                ?>
                <script>
                    alert("Error al registrar el usuario");
                    window.location = "Crearusuario.php"
                </script>
                <?php
            }
            mysqli_close($conexion);

    } else{
        ?>
        <script>
            alert("Por favor complete los campos");
        </script>
        <?php
    }
}