<?php
require_once "./php/main.php";

   #Almacenando datos
    $usuario = limpiar_cadena($_POST['name']);

    #Verificar datos obligatorios
        if($usuario==""){
            echo '
                 <script>
                    alert("No has llenado todo los campos que son obligatorios");
                    window.location = "index.php?vista=login"
                </script>
            ';
            exit();
        }

      /*Verificando usuario*/
      $check_usuario=conexion();
      $check_usuario=$check_usuario->query("SELECT usuario_usuario FROM usuarios WHERE usuario_usuario='$usuario'");
      if($check_usuario->rowCount()==1){
?>
<head>
   <link rel="stylesheet" type="text/css" href="./css/rcontraseña.css">
   <link rel= "preconnect" hret= "https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<script type="text/javascript">
   function validarPassword(password) {
   const decimal = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8}$/;
   if(password.value.match(decimal)) {
      return true;
   }else {
      alert("La contraseña debe contener al menos una minúscula, mayúscula, número y un carácter especial. Y 8 carácteres como mínimo.")
      return false;
   }
   }
</script>
<form method="post" action="./php/recuperar_contraseña.php">
   <h4>Recuperar contraseña <?php echo $usuario;?></h4>
   <div class="inputBox"><label for="password">Ingrese su nueva contraseña</label>
      <input type="password" id="password" name="password" placeholder="contraseña">
   </div>
   <div class="inputBox"><label for="password2">Confirmar contraseña</label>
      <input type="password" id="password2" name="password2" placeholder="contraseña">
   </div>
   <input type="hidden" name="usuario" value="<?php echo $usuario;?>">
   <div class="actions">
      <button type="submit" name="cambiar" onclick="return validarPassword(password)">Cambiar</button></a>
      <a href="index.php?vista=login"><button type="button">Cancelar</button></a>
   </div>
</form>
<?php
}else{
         echo'
            <script>
               alert("El usuario ingresado no existe");
               window.location = "index.php?vista=login"
            </script>
            ';
      }
?>