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
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Estudiante</title>
</head>
<body>
  <form method="post" action="funciones.php">
    <h1>Editar Estudiante</h1>

    <label for="fecha">Fecha de inscripcion:</label>
    <input type="date" name="inscripcion" id="fecha" value="<?php echo $estudiante['fecha_registro'];?>"required><br>

    <label for="nombre">Nombres:</label>
    <input type="text" name="name" id="nombre" value="<?php echo $estudiante['nombres'];?>"required><br>

    <label for="ape">Apellidos:</label>
    <input type="text" name="ape" id="ape" value="<?php echo $estudiante['apellidos'];?>"required><br>

    <label for="id">Cedula de Identidad:</label>
    <input type="number" name="cedu" id="id" value="<?php echo $estudiante['cedula'];?>"required><br>

    <label for="nacimiento">Fecha de Nacimiento:</label>
    <input type="date" name="nacimiento" id="nacimiento" value="<?php echo $estudiante['fecha_nacimiento'];?>"required><br>

    <label>Sexo:</label>
    <span>Femenino<input type="radio" name="tipo" value="F"> </span>
    <span>Masculino<input type="radio" name="tipo" value="M"></span><br>
    <?php
    if ($estudiante['sexo'] == "f") {
    ?>
        <b>El estudiante es femenino</b>
        <?php
      }else{
        ?>
        <b>El estudiante es masculino</b><br>
        <?php
      }
    ?>

    <label>Numeros de Telefono:</label><br>
    Habitacion:<input type="number" name="habit" value="<?php echo $estudiante['habitacion_tel'];?>"><br>
    Celular:<input type="number" name="celu" value="<?php echo $estudiante['celular_tel'];?>"><br>
    Oficina:<input type="number" name="ofi" value="<?php echo $estudiante['oficina_tel'];?>"><br>
    Otro:<input type="number" name="otro" value="<?php echo $estudiante['otro_tel'];?>"><br>

    <label>Correos Electronicos:</label><br>
    <span>Principal:<input type="email" name="correo" value="<?php echo $estudiante['correo_1'];?>" required></span><br>
    <span>Otro:<input type="email" name="correo2" value="<?php echo $estudiante['correo_2'];?>"></span><br>

    <label>Direccion de Habitacion</label><br>
    <textarea name="direc" maxlength="100" placeholder="<?php echo $estudiante['direccion'];?>"></textarea><br>

    <label>Cursos</label>
    <select name="curso">
      <?php
        include 'conexion_bd.php';
        $sql = "SELECT * FROM estudiantes LEFT JOIN cursos ON estudiantes.id_curso = cursos.id";
        $datos = mysqli_query($conexion, $sql);
        $fila=mysqli_fetch_array($datos);
        $trayecto = $fila['mes']."/".$fila['año'];
        ?>
        <option><?php echo $fila['nombre']." ".$fila['grado']." ".$trayecto;?></option>
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



    <input type="hidden" name="estudiante" value="editar_estudiante">

    <button type="submit" name="editar">Editar</button>
  </form>

</body>
</html>