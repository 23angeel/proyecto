<?php
session_start();
if($_SESSION['cargo'] == 1) { //administrador
}else{
    header("Location: Iniciodeseccion.php");
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
    <h1>Estudiantes Registrados</h1>
    <div>
        <form>
            <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscar">
        </form>
    </div>

    <br>

    <form>

    <table class="table table-striped table-dark table_id">
        <thead>
            <tr>
                <th>#</th>
                <th>Cedula</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>FECHA DE REGISTRO</th>
                <th>ESTADO</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conexion_bd.php';

            $sql = "SELECT * FROM estudiantes";
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
                    <?php
                    if($fila['estado']==1){
                        echo '<p><a href="Estado_estudiante.php?id='.$fila['id'].'&estado=0">Activo</a></p>';
                    }else{
                        echo '<p><a href="Estado_estudiante.php?id='.$fila['id'].'&estado=1">Desactivado</a></p>';
                    }
                    ?>
                <td>
                    <a href="">Ver</a>
                    <a href="Editar_estudiante.php?id=<?php echo $fila['id']?>">Editar</a>
                    <a href="">Eliminar</a>
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
    </form>
    <script src="buscador.js"></script>
</body>
</html>