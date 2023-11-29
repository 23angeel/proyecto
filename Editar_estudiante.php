<?php
session_start();
if($_SESSION['cargo'] == 1) {//administrador

}else{
    header("Location: Iniciodeseccion.php");
}

$id= $_GET['id'];
include 'conexion_bd.php';
$consulta= "SELECT * FROM estudiantes WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$estudiante = mysqli_fetch_assoc($resultado);
$curso = $estudiante['id_curso'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Estudiante</title>
  <link rel="stylesheet" href="./css/style0.css">
  <link rel="stylesheet" type="text/css" href="./css/editar_estudiante.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<body>

<nav class="nav">

<div class="nav__container">

    <ul class="dropdown" id="menu">

        <li>
            <a href="#" class="logo">
                <img src="./Imagenes/zyro-image (2).png">
                <span href="#" class="nav__link">Escuela de Transporte</span>
            </a>
        </li>

        <li class="dropdown__list">
            <a href="#" class="dropdown__link">
                <img src="./Imagenes/Perfiles_12.svg" width="45">
                <span class="dropdown__span">Usuario</span>
                <img src="./Imagenes/arrow12.svg" width="30" class="dropdown__arrow">

                <input type="checkbox" class="dropdown__check">
            </a>

            <div class="dropdown__content">

                <ul class="dropdown__sub">

                    <li class="dropdown__li">
                        <a href="./Crearusuario.php" class="dropdown__anchor">Registrar</a>
                    </li>
                    <li class="dropdown__li">
                        <a href="Usuarios_creados.php" class="dropdown__anchor">Consultar</a>
                    </li>

                </ul>

        <li class="dropdown__list">
            <a href="#" class="dropdown__link">
                <img src="./Imagenes/cursos_12.svg" width="45">
                <span class="dropdown__span">Cursos</span>
                <img src="./Imagenes/arrow12.svg" width="30" class="dropdown__arrow">

                <input type="checkbox" class="dropdown__check">
            </a>

            <div class="dropdown__content">

                <ul class="dropdown__sub">

                    <li class="dropdown__li">
                        <a href="Crearcurso.php" class="dropdown__anchor">Resgitrar</a>
                    </li>
                    <li class="dropdown__li">
                        <a href="Cursos_admin.php" class="dropdown__anchor">Consultar</a>
                    </li>

                </ul>

            </div>
        </li>

        <li class="dropdown__list">
            <a href="#" class="dropdown__link">
                <img src="./Imagenes/Estudiantes_12.svg" width="45">
                <span class="dropdown__span">Estudiante</span>
               <img src="./Imagenes/arrow12.svg" width="30" class="dropdown__arrow">

                <input type="checkbox" class="dropdown__check">
            </a>

            <div class="dropdown__content">

                <ul class="dropdown__sub">

                    <li class="dropdown__li">
                        <a href="Crearestudiante.php" class="dropdown__anchor">Resgitrar</a>
                    </li>
                    <li class="dropdown__li">
                        <a href="Estudiantes_admin.php" class="dropdown__anchor">Consultar</a>
                    </li>
                  

                </ul>

            </div>

        </li>
         <li class="dropdown__list">
            <a href="#" class="dropdown__link">
                <img src="./Imagenes/controlde_12.svg" width="45">
                <span class="dropdown__span">Control de Estudios</span>
            </a>
        </li>
        <br><br>
         <li class="dropdown__list">
            <a href="iniciodeseccion.php" class="dropdown__link">
                <img src="./Imagenes/cerrar (12).svg" width="45">
                <span class="dropdown__span">Cerrar sesión</span>
            </a>
        </li>
    </ul>
</div>
</nav>
  <form method="post" action="funciones.php">

    <h1>Editar Estudiante</h1>

    
    <label for="fecha">Fecha de inscripcion:</label>
    <input type="date" name="inscripcion" id="fecha" value="<?php echo $estudiante['fecha_registro'];?>"required><br>
  <div class="inputBox">
    <div class="btns">
    <label for="nombre">Nombres:</label>
    <input type="text" name="name" id="nombre" value="<?php echo $estudiante['nombres'];?>"required><br>

    <label for="ape">Apellidos:</label>
    <input type="text" name="ape" id="ape" value="<?php echo $estudiante['apellidos'];?>"required><br>
    </div><br>

    <div class="btns">
    <label for="id">Cedula de Identidad:</label>
    <input type="text" name="cedu" id="id" value="<?php echo $estudiante['cedula'];?>"required><br>

    <label for="nacimiento">Fecha de Nacimiento:</label>
    <input type="date" name="nacimiento" id="nacimiento" value="<?php echo $estudiante['fecha_nacimiento'];?>"required>

    <label>Sexo:</label>
    <?php
    if ($estudiante['sexo'] == "F") {
    ?>
    Femenino<input type="radio" class="radio" name="tipo" value="F" checked> </span>
    Masculino<input type="radio" class="radio" name="tipo" value="M"></span><br>
    <?php
      }else{
        ?>
        Femenino<input type="radio" class="radio" name="tipo" value="F"> </span>
        Masculino<input type="radio" class="radio" name="tipo" value="M" checked></span><br>
        <?php
      }
    ?>
    </div>
  

    <label>Numeros de Telefono:</label>
    <div class="btns">
    Habitacion:<input type="number" name="habit" value="<?php echo $estudiante['habitacion_tel'];?>"><br>
    Celular:<input type="number" name="celu" value="<?php echo $estudiante['celular_tel'];?>"><br>
    </div><br>
    <div class="btns">
    Oficina:<input type="number" name="ofi" value="<?php echo $estudiante['oficina_tel'];?>"><br>
    Otro:<input type="number" name="otro" value="<?php echo $estudiante['otro_tel'];?>"><br>


    <input type="hidden" name="estudiante" value="editar_estudiante">
    <input type="hidden" name="id" value="<?php echo $id;?>">

    </div><br>

    <label>Correos Electronicos:</label>
    <div class="btns">
    <span>Principal:<input type="email" name="correo" value="<?php echo $estudiante['correo_1'];?>" required></span><br><br>
    <span>Otro:<input type="email" name="correo2" value="<?php echo $estudiante['correo_2'];?>"></span><br>
    </div>

    <label>Direccion de Habitacion</label>
    <textarea name="direc" maxlength="100"><?php echo $estudiante['direccion'];?></textarea><br>

    <label>Cursos</label>
    <select name="curso">
      <?php
        include 'conexion_bd.php';
        $sql = "SELECT * FROM cursos WHERE id = $curso";
        $datos = mysqli_query($conexion, $sql);
        $fila=mysqli_fetch_array($datos);
        $trayecto = $fila['mes']."/".$fila['año'];
        $id = $fila['id'];
        ?>
        <option selected value="<?php echo $id; ?>"><?php echo $fila['nombre']." ".$fila['grado']." ".$trayecto;?></option>
      <?php
      include 'conexion_bd.php';
      $sql = "SELECT * FROM cursos WHERE cursos.estado = 1 ORDER BY id";
      $datos = mysqli_query($conexion, $sql);
      while ($fila=mysqli_fetch_array($datos)) {
        $id = $fila['id'];
        $nombre = $fila['nombre'];
        $grado = $fila['grado'];
        $trayecto = $fila['mes']."/".$fila['año'];

        ?>
        <option value="<?php echo $id; ?>"><?php echo $nombre." ".$grado." ".$trayecto;?></option>
        <?php
      }
      ?>
    </select>

    <button type="submit" name="editar">Editar</button>
  </form>
</div>

</body>
</html>