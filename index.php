<?php require "./include/session_start.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style0.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<body> 
    <?php
        if(!isset($_GET['vista']) || $_GET['vista']==""){
            $_GET['vista']="login";
        }

        if(is_file("./vista/".$_GET['vista'].".php") && $_GET['vista']!="login" && $_GET['vista']!="404"){

            #Cerrar session forzada
            if ((!isset($_SESSION['id']) || $_SESSION['id']=="") || (!isset($_SESSION['usuario']) || $_SESSION['usuario']=="") || (!isset($_SESSION['rol']) || $_SESSION['rol']=="")) {
                include "./vista/cerrar_session.php";
                exit();
            }

            include "./include/navegacion.php";

            include "./vista/".$_GET['vista'].".php";
        }else{
            if($_GET['vista']=="login"){
            include "./vista/login.php";
            }else{
            include "./vista/404.php";
            }
        }
    ?>
    
</body>
</html>