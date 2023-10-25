<?php
session_start();
if($_SESSION['cargo'] == 1) { //administrador
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ESCUELA DEL TRANSPORTE-CREAR USUARIO</title>
	<link rel="stylesheet" type="text/css" href="./css/style1.css">
	<link rel="stylesheet" href="./css/style3.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<body>
<nav>
        <ul class="cont-ul">
		<a href="Menu_admin.php"><li>INICIO</li></a>
            <li class="develop">
                CURSOS 
                <ul class="ul-second">
                    <li class="back">Resgistrar</li>
                    <li>Consultar</li>
                </ul>
            </li>
            <li class="develop">
                ESTUDIANTE
                <ul class="ul-second">
                    <li class="back">Resgistrar</li>
                    <li>Consultar</li>
                </ul>
            </li>
            <li>CONTROL DE ESTUDIOS</li>
        </ul>
    </nav>
	<div>
	<div class="body">
	<section class="img-back"></section>
	<div class="container">
	<form method="post" action="funciones.php">
		<h1>CREAR USUARIO</h1>

		<div  class="input-box">
			<div>
				<label>NOMBRE DE USUARIO</label><br>
				<input required minlength="1" type="text" name="name" maxlength="30"><br>
			</div>
			<div>
				<label>CONTRASEÑA</label><br>
				<input required minlength="1" type="password" name="password"><br>
			</div>
		
		<label>ROL EN EL SISTEMA</label><br>
		<span>ADMINISTRADOR<input required type="radio" name="tipo" value="1"> </span>
		<span>USUARIO<input class="input-2" required type="radio" name="tipo" value="2"></span>
		<input type="hidden" name="accion" value="crear_usuario">

		
		<div class="btns">
		<button type="submit" name="crear"> Crear </button>
		<button type="reset"> limpiar </button>


		</div>	 
	</form>
	</div>
	</div>
</body>
</html>

<?php
}else{
    header("Location: Iniciodeseccion.php");
}
?>