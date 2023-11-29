<?php
session_start();
error_reporting(0);
$validar = $_SESSION['usuario'];
$rol = $_SESSION['cargo'];
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
    <link rel="stylesheet" type="text/css" href="./css/estudiante_admin.css">
  <link rel="stylesheet" href="./css/style0.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<body>
<nav class="nav">

<div class="nav__container">

    <ul class="dropdown" id="menu">

        <li>
            <a href="#" class="logo">
                <img src="./Imagenes/zyro-image (2).png">
                <span href="#" class="nav__link">Escuela de Transporte</span>
            </a>
        </li>

        <?php
                if ($rol == 1) {
                    ?>
                <li class="dropdown__list">
                    <a href="#" class="dropdown__link">
                        <img src="./Imagenes/Perfiles_12.svg" width="45">
                        <span class="dropdown__span">Usuario</span>
                        <img src="./Imagenes/arrow12.svg" width="30" class="dropdown__arrow">

                        <input type="checkbox" class="dropdown__check">
                    </a>
                    <div class="dropdown__content">

                        <ul class="dropdown__sub">

                            <li class="dropdown__li">
                                <a href="./Crearusuario.php" class="dropdown__anchor">Registrar</a>
                            </li>
                            <li class="dropdown__li">
                                <a href="Usuarios_creados.php" class="dropdown__anchor">Consultar</a>
                            </li>

                        </ul>
                    <?php
                }
                ?>

        <li class="dropdown__list">
            <a href="#" class="dropdown__link">
                <img src="./Imagenes/cursos_12.svg" width="45">
                <span class="dropdown__span">Cursos</span>
                <img src="./Imagenes/arrow12.svg" width="30" class="dropdown__arrow">

                <input type="checkbox" class="dropdown__check">
            </a>

            <div class="dropdown__content">

                <ul class="dropdown__sub">

                    <li class="dropdown__li">
                        <a href="Crearcurso.php" class="dropdown__anchor">Resgitrar</a>
                    </li>
                    <li class="dropdown__li">
                            <?php
                            if ($rol == 1) {
                                ?>
                                <a href="Cursos_admin.php" class="dropdown__anchor">Consultar</a>
                                <?php
                            }else{
                                ?>
                                <a href="Cursos_creados.php" class="dropdown__anchor">Consultar</a>
                                <?php
                            }
                        ?>
                </ul>

            </div>
        </li>

        <li class="dropdown__list">
            <a href="#" class="dropdown__link">
                <img src="./Imagenes/Estudiantes_12.svg" width="45">
                <span class="dropdown__span">Estudiante</span>
               <img src="./Imagenes/arrow12.svg" width="30" class="dropdown__arrow">

                <input type="checkbox" class="dropdown__check">
            </a>

            <div class="dropdown__content">

                <ul class="dropdown__sub">

                    <li class="dropdown__li">
                        <a href="Crearestudiante.php" class="dropdown__anchor">Resgitrar</a>
                    </li>
                     <li class="dropdown__li">
                                <?php
                                if ($rol == 1) {
                                    ?>
                                    <a href="Estudiantes_admin.php" class="dropdown__anchor">Consultar</a>
                                    <?php
                                }else{
                                    ?>
                                <a href="Estudiantes_creados.php" class="dropdown__anchor">Consultar</a>
                                <?php
                            }
                            ?>
                    </li>
                  

                </ul>

            </div>

        </li>
         <li class="dropdown__list">
            <a href="#" class="dropdown__link">
                <img src="./Imagenes/controlde_12.svg" width="45">
                <span class="dropdown__span">Control de Estudios</span>
            </a>
        </li>
        <br><br>
         <li class="dropdown__list">
            <a href="iniciodeseccion.php" class="dropdown__link">
                <img src="./Imagenes/cerrar (12).svg" width="45">
                <span class="dropdown__span">Cerrar sesión</span>
            </a>
        </li>
    </ul>
</div>
</nav>

    <div class="content">
     <h1>Estudiantes Creados</h1>
      <div>
  <form>
      <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscar">
      </form>
  </div>


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
                    <a href="Perfil_estudiante.php?id=<?php echo $fila['id']?>">Ver</a>
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