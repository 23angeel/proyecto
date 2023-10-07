<html>
<head> 
 <title>Login</title>
   <link rel="stylesheet" href="style.csc"/>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
   <meta charset="UTF-8">
</head>
<body>

   <section>
</section>

<form method="post" action="">
   <h1>Inicio de Sesion</h1>
   <div> 
      <label for="nickname">Usuario</label>
      <input class="usuario" id="nickname" type="text" name="usuario" placeholder="usuario"> 
   </div>
   <div> 
      <label for="password">Contraseña</label>
      <input id="password" type="password" name="password" class="password" placeholder="********"> 
   </div>
   <button type="submit" name="inicio">iniciar sesion</button>
</form>
</body>
</html>

<?php
   if (isset($_POST['inicio'])) {
      if (strlen($_POST['usuario']) >= 1 && strlen($_POST['password']) >= 1) {


         $usuario = $_POST['usuario'];
         $contrasena = $_POST['password'];
         session_start();
         $_SESSION['usuario'] = $usuario;

         $conexion = mysqli_connect("localhost", "root", "", "proyecto");
         $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
         $resultado=mysqli_query($conexion, $consulta);
         $filas=mysqli_fetch_array($resultado);

         if($filas['id_rol'] == 1){ //admin

        header('location: Menu_admin.php');

        }else if($filas['id_rol'] == 2){ //usuario
        header('location: Menu.php');;
    }   
    }else{
         ?>
         <h3>Completa los campos</h3>
         <?php
      }
   }
?>
