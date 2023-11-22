<?php
session_start();
if($_SESSION['cargo'] == 1) {//administrador

}else{
    header("Location: Iniciodeseccion.php");
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
    <title>EDITAR CURSO | ESCUELA DE TRANSPORTE</title>
</head>
<body>
    <form method="post" action="funciones.php" enctype="multipart/form-data">

        <h1>Editar Curso</h1>
        <label for="curso">NOMBRE DEl CURSO</label><br>
        <input type="text" id="curso" name="name" value="<?php echo $cursos['nombre'];?>"required><br>

        <label for="grado">GRADO</label><br>
        <input type="number" name="grado" id="grado" value="<?php echo $cursos['grado'];?>"><br>
        <b>Colocar el grado para cuando es para licencia</b><br>

        <label for="mes">MES</label> <label for="año">AÑO</label><br>
        <input type="text" id="mes" name="mes" value="<?php echo $cursos['mes'];?>"> /
        <input type="number" id="año" name="año" value="<?php echo $cursos['año'];?>"><br>

        <label>Seleccione una imagen para el curso</label><br>
        <input type="file" REQUIRED name="imagen"><br>

        <input type="hidden" name="curso" value="editar_curso">
        <input type="hidden" name="id" value="<?php echo $id;?>">

        <button type="submit" name="crear">Editar</button>
        
    </form>

</body>
</html>