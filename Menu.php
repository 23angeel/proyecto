<?php
session_start();
if($_SESSION['cargo'] == 2) { //usuario
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
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
                                <a href="Cursos_creados.php" class="dropdown__anchor">Consultar</a>
                            </li>

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
                                <a href="Estudiantes_creados.php" class="dropdown__anchor">Consultar</a>
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
</body>
</html>


<?php
}else{
    header("Location: Iniciodeseccion.php");
}
?>