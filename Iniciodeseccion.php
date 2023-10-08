<?php
session_start();
session_destroy();
?>
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
         $contraseña = $_POST['password'];

         include 'conexion_bd.php';

         $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contraseña'");
         $detalles = mysqli_fetch_array($consulta);

         if ($detalles) {
            session_start();
            $_SESSION['usuario'] = $detalles['usuario'];
            $_SESSION['cargo'] = $detalles['id_rol'];

            if ($_SESSION['cargo'] == 1) { //admin
               header("Location: Menu_admin.php");
            }
            if ($_SESSION['cargo'] == 2) { //usuario
               header("Location: Menu.php");
            }     
         }
         else{
            ?>
             <h3> El usuario no existe</h3>
             <?php
         }
      }
      else{
         ?>
         <h3> Complete los campos</h3>
         <?php
      }
   }

?>
