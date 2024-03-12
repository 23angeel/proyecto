<head>
  	<link rel="stylesheet" type="text/css" href="./css/editar_estudiante.css">
  	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<script type="text/javascript">
    /* Esperamos a la carga del DOM */
    window.addEventListener('DOMContentLoaded', (evento) => {
    /* Obtenemos la fecha de hoy en formato ISO */
    const hoy_fecha = new Date().toISOString().substring(0, 10);
    /* Buscamos la etiqueta, ya sea por ID (que no tiene) o por su selector */
    document.querySelector("input[name='inscripcion']").max = hoy_fecha;
    document.querySelector("input[name='nacimiento']").max = hoy_fecha;
    })
</script>

<?php
	require_once "./php/main.php";

	$id = (isset($_GET['estudiante_id_up'])) ? $_GET['estudiante_id_up'] : 0;
	$id=limpiar_cadena($id);

	$check_estudiante=conexion();
	$check_estudiante=$check_estudiante->query("SELECT * FROM estudiantes WHERE estudiantes_id='$id'");
	if($check_estudiante->rowCount()>0){
		$datos=$check_estudiante->fetch();
?>
<h1>Editar Estudiante</h1>

  <form method="post" action="./php/estudiante_editar.php">
    <input type="hidden" name="estudiantes_id" value="<?php echo $datos['estudiantes_id']; ?>" required>

    
      <label for="fecha">Fecha de inscripcion:</label>
      <input type="date" name="inscripcion" id="fecha" value="<?php echo $datos['estudiantes_inscripcion']; ?>" required>
    </div><br><br>

    <div class="btns">
        <label for="nombre">Nombres:</label>
        <input type="text" name="name" id="nombre" value="<?php echo $datos['estudiantes_nombres']; ?>" required >
      
      
        <label for="ape">Apellidos:</label>
        <input type="text" name="ape" id="ape" value="<?php echo $datos['estudiantes_apellidos']; ?>" required>
    </div><br>

       

    <div class="btns">
        <label for="id">Cedula de Identidad:</label>
        <?php
        if ($datos['estudiantes_n'] == "V-") {
        ?>
        <select name="cedula">
              <option value="V-" selected>V-</option>
              <option value="E-">E-</option>
        </select>  
          <?php
          }else{
            ?>
        <select name="cedula">
                <option value="V-">V-</option>
                <option value="E-" selected>E-</option>
        </select>
          <?php
          }
        ?>
        <input type="text" name="cedu" id="id" value="<?php echo $datos['estudiantes_cedula'];?>"required><br>

      <label for="nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="nacimiento" id="fecha" value="<?php echo $datos['estudiantes_naciemineto']; ?>" required>
      </div><br>

       
      <label placeholder="Campo">Genero:</label><br>
        <?php
        if ($datos['estudiantes_sexo'] == "F") {
        ?>
        <span>Femenino<input type="radio" name="tipo" value="F" checked> </span>
        <span>Masculino<input type="radio" name="tipo" value="M"></span>
        <span>Otro<input type="radio" name="tipo" value="O"></span><br>
        <?php
          }elseif($datos['estudiantes_sexo'] == "M"){
          ?>
          <span>Femenino<input type="radio" name="tipo" value="F"> </span>
          <span>Masculino<input type="radio" name="tipo" value="M" checked></span>
          <span>Otro<input type="radio" name="tipo" value="O"></span><br>
          <?php
          }else{
            ?>
            <span>Femenino<input type="radio" name="tipo" value="F"> </span>
            <span>Masculino<input type="radio" name="tipo" value="M"></span>
            <span>Otro<input type="radio" name="tipo" value="O" checked></span><br>
            <br>
          <?php
          }
        ?>
      <label1>Numeros de Telefono:</label1><br>
    <div class="btns">
        Habitacion:<input type="text" name="habit" value="<?php echo $datos['estudiantes_habitacion']; ?>"><br>      
        Celular:<input type="text" name="celu" value="<?php echo $datos['estudiantes_celular']; ?>"><br>
        </div>
    <div class="btns">
        Oficina:<input type="text" name="ofi" value="<?php echo $datos['estudiantes_oficia']; ?>"><br>
        Otro:<input type="text" name="otro" value="<?php echo $datos['estudiantes_otro']; ?>"><br>
    </div>

    
      <label2>Correos Electronicos:</label2><br>
        <div class="btns">
        <span><label>Principal:</label><input type="email" name="correo" value="<?php echo $datos['estudiantes_correo']; ?>" required></span>
        <span>Otro:<input type="email" name="correo2" value="<?php echo $datos['estudiantes_correo2']; ?>"></span>
      </div><br>

    <label1>Direccion de Habitacion</label1><br>
    <textarea name="direc" maxlength="100"><?php echo $datos['estudiantes_direccion']; ?></textarea><br>

    <p>Los campos obligatorios están marcados con un asterisco rojo *</p><br>

    <div class="btns">
  <button type="submit" name="editar" >Editar</button>
  </div>
  </form>
<?php
	}else{
		echo '
            <script>
                alert("No podemos obtener la informacion solicitada");
                window.location = "index.php?vista=estudiantes_list"
            </script>
            ';
	}
	$check_estudiantes=null;
?>