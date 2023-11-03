<?php
include 'conexion_bd.php';

$id = $_GET['id'];
$estado = $_GET['estado'];

$consulta = "UPDATE cursos SET estado = '$estado' WHERE id = '$id'";
mysqli_query($conexion, $consulta);

header('location: Cursos_admin.php');
?>