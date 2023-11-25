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
      <div>
  <form>
      <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscar">
      </form>
  </div>

  <br>

    <table class="table table-striped table-dark table_id">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>GRADO</th>
                <th>MES / AÑO</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conexion_bd.php';

            $sql = "SELECT * FROM cursos WHERE estado = 1";
            $datos = mysqli_query($conexion, $sql);
            if($datos -> num_rows >0){
                while($fila=mysqli_fetch_array($datos)){
            ?>
            <tr>
                <td><?php echo $fila['id'];?></td>
                <td><?php echo $fila['nombre'];?></td>
                <td><?php echo $fila['grado'];?></td>
                <td><?php echo $fila['mes']."/".$fila['año'];?></td>
                <td><img height="50px" src="data:image/jpg;base64,<?php echo base64_encode($fila['imagen']); ?>"></td>
                <td>
                    <a href="Perfil_curso.php?id=<?php echo $fila['id']?>">Ver</a>
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