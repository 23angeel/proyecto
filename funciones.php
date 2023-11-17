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

            case 'eliminar_usuario';
            eliminar_usuario();
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

function eliminar_usuario(){

    include 'conexion_bd.php';

    $id = $_POST['id'];

    $eliminar = "DELETE FROM usuarios WHERE id = $id";

    mysqli_query($conexion, $eliminar);

    if ($eliminar) {
        echo'
        <script>
            alert("Usuario eliminado");
            window.location = "Usuarios_creados.php"
        </script>
        ';
    }
}

//Modulo de curso
if (isset($_POST['curso'])){ 
    switch ($_POST['curso']){

        case 'crear_curso':
            crear_curso();
            break;

        case 'editar_curso':
            editar_curso();
            break;
    }

}

function crear_curso(){
    include 'conexion_bd.php';
    $rol = $_POST['rol'];

    $curso = $_POST['name'];
    $grado = $_POST['grado'];
    $mes = $_POST['mes'];
    $año = $_POST['año'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $estado = 1;

    $query = "INSERT INTO cursos(nombre, grado, mes, año, imagen, estado)
                    VALUES('$curso', '$grado', '$mes', '$año', '$imagen', '$estado')";
    $ejecutar = mysqli_query($conexion, $query);

        if($ejecutar){
            if ($rol == 1) {
                ?>
                <script>
                    alert("Curso registrado correctamente");
                    window.location = "Menu_admin.php"
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Curso registrado correctamente");
                    window.location = "Menu.php"
                </script>
                <?php
            }
        }else {
            ?>
            <script>
                alert("Error al crear el curso");
                window.location = "Cursos_admin.php"
            </script>
            <?php
        }
        mysqli_close($conexion);
}


function editar_curso(){

    include 'conexion_bd.php';
    $id = $_POST['id'];
    $curso = $_POST['name'];
    $grado = $_POST['grado'];
    $mes = $_POST['mes'];
    $año = $_POST['año'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    $consulta="UPDATE cursos SET nombre = '$curso', grado = '$grado', mes = '$mes', año = '$año', imagen = '$imagen' WHERE id = '$id' ";

    mysqli_query($conexion, $consulta);

    echo'
    <script>
        alert("Curso editado correctamente");
        window.location = "Cursos_admin.php"
    </script>
    ';
}

//Modulo de estudiante
if (isset($_POST['estudiante'])){ 
    switch ($_POST['estudiante']){

        case 'crear_estudiante':
            crear_estudiante();
            break;
        case 'editar_estudiante':
            editar_estudiante();
            break;
    }

}

function crear_estudiante(){
    include 'conexion_bd.php';
    $rol = $_POST['rol'];

    $fecha_registro = $_POST['inscripcion'];
    $nombre = $_POST['name'];
    $apellidos = $_POST['ape'];
    $cedula = $_POST['cedu'];
    $fecha_nacimiento = $_POST['nacimiento'];
    $sexo = $_POST['tipo'];
    $habitacion = $_POST['habit'];
    $celular = $_POST['celu'];
    $oficina = $_POST['ofi'];
    $otro = $_POST['otro'];
    $correo = $_POST['correo'];              
    $correo2 = $_POST['correo2'];
    $direcion = $_POST['direc'];
    $curso = $_POST['curso'];
    $estado = 1;

    $query = "INSERT INTO estudiantes(cedula, nombres, apellidos, fecha_nacimiento, sexo, habitacion_tel, celular_tel, oficina_tel, otro_tel, correo_1, correo_2, direccion, fecha_registro, id_curso, estado)
                    VALUES('$cedula', '$nombre', '$apellidos', '$fecha_nacimiento', '$sexo', '$habitacion', '$celular', '$oficina', '$otro', '$correo', '$correo2', '$direcion', '$fecha_registro', '$curso', '$estado')";

    //Verificar que no se repita numero de cedula en la base de datos
        $verificar_cedula = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE cedula = '$cedula'");
        if(mysqli_num_rows($verificar_cedula) > 0){
            ?>
            <script>
                alert("Ya existe un estudiante con el numero de cedula ingresado");
                window.location = "Crearestudiante.php"
            </script>
            <?php
            exit();
            mysqli_close($conexion);
        }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
            if ($rol == 1) {
                ?>
                <script>
                    alert("Estudiante registrado correctamente");
                    window.location = "Menu_admin.php"
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Estudiante registrado correctamente");
                    window.location = "Menu.php"
                </script>
                <?php
            }
        }else {
            ?>
            <script>
                alert("Error al crear el curso");
                window.location = "Cursos_admin.php"
            </script>
            <?php
        }
        mysqli_close($conexion);
}

function editar_estudiante(){

    include 'conexion_bd.php';
    $id = $_POST['id'];
    
    $fecha_registro = $_POST['inscripcion'];
    $nombre = $_POST['name'];
    $apellidos = $_POST['ape'];
    $cedula = $_POST['cedu'];
    $fecha_nacimiento = $_POST['nacimiento'];
    $sexo = $_POST['tipo'];
    $habitacion = $_POST['habit'];
    $celular = $_POST['celu'];
    $oficina = $_POST['ofi'];
    $otro = $_POST['otro'];
    $correo = $_POST['correo'];              
    $correo2 = $_POST['correo2'];
    $direcion = $_POST['direc'];
    $curso = $_POST['curso'];

    $consulta="UPDATE estudiantes SET cedula = '$cedula', nombres = '$nombre', apellidos = '$apellidos', fecha_nacimiento = '$fecha_nacimiento', sexo = '$sexo', habitacion_tel = '$habitacion', celular_tel = '$celular', oficina_tel = '$oficina', otro_tel = '$otro', correo_1 = '$correo', correo_2 = '$correo2', direccion = '$direcion', fecha_registro = '$fecha_registro', id_curso = '$curso' WHERE id = '$id' ";

    mysqli_query($conexion, $consulta);

    echo'
    <script>
        alert("Estudiante editado correctamente");
        window.location = "Estudiantes_admin.php"
    </script>
    ';

}