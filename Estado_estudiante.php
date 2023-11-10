<?php
include 'conexion_bd.php';

$id = $_GET['id'];    
$estado = $_GET['estado'];

$consulta = "UPDATE estudiantes SET estado = '$estado' WHERE id = '$id'";
mysqli_query($conexion, $consulta);

header('location: Estudiantes_admin.php');
?>