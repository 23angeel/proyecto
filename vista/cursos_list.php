<head>
    <link rel="stylesheet" type="text/css" href="./css/cursos_admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<div class="content">
    <h1>Cursos Creados</h1>
<?php
    require_once "./php/main.php";

    //Eliminar curso
    if(isset($_GET['curso_id_del'])){
        require_once "./php/curso_eliminar.php";
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
    $url="index.php?vista=cursos_list&page=";
    $registros=15;
    $busqueda="";

    require_once './php/curso_lista.php';
?>
</div>