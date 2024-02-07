<head>
	<link rel="stylesheet" type="text/css" href="./css/crear_curso.css">
	<link rel="stylesheet" type="text/css" href="./css/crear_curso.css">
	<link rel= "preconnect" hret= "https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<div class="content">
	<form method="post" action="./php/curso_guardar.php" autocomplete="off" enctype="multipart/form-data">
		<h1>Crear curso</h1>

		<div class="inputBox">
			<label for="curso">NOMBRE DEl CURSO</label>
			<input required minlength="1" type="text" id="curso" name="name" placeholder="Licencia" maxlength="150"> 
        </div>

        <div class="inputBox">
        	<label for="grado">GRADO</label> 
			<select name="grado">
				<option>Seleccionar Gradro</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
			<b>Colocar el grado cuando es para licencia</b> 
        </div>

        <div class="btns">
			<label for="mes">MES</label> 
			<input required minlength="1" type="text" id="mes" name="mes" placeholder="Enero" maxlength="50"> 
			<label for="año">AÑO</label>
			<input required minlength="1" type="number" id="año" name="año" placeholder="2024" maxlength="4">
		</div>

		<label>Seleccione una imagen para el curso</label> 
		<label>
			<input type="file" name="imagen" accept=".jpg, .png, .jpeg">
			<span>Imagen</span>
			<span>JPG, JPEG, PNG. (MAX 3MB</span>
		</label>

		<div class="btns">
		<button type="submit" name="crear">Crear</button>
		<button type="reset">Limpiar</button>
		</div>
	</form>
</div>