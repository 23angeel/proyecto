<head>
    <link rel="stylesheet" href="./css/style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<section class="bg-logo"></section>
<div class="content">
<section class="imagen-logo"></section>   
<form method="post" action="">
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
   <button type="submit" >iniciar sesion</button>

   <div id="recuperarClave">
      <h1 class="text-center mb-5 recuperarPass"> </h1>

      <div class="filed-wrap">
         <label for="">¿Haz olvidado tu contraseña?</label>
         <a href="index.php?vista=recuperar_password">Recuperar contraseña</a>
      </div>
         <br></br>
      <?php
            if (isset($_POST['usuario']) && isset($_POST['password'])) {
               require_once "./php/main.php";
               require_once "./php/iniciar_session.php";
            }
         ?>
</form>
</div>