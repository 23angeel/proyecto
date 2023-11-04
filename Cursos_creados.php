<?php
session_start();
error_reporting(0);
$validar = $_SESSION['usuario'];
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
    <title>CURSOS | ESCUELA DE TRANSPORTE</title>
</head>
<body>
    <h1>Cursos Creados</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE DEL CURSO</th>
                <th>AÑO DEL CURSO</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conexion_bd.php';

            $sql = "SELECT cursos.id, cursos.nombre, cursos.año_curso FROM cursos WHERE cursos.estado = 1";
            $datos = mysqli_query($conexion, $sql);
            if($datos -> num_rows >0){
                while($fila=mysqli_fetch_array($datos)){
            ?>
            <tr>
                <td><?php echo $fila['id'];?></td>
                <td><?php echo $fila['nombre'];?></td>
                <td><?php echo $fila['año_curso'];?></td>
                <td>
                    <a href="">Ver</a>
                </td>
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