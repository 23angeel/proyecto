<?php
$usuario = $_POST['name'];
include 'conexion_bd.php';
$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$resultado = mysqli_query($conexion, $consulta);
$usuarios = mysqli_fetch_assoc($resultado);
if ($usuarios) {
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>RECUPERAR CONTRASEÑA | ESCUELA DE TRANSPORTE</title>
</head>
<script type="text/javascript">
   function validarPassword(password) {
    const decimal = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8}$/;

    if(password.value.match(decimal)) {

      return true;

   } else {
      alert("La contraseña debe contener al menos una minúscula, mayúscula, número y un carácter especial. Y 8 carácteres como mínimo.")
      return false;
    }
}
</script>
<body>
   <div>
      <h4>Recuperar contraseña <?php echo $usuario;?></h4>
   </div>
   <form method="post" action="funciones.php">
            <label for="password">Ingrese su nueva contraseña</label><br>
            <input type="password" id="password" name="password" placeholder="contraseña"><br>
            <label for="password2">Confirmar contraseña</label><br>
            <input type="password" id="password2" name="password2" placeholder="contraseña"><br>

            <input type="hidden" name="inicio" value="recuperar_contraseña">
            <input type="hidden" name="usuario" value="<?php echo $usuario;?>">
            
            <button type="submit" name="cambiar" onclick="return validarPassword(password)">Cambiar</button></a>
      </form>
      <a href="Iniciodeseccion.php"><button>Cancelar</button></a>
</body>
</html>

<?php
}else{
      echo'
      <script>
         alert("El usuario ingresado no existe");
         window.location = "iniciodeseccion.php"
      </script>
      ';
}

?>