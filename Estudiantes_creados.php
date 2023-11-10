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
    <title>ESTUDIANTES | ESCUELA DE TRANSPORTE</title>
</head>
<body>
     <h1>Estudiantes Creados</h1>
      <div>
  <form>
      <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscar">
      </form>
  </div>

  <br>

    <table class="table table-striped table-dark table_id">
        <thead>
            <tr>
                <th>#</th>
                <th>Cedula</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>FECHA DE REGISTRO</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conexion_bd.php';

            $sql = "SELECT * FROM estudiantes WHERE estado = 1";
            $datos = mysqli_query($conexion, $sql);
            if($datos -> num_rows >0){
                while($fila=mysqli_fetch_array($datos)){
            ?>
            <tr>
                <td><?php echo $fila['id'];?></td>
                <td><?php echo $fila['cedula'];?></td>
                <td><?php echo $fila['nombres'];?></td>
                <td><?php echo $fila['apellidos'];?></td>
                <td><?php echo $fila['fecha_registro'];?></td>
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
    <script src="buscador.js"></script>
</body>
</html>