 <head>
    <!--<link rel="stylesheet" href="./css/crear_estudiante.css">-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<style>
    body {
        background-color: #F7F9F9;
    }
    .content {
  display: flex;
  float: right;
  align-items: center;
  min-height: 400vh;
  width: calc(300% - 500px);
  flex-direction: column;
  margin-top: 100px;
  gap: 30px;
  
}

 .blue-border {
      border-color: hsl(209.8deg 100% 29.61%);
    }
    .blue-title {
  color: hsl(209.8deg 100% 29.61%);
}

    .custom-button {
    background-color: hsl(209.8, 100%, 29.61%);
    color: white;
  }
  .custom-border {
    border-color: hsl(209.8, 100%, 29.61%);
    background-color: #F7F9F9;
  }
    .smaller-option {
  width: 50%;
}

.smaller-option option {
  width: 100%;
}

    .custom-input {
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #F7F9F9;
    border: 1px solid hsl(209.8, 100%, 29.61%);
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }

  .custom-radio-label {
    margin-left: 0.2rem;
    background-color: #F7F9F9;
  }
         .required-label {
      color: red;
      font-weight: bold;
    }
    .legend {
      color: red;
      font-weight: bold;
    }
    .bg-custom {
    background-color: #F7F9F9;
  }
</style>
    
<?php
    require_once "./php/main.php";
?>


<form method="post" action="./php/estudiante_guardar.php" autocomplete="off">

    <div class="container mt-5">
    <div class="row">
  <div class="col text-center">
    <h1 class="blue-title">Crear Estudiante</h1>
  </div>
</div>
    
        <div class="col-md-3 mb-3">
    <label for="fecha">Fecha de inscripcion:  <span class="required-label">*</span></label>
    <input type="date" name="inscripcion" id="fecha" required class="form-control custom-input">
    </div>
<div class="row">
        <div class="col-md-3 mb-2">
            <form id="contact-form" action="#" method="post">
        <label for="nombre">Nombres:  <span class="required-label">*</span></label>
        <input type="text" name="name" id="nombre" placeholder="Eddo Jose" required class="form-control custom-input">
    </div>
        

        <div class="col-md-3 mb-2">
        <label for="ape">Apellidos:  <span class="required-label">*</span></label>
        <input type="text" name="ape" id="ape" placeholder="Chirinos Colina" required class="form-control custom-input">
    </div>

    <div class="row">
  <div class="col-md-3 mb-2">
  <label class="form-label" for="id">Cédula de Identidad: <span class="required-label">*</span></label>
  <div class="input-group">
    <select name="cedula" class="form-select mb-1 smaller-option bg-custom">
      <option value="V-">V-</option>
      <option value="E-">E-</option>
    </select>
    <input type="text" name="cedu" id="id" pattern="[0-9.]{1,10}" maxlength="10" placeholder="30.715.180" class="form-control larger-input bg-custom" required>
  </div>
</div>

  <div class="col-md-3 mb-3">
    <label class="form-label" for="fecha">Fecha de nacimiento: <span class="required-label">*</span></label> 
    <input type="date" id="fecha" class="form-control custom-input">
  </div>

 <div class="col-md-2 mb-3">
  <label class="form-check-label">Sexo:   <span class="required-label">*</span></label>
  <div class="form-check">
    <input required type="radio" name="tipo" value="F" id="femenino">
    <label class="form-check-label custom-radio-label" for="femenino">Femenino</label>
  </div>
  <div class="form-check">
    <input required type="radio" name="tipo" value="M" id="masculino">
    <label class="form-check-label custom-radio-label" for="masculino">Masculino</label>
  </div>
</div>
</div>

<div class="row">
  <label class="mb-2">Numeros de Telefono:</label>
  <br>
  <div class="col-md-3 mb-4">
    Habitacion:
    <div class="input-group">
      <input type="text" name="habit" pattern="[0-9.]{1,11}" maxlength="11" placeholder="0212-2511131" class="form-control custom-input">
    </div>
  </div>
  <div class="col-md-3 mb-3">
    Celular:
    <div class="input-group">
      <input type="text" name="celu" pattern="[0-9.]{1,11}" maxlength="11" placeholder="0424-1906240" class="form-control custom-input">
    </div>
  </div>

  </div>
  <div class="col-md-3 mb-3">
    Oficina:
    <div class="input-group">
      <input type="text" name="ofi" pattern="[0-9.]{1,11}" maxlength="11" placeholder="0212-67842" class="form-control custom-input">
    </div>
  </div>
  <div class="col-md-3 mb-4">
    Otro:
    <div class="input-group">
      <input type="text" name="otro" pattern="[0-9.]{1,11}" maxlength="11" placeholder="0416-324567" class="form-control custom-input">
    </div>
  </div>
    

        <div class="row">
        <label>Correos Electronicos: </label><br>
        <div class="col-md-3 mb-3">
        <span>Principal:  <span class="required-label">*</span></label><input type="email" name="correo" required class="form-control custom-input"></span>
        </div>
        <div class="col-md-3 mb-3">
        <span>Otro:<input type="email" name="correo2" class="form-control custom-input"></span>
        </div>
        
    
    <label class="form-label">Dirección de Habitación</label>
<br>
<textarea name="direc" maxlength="100" placeholder="Av. 42, casa Nro. 16-1, sector los samanes, Ciudad Ojeda Municipio Lagunillas" class="form-control mb-3 custom-border" rows="2" cols="40"></textarea>
<br>

    <div class="legend">Los campos obligatorios están marcados con un asterisco rojo *</div>

    <div class="text-center"><br><br>
  <button type="submit" name="crear" class="btn btn-primary btn-lg custom-button">Crear</button>
  <button type="reset" class="btn btn-primary btn-lg custom-button">Limpiar</button>
</div>
     
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('input, select').addClass('blue-border');
    });
  </script>
    
</form>
</head>
<?php
    require_once "./php/main.php";
?>
<form method="post" action="./php/estudiante_guardar.php" autocomplete="off">
    <h1>Crear Estudiante</h1>

    <label for="fecha">Fecha de inscripcion:</label>
    <input type="date" name="inscripcion" id="fecha" required><br>

    <div class="btns">
        <label for="nombre">Nombres:</label>
        <input type="text" name="name" id="nombre" placeholder="Eddo Jose" required><br>

        <label for="ape">Apellidos:</label>
        <input type="text" name="ape" id="ape" placeholder="Chirinos Colina" required><br>
    </div><br>

    <div class="btns">
        <label for="id">Cedula de Identidad:</label>
        <select name="cedula">
            <option value="V-">V-</option>
            <option value="E-">E-</option>
        </select>
        <input type="text" name="cedu" id="id" pattern="[0-9.]{1,10}" maxlength="10" placeholder="30.715.180" required><br>

        <label for="nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="nacimiento" id="nacimiento" required><br>
    </div><br>

    <div class="btns">
        <label>Sexo:</label>
        <span>Femenino<input required type="radio" name="tipo" value="F"> </span>
        <span>Masculino<input required type="radio" name="tipo" value="M"></span><br>
    </div>

    <label>Numeros de Telefono:</label><br>
    <div class="btns">
        Habitacion:<input type="text" name="habit" pattern="[0-9.]{1,11}" maxlength="11" placeholder="0212-2511131"><br>
        Celular:<input type="number" name="celu" pattern="[0-9.]{1,11}" maxlength="11" placeholder="0424-1906240"><br>
    </div><br>

    <div class="btns">
        Oficina:<input type="number" name="ofi" pattern="[0-9.]{1,11}" maxlength="11" placeholder="0212-67842"><br>
        Otro:<input type="number" name="otro" pattern="[0-9.]{1,11}" maxlength="11" placeholder="0416-324567"><br>
    </div><br>

    <div class="btns">
        <label>Correos Electronicos:</label><br>
        <span>Principal:<input type="email" name="correo" required></span><br>
        <span>Otro:<input type="email" name="correo2"></span><br>
    </div><br>

    <label>Direccion de Habitacion</label><br>
    <textarea name="direc" maxlength="100" placeholder="Av.  42, casa Nro. 16-1, sector los samanes, Ciudad Ojeda Municipio Lagunillas"></textarea><br>

    <label>Curso</label>

    <select name="curso">
        <option value="" selected="" >Seleccionar Curso</option>
        <?php
            $cursos=conexion();
            $cursos=$cursos->query("SELECT * FROM cursos");
            if($cursos->rowCount()>0){
                $cursos=$cursos->fetchAll();
                foreach ($cursos as $filas) {
                    echo'<option value="'.$filas['curso_id'].'">'.$filas['curso_nombre']." ".$filas['curso_mes']."/".$filas['curso_año'].'</option>';    
                }
            }
            $cursos=null;
        ?>
    </select><br>

    <div class="btns">
        <button type="submit" name="crear">Crear</button>
        <button type="reset">Limpiar</button>
    </div>
</form>