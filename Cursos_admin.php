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
                <th>ESTADO</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conexion_bd.php';

            $sql = "SELECT cursos.id, cursos.nombre, cursos.año_curso, cursos.estado FROM cursos";
            $datos = mysqli_query($conexion, $sql);
            if($datos -> num_rows >0){
                while($fila=mysqli_fetch_array($datos)){
            ?>
            <tr>
                <td><?php echo $fila['id'];?></td>
                <td><?php echo $fila['nombre'];?></td>
                <td><?php echo $fila['año_curso'];?></td>
                <td>
                    <?php
                    if($fila['estado']==1){
                        echo '<p><a href="Estado.php?id='.$fila['id'].'&estado=0">Activo</a></p>';
                    }else{
                        echo '<p><a href="Estado.php?id='.$fila['id'].'&estado=1">Desactivado</a></p>';
                    }
                    ?>
                <td>
                    <a href="">Ver</a>
                    <a href="">Editar</a>
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
</body>
</html>