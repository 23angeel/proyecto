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

   } else {
      alert("La contraseña debe contener al menos una minúscula, mayúscula, número y un carácter especial. Y 8 carácteres como mínimo.")
      return false;
    }
}
</script>
<body>
   
   <form method="post" action="funciones.php">
      <h4>Recuperar contraseña <?php echo $usuario;?></h4>
            <div class="inputBox"><label for="password">Ingrese su nueva contraseña</label>
            <input type="password" id="password" name="password" placeholder="contraseña">
            </div>
            <div class="inputBox"><label for="password2">Confirmar contraseña</label>
            <input type="password" id="password2" name="password2" placeholder="contraseña">
            </div>

            <input type="hidden" name="inicio" value="recuperar_contraseña">
            <input type="hidden" name="usuario" value="<?php echo $usuario;?>">
           <div class="actions">
            <button type="submit" name="cambiar" onclick="return validarPassword(password)">Cambiar</button></a>
           <a href="Iniciodeseccion.php"><button type="button">Cancelar</button></a>
           </div>
      </form>
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