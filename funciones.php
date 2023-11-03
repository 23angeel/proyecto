<?php
   
include 'conexion_bd.php';

//Inicio de seccion
if (isset($_POST['inicio'])){ 
    switch ($_POST['inicio']){
        case 'acceso_user':
            acceso_user();
            break;

        case 'recuperar_contraseña':
            recuperar_contraseña();
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

function recuperar_contraseña() {

    $usuario = $_POST['usuario'];
    $contraseña = $_POST['password'];
    $contraseña2 = $_POST['password2'];
    if ($contraseña == $contraseña2) {
        include 'conexion_bd.php';

        //Encriptamiento de contraseña
        $contrasena = hash('sha512', $contraseña);

        $consulta="UPDATE usuarios SET contrasena = '$contrasena' WHERE usuario = '$usuario' ";
        mysqli_query($conexion, $consulta);

        echo'
        <script>
            alert("Cambio de contraseña exito");
            window.location = "Iniciodeseccion.php"
        </script>
        '; 
    }else{
        echo'
        <script>
            alert("No coinciden los datos");
            window.location = "Recuperar_contraseña.php"
        </script>
        ';
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


//Modulo de curso
if (isset($_POST['curso'])){ 
    switch ($_POST['curso']){

        case 'crear_curso':
            crear_curso();
            break;
    }

}

function crear_curso(){
    include 'conexion_bd.php';

    $curso = $_POST['name'];
    $año = $_POST['año'];
    $año1 = $_POST['año1'];
    $estado = 1;

    $año2 = $año."/".$año1;

    $query = "INSERT INTO cursos(nombre, año_curso, estado)
                    VALUES('$curso', '$año2', '$estado')";
    $ejecutar = mysqli_query($conexion, $query);

        if($ejecutar){
            ?>
            <script>
                alert("Curso registrado correctamente");
                window.location = "Menu_admin.php"
            </script>
            <?php
            }else {
                ?>
                <script>
                    alert("Error al crear el curso");
                    window.location = "Menu_admin.php"
                </script>
                <?php
            }
            mysqli_close($conexion);
}



