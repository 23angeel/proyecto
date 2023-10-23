<?php
session_start();
session_destroy();
?>
<html>
<head> 
 <title>Login</title>
   <link rel="stylesheet" href="./css/style.css"/>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
   <meta charset="UTF-8">
</head>
<body>

   <section>
</section>

<form method="post" action="funciones.php">
   <h1>Inicio de Sesion</h1>
   <div> 
      <label for="nickname">Usuario</label>
      <input class="usuario" id="nickname" type="text" name="usuario" placeholder="usuario"> 
   </div>
   <div> 
      <label for="password">Contraseña</label>
      <input id="password" type="password" name="password" class="password" placeholder="********">
      <input type="hidden" name="inicio" value="acceso_user">
   </div>
   <button type="submit" name="ingresar">iniciar sesion</button>

   <div id="recuperarClave">
      <h1 class="text-center mb-5 recuperarPass"> </h1>

      <form action="Recuperar_contraseña.php" method="post">
      <div class="filed-wrap">
         <label for="">¿Haz olvidado tu contraseña?</label>
         <a href="Recuperar_contraseña.php">Recuperar contraseña</a>
      </div>
         <br></br>
         
      </form>
</form>
</body>
</html>
