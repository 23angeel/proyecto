<?php
if ($_SESSION['rol']== 1) {
?>
<head>
	<link rel="stylesheet" href="./css/style_usuariosCreados.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<div class="container">
	<div class="form">
	<h1>Lista de Usuarios Creados</h1>

	<?php
		require_once "./php/main.php";

		//Eliminar usuario
		if(isset($_GET['user_id_del'])){
			require_once "./php/usuario_eliminar.php";
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
		$url="index.php?vista=usuario_list&page=";
        $registros=15;
        $busqueda="";

		require_once './php/usuario_lista.php';
	?>
	</div>
</div>
<?php
}else{
	header("Location: index.php?vista=login");
}
?>