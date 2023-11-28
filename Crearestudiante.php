<?php

session_start();
error_reporting(0);

$validar = $_SESSION['usuario'];
$rol = $_SESSION['cargo'];

if( $validar == null || $validar = ''){

  header("Location: Iniciodeseccion.php");
  die();
  
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Crear Estudiante</title>
  <link rel="stylesheet" href="./css/crear_estudiante.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
</head>
<body>

  <form method="post" action="funciones.php">
    <h1>Crear Estudiante</h1>

    <label for="fecha">Fecha de inscripcion:</label>
    <input type="date" name="inscripcion" id="fecha" required><br>


<div class="btns">
    <label for="nombre">Nombres:</label>
    <input type="text" name="name" id="nombre" placeholder="Eddo Jose" required><br>

    <label for="ape">Apellidos:</label>
    <input type="text" name="ape" id="ape" placeholder="Chirinos Colina" required><br>
</div><br>

<div class="btns">
    <label for="id">Cedula de Identidad:</label>
    <select name="cedula">
        <option value="V-">V-</option>
        <option value="E-">E-</option>
    </select>
    <input type="text" name="cedu" id="id" placeholder="30715180" required><br>

    <label for="nacimiento">Fecha de Nacimiento:</label>
    <input type="date" name="nacimiento" id="nacimiento" required><br>
</div><br>

<div class="btns">
    <label>Sexo:</label>
    <span>Femenino<input required type="radio" name="tipo" value="F"> </span>
    <span>Masculino<input required type="radio" name="tipo" value="M"></span><br>
</div>

    <label>Numeros de Telefono:</label><br>
<div class="btns">
    Habitacion:<input type="number" name="habit" placeholder="0212-357842"><br>
    Celular:<input type="number" name="celu" placeholder="0424-357842"><br>
</div><br>
<div class="btns">
    Oficina:<input type="number" name="ofi" placeholder="0212-67842"><br>
    Otro:<input type="number" name="otro" placeholder="0416-324567"><br>
</div><br>
<div class="btns">
    <label>Correos Electronicos:</label><br>
    <span>Principal:<input type="email" name="correo" required></span><br>
    <span>Otro:<input type="email" name="correo2"></span><br>
</div><br>
    <label>Direccion de Habitacion</label><br>
    <textarea name="direc" maxlength="100" placeholder="Av.  42, casa Nro. 16-1, sector los samanes, Ciudad Ojeda Municipio Lagunillas"></textarea><br>

    <label>Curso</label>
    <select name="curso">
        <option>Seleccionar Curso</option>

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
    </select><br>



<div class="btns">
    <button type="submit" name="crear">Crear</button>
    <button type="reset">Limpiar</button>
    </div>
  </form>

</body>
</html>