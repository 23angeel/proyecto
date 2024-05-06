<?php
if ($_SESSION['rol']== 1) {
?>
<head>
  <link rel="stylesheet" type="text/css" href="./css/style1.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head> 
<script type="text/javascript">
  function validarPassword(password) {
    const decimal = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

    if(password.value.match(decimal)) {

        return true;

    } else {

        alert("La contraseña debe contener al menos una minúscula, mayúscula, número y un carácter especial. Y 8 carácteres como mínimo y 15 como maximo.")
        return false;
    }
}
</script>
<div class="body">
  <div class="container">
    <form method="POST" action="./php/guardar_usuario.php" name="registro" autocomplete="off">
      <h1>CREAR USUARIO</h1>

      <div class="input-box">
        <div class="group">
          <label for="usuario">USUARIO<span>*</span></label>
          <input required minlength="1" type="text" id="usuario" name="name" maxlength="30">
        </div>
        <div class="group">
          <label for="password">CONTRASEÑA<span>*</span></label>
          <input required type="text" id="password" name="password">
        </div>
      </div>
      
      <div class="group">
        <label>ROL EN EL SISTEMA<span>*</span></label><br>
        <span>ADMINISTRADOR<input required type="radio" name="tipo" value="1"> </span>
        <span>USUARIO<input class="input-2" required type="radio" name="tipo" value="2"></span><br><br>
      </div>

      <p>Los campos obligatorios están marcados con un asterisco rojo *</p>

      <div class="btns">
        <button type="submit" name="crear" onclick="return validarPassword(password)">Crear</button>
        <button type="reset">Limpiar</button>
      </div>   
    </form>
  </div>
</div>
<?php
}else{
  header("Location: index.php?vista=login");
}
?>