<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/Recuperar_contraseña.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
	<title>¿Has olvidado la contraseña? | No puedo entrar | Escuela de Trasnporte</title>
</head>
<body>
	<form method="post" action="Rcontraseña.php">
		<div>
			<h1>Recupera tu cuenta</h1><br>
			<label>Introduce tu nombre de usuario para buscar tu cuenta en la base de datos del sistema</label><br>
			<input type="text" name="name" placeholder="usuario"><br>
		</div>
		<div class="btn-actions">
			<button type="submit" name="buscar">Buscar</button>
			<a href="Iniciodeseccion.php"><button type= "button">Cancelar</button></a>
		</div>
	</form>
</body>
</html>

