<head>
  <link rel="stylesheet" type="text/css" href="./css/home.css">
</head>
<?php
require_once "./php/main.php";
$conexion=conexion();

$usuario=$conexion->query("SELECT COUNT(usuario_id) total FROM usuarios");
$resultado=$usuario->fetchColumn();

$cursos=$conexion->query("SELECT COUNT(curso_id) total FROM cursos");
$total=$cursos->fetchColumn();

$estudiante=$conexion->query("SELECT COUNT(estudiantes_id) total FROM estudiantes");
$fila=$estudiante->fetchColumn();
?>
<body>
    <div class="caja">
        <div class="hola">
            <img src="./Imagenes/usuariologo.png">
            <p>Hola <?php echo $_SESSION['usuario']; ?></p>
        </div>
        <div class="titulo">
            <h1>BIENVENIDO AL SISTEMA DE GESTION DE LA ESCUELA DE TRANSPORTE</h1>
            <hr>
        </div>
        <div class="container">
            <div class="cursos">
                <img src="./Imagenes/cursologo.png">
                <h3><?php echo $total; ?></h3>
                <p><b>total de cursos</b></p>
                <a href="index.php?vista=cursos_list" class="btn">Ver cursos</a>
            </div>
            <div class="estudiantes">
                <img src="./Imagenes/estudianteslogo.png">
                <h3><?php echo $fila; ?></h3>
                <p><b>total de estudiantes</b></p>
                <a href="index.php?vista=estudiantes_list" class="btn">Ver estudiantes</a>
            </div>
        </div>
        <div class="modulos">
            <h2>¿QUE SE PUEDE HACER EN EL SISTEMA?</h2>
            <?php
            if ($_SESSION['rol']==1) {
                ?>
                <img src="./Imagenes/modulosistema.png">
            <?php
            }else{
                ?>
                <img src="./Imagenes/modulosistema1.png">
            <?php
            }?>
        </div>
        <br>
        <br>
        <br>
        <div class="grupo-2">
            <small>&copy; 2024 <b></b> - Todos los Derechos Reservados.</small>
        </div>
    </div>
</body>
</html>