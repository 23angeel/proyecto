<?php
session_start();
if($_SESSION['cargo'] == 1) { //administrador
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

            <a href="#menu" class="nav__menu">
                <img src="./Imagenes/menu (1).svg" class="nav__icon">
            </a>

            <a href="#" class="nav__menu nav__menu--second">
                <img src="./Imagenes/x.svg" class="nav__icon ">
            </a>

            <img src="./Imagenes/menu1 - copia.png" width="190" alt="nav__title">

            <ul class="dropdown" id="menu">

                <li class="dropdown__list">
                    <a href="#" class="dropdown__link">
                        <img src="./Imagenes/usuario.svg" width="60">
                        <span class="dropdown__span">Usuario</span>
                        <img src="./Imagenes/down2.svg" width="30" class="dropdown__arrow">

                        <input type="checkbox" class="dropdown__check">
                    </a>

                    <div class="dropdown__content">

                        <ul class="dropdown__sub">

                            <li class="dropdown__li">
                                <a href="Crearusuario.php" class="dropdown__anchor">Registrar</a>
                            </li>
                            <li class="dropdown__li">
                                <a href="Usuarios_creados.php" class="dropdown__anchor">Consultar</a>
                            </li>

                        </ul>

                <li class="dropdown__list">
                    <a href="#" class="dropdown__link">
                        <img src="./Imagenes/curso.svg" width="65">
                        <span class="dropdown__span">Cursos</span>
                        <img src="./Imagenes/down2.svg" width="30" class="dropdown__arrow">

                        <input type="checkbox" class="dropdown__check">
                    </a>

                    <div class="dropdown__content">

                        <ul class="dropdown__sub">

                            <li class="dropdown__li">
                                <a href="#" class="dropdown__anchor">Resgitrar</a>
                            </li>
                            <li class="dropdown__li">
                                <a href="#" class="dropdown__anchor">Consultar</a>
                            </li>

                        </ul>

                    </div>
                </li>

                <li class="dropdown__list">
                    <a href="#" class="dropdown__link">
                        <img src="./Imagenes/estudiante.svg" width="60">
                        <span class="dropdown__span">Estudiante</span>
                       <img src="./Imagenes/down2.svg" width="30" class="dropdown__arrow">

                        <input type="checkbox" class="dropdown__check">
                    </a>

                    <div class="dropdown__content">

                        <ul class="dropdown__sub">

                            <li class="dropdown__li">
                                <a href="Crearestudiante.php" class="dropdown__anchor">Resgitrar</a>
                            </li>
                            <li class="dropdown__li">
                                <a href="#" class="dropdown__anchor">Consultar</a>
                            </li>
                          

                        </ul>

                    </div>

                </li>
                 <li class="dropdown__list">
                    <a href="#" class="dropdown__link">
                        <img src="./Imagenes/control.svg" width="60">
                        <span class="dropdown__span">Control de Estudios</span>
                    </a>
                </li>
                <br><br>
                 <li class="dropdown__list">
                    <a href="iniciodeseccion.php" class="dropdown__link">
                        <img src="./Imagenes/cerrar.svg" width="60">
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