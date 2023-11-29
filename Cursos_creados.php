<?php
session_start();
$rol = $_SESSION['cargo'];
if($_SESSION['cargo'] == 2) { //administrador
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
    <link rel="stylesheet" href="./css/style0.css">
    <link rel="stylesheet" type="text/css" href="./css/cursos_admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
    <h1>Cursos Creados</h1>
    <div>
        <form>
            <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscar">
        </form>
    </div>

    <form>
    <table class="table table-striped table-dark table_id">
        <thead class="thead">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Grado</th>
                <th>Mes / Año</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conexion_bd.php';

            $sql = "SELECT * FROM cursos";
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
    </form>
</div>
    <script src="buscador.js"></script>
</body>
</html>