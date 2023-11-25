<?php

session_start();
error_reporting(0);

$validar = $_SESSION['usuario'];

if( $validar == null || $validar = ''){

  header("Location: Iniciodeseccion.php");
  die();
  
}

$id= $_GET['id'];
include 'conexion_bd.php';
$consulta= "SELECT * FROM cursos WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$cursos = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $cursos['nombre']." ".$cursos['grado']." ".$cursos['mes']."/".$cursos['año'];?> | Escuela del Transporte</title>
</head>
<body>
  <div>
    <h5>Informacion del Curso</h5>
    <a href="">Hacer PDF</a>
  </div>
  <div>
    <label><b>Nombre</b></label><br>
    <div><?php echo $cursos['nombre'];?></div><br>

    <label><b>Grado</b></label><br>
    <div><?php echo $cursos['grado'];?></div><br>

    <label><b>Trayecto</b></label><br>
    <div><?php echo $cursos['mes']."/".$cursos['año'];?></div><br>

    <div><img height="50px" src="data:image/jpg;base64,<?php echo base64_encode($cursos['imagen']); ?>"></div><br>
  </div>
  <legend>Estudiantes Registrados</legend>
  <table>
        <thead>
            <tr>
                <th>#</th>
                <th>CEDULA</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>EVALUACION TEORICA</th>
                <th>EVALUACION PRACTICA</th>
                <th>PROMEDIO</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conexion_bd.php';

            $sql = "SELECT * FROM estudiantes WHERE id_curso = $id";
            $datos = mysqli_query($conexion, $sql);
            if($datos -> num_rows >0){
                while($fila=mysqli_fetch_array($datos)){
            ?>
            <tr>
                <td><?php echo $fila['id'];?></td>
                <td><?php echo $fila['cedula'];?></td>
                <td><?php echo $fila['nombres'];?></td>
                <td><?php echo $fila['apellidos'];?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
          <?php
            }
        }else{

            ?>
            <tr>
                <td>No existen registros</td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</body>
</html>