<head>
  <title>Crear Curso</title>
  <link rel="stylesheet" type="text/css" href="./css/crear_curso.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head> 
<script type="text/javascript">
  function mostrarcurso(elemento) {
    if(elemento.value=="licencia") {
      document.getElementById("grado").style.display = "block";
      document.getElementById("no").style.display = "none";
    }else{
      if(elemento.value=="otro"){
        document.getElementById("grado").style.display = "none";
        document.getElementById("no").style.display = "block";
      }
    }
  }
</script>
<body>
  <div class="content">
      <h1>Crear curso</h1>

      <label>Seleccione el tipo de curso que quiere registrar</label>
      <input type="radio" value="licencia" name="curso" onclick="mostrarcurso(this)"> Licencia
      <input type="radio" value="otro" name="curso" onclick="mostrarcurso(this)"> Otro

      <div id="grado" style="display:none">
        <form method="post" action="./php/curso_guardar.php" autocomplete="off" enctype="multipart/form-data"><br>
          <div class="btns">
            <label for="curso">NOMBRE DEL CURSO <span>*</span></label>
            <input required minlength="1" type="text" id="curso" name="name" maxlength="150">
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
          </div>

          <div class="btns">
            <label for="mes">MES <span>*</span></label> 
            <input required minlength="1" type="text" id="mes" name="mes" maxlength="50"> 
            <label for="año">AÑO <span>*</span></label>
            <input required minlength="1" type="number" id="año" name="año" maxlength="4">
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

      <div id="no" style="display:none">
        <form method="post" action="./php/curso_guardar.php" autocomplete="off" enctype="multipart/form-data"><br>
          <div class="btns">
            <label for="curso">NOMBRE DEL CURSO <span>*</span></label>
            <input required minlength="1" type="text" id="curso" name="name" maxlength="150">
          </div>

          <div class="btns">
            <label for="mes">MES <span>*</span></label> 
            <input required minlength="1" type="text" id="mes" name="mes" maxlength="50"> 
            <label for="año">AÑO <span>*</span></label>
            <input required minlength="1" type="number" id="año" name="año" maxlength="4">
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
  </div>
</body>