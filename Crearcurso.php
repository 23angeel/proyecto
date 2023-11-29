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
	<title>Crear curso</title>
	<link rel="stylesheet" type="text/css" href="./css/style0.css">
	<link rel="stylesheet" type="text/css" href="./css/crear_curso.css">
	<link rel= "preconnect" hret= "https://fonts.googleapis.com">
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
	<form method="post" action="funciones.php" enctype="multipart/form-data">
		<h1>Crear curso</h1>
        <div class="inputBox">
		<label for="curso">NOMBRE DEl CURSO</label>
		<input required minlength="1" type="text" id="curso" name="name" placeholder="Licencia" maxlength="150"> 
        </div>
        <div class="inputBox">
		<label for="grado">GRADO</label> 
		<input type="number" name="grado" id="grado" placeholder="2" maxlength="10"> 
		<b>Colocar el grado para cuando es para licencia</b> 
        </div>
<div class="btns">
		<label for="mes">MES</label> 
		<input required minlength="1" type="text" id="mes" name="mes" placeholder="Enero" maxlength="50"> 
		<label for="año">AÑO</label>
		<input required minlength="1" type="number" id="año" name="año" placeholder="2024" maxlength="4">
		</div>
		<label>Seleccione una imagen para el curso</label> 
		<input type="file" name="imagen"> 

		<input type="hidden" name="curso" value="crear_curso">
		<input type="hidden" name="rol" value="<?php echo $rol;?>">
<div class="btns">
		<button type="submit" name="crear">Crear</button>
		<button type="reset">Limpiar</button>
		</div>
	</form>
	</div>
</body>
</html>