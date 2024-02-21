<head>
  <title>Crear Curso</title>
  <link rel="stylesheet" type="text/css" href="./css/crear_curso.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<body>
  <div class="content">
    <form method="post" action="./php/curso_guardar.php" autocomplete="off" enctype="multipart/form-data">
      <h1>Crear curso</h1>

      <div class="btns">
        <label for="curso">NOMBRE DEL CURSO <span>*</span></label>
        <input required minlength="1" type="text" id="curso" name="name" placeholder="Licencia" maxlength="150">

        <label for="grado">GRADO <span>*</span></label>
        <div class="selectBox">
          <select name="grado" required>
            <option>Seleccionar Grado</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
        <div class="texto">
        <span1>Colocar el grado cuando es para licencia</span1>
      </div>
      </div>

      <div class="btns">
        <label for="mes">MES <span>*</span></label> 
        <input required minlength="1" type="text" id="mes" name="mes" placeholder="Enero" maxlength="50"> 
        <label for="año">AÑO <span>*</span></label>
        <input required minlength="1" type="number" id="año" name="año" placeholder="2024" maxlength="4">
      </div>

      <div class="button-container">
        <div class="btns">
          <label>Seleccione una imagen para el curso</label> 
          <label>
            <input type="file" name="imagen" accept=".jpg, .png, .jpeg">
            <span class="imagen-span">Imagen</span>
            <span>JPG, JPEG, PNG (Máx. 3MB)</span>
          </label>
        </div>
      </div>

      <div class="button-container">
        <div class="btns">
          <p>Los campos obligatorios están marcados con un asterisco rojo *</p><br>
        </div>
      </div>

      <div class="button-container">
        <div class="btns">
          <button type="submit" name="crear">Crear</button>
          <button type="reset">Limpiar</button>
        </div>
      </div>
    </form>
  </div>
</body>