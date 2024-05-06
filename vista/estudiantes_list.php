<head>
    <link rel="stylesheet" type="text/css" href="./css/estudiante_admin.css">
    <link rel="stylesheet" type="text/css" href="./css/style_usuariosCreados.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<div class="container">
    <h1>Estudiantes Registrados</h1>
<?php
    require_once "./php/main.php";

    //Eliminar estudiante
    if(isset($_GET['estudiante_id_del'])){
        require_once "./php/estudiante_eliminar.php";
    }
    
    if (!isset($_GET['page'])) {
        $pagina=1;
    }else{
        $pagina=(int) $_GET['page']; 
        if($pagina<=1){
            $pagina=1;
        }

    }

    $pagina=limpiar_cadena($pagina);
    $url="index.php?vista=estudiantes_list&page=";
    $registros=10;
    $busqueda="";

    require_once './php/estudiantes_lista.php';
?>
</div>