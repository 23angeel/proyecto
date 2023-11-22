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
  <title><?php echo $estudiante['nombres'];?> | Escuela del Transporte</title>
</head>
<body>
  <div>
    <h5>Informacion del Estudiante</h5>
    <a href="">Hacer PDF</a>
  </div>
  <div>
    <label><b>Fecha de Registro</b></label><br>
    <div><?php echo $estudiante['fecha_registro'];?></div><br>

    <label><b>Cedula de Identidad</b></label><br>
    <div><?php echo $estudiante['cedula'];?></div><br>

    <label><b>Nombres</b></label><br>
    <div><?php echo $estudiante['nombres'];?></div><br>

    <label><b>Apellidos</b></label><br>
    <div><?php echo $estudiante['apellidos'];?></div><br>

    <label><b>Fecha de Naciemiento</b></label><br>
    <div><?php echo $estudiante['fecha_nacimiento'];?></div><br>

    <label><b>Sexo</b></label><br>
    <div><?php echo $estudiante['sexo'];?></div><br>

    <legend><b>Numeros de Telefonos</b></legend>
    <label><b>Habitacion</b></label><br>
    <div><?php echo $estudiante['habitacion_tel'];?></div><br>

    <label><b>Celular</b></label><br>
    <div><?php echo $estudiante['celular_tel'];?></div><br>

    <label><b>Oficina</b></label><br>
    <div><?php echo $estudiante['oficina_tel'];?></div><br>

    <label><b>Otro</b></label><br>
    <div><?php echo $estudiante['otro_tel'];?></div><br>

    <legend><b>Correos Electronicos</b></legend>
    <label><b>Principal</b></label><br>
    <div><?php echo $estudiante['correo_1'];?></div><br>

    <label><b>Otro</b></label><br>
    <div><?php echo $estudiante['correo_2'];?></div><br>

    <label><b>Direccion</b></label><br>
    <div><?php echo $estudiante['dirrecion'];?></div><br>
  </div>

  <legend>Historia Academica</legend>
  <table>
        <thead>
            <tr>
                <th>#</th>
                <th>CURSO/GRADO</th>
                <th>TRAYECTO</th>
                <th>EVALUACION TEORICA</th>
                <th>EVALUACION PRACTICA</th>
                <th>PROMEDIO</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conexion_bd.php';

            $sql = "SELECT * FROM cursos WHERE id = $curso";
            $datos = mysqli_query($conexion, $sql);
            if($datos -> num_rows >0){
                while($fila=mysqli_fetch_array($datos)){
            ?>
            <tr>
                <td><?php echo $fila['id'];?></td>
                <td><?php echo $fila['nombre']." ".$fila['grado'];?></td>
                <td><?php echo $fila['mes']."/".$fila['año'];?></td>
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