<?php
    // CONEXION A LA BASE DE DATOS
    function conexion(){
        $pdo = new PDO('mysql:host=localhost;dbname=escuela del transporte', 'root', '');
        return $pdo;
    }

    # VERIFICAR DATOS
	function verificar_datos($filtro,$cadena){
		if(preg_match("/^".$filtro."$/", $cadena)){
			return false;
        }else{
            return true;
        }
	}

	# LIMPIAR CADENA DE TEXTO
	function limpiar_cadena($cadena){
		$cadena=trim($cadena);
		$cadena=stripslashes($cadena);
		$cadena=str_ireplace("<script>", "", $cadena);
		$cadena=str_ireplace("</script>", "", $cadena);
		$cadena=str_ireplace("<script src", "", $cadena);
		$cadena=str_ireplace("<script type=", "", $cadena);
		$cadena=str_ireplace("SELECT * FROM", "", $cadena);
		$cadena=str_ireplace("DELETE FROM", "", $cadena);
		$cadena=str_ireplace("INSERT INTO", "", $cadena);
		$cadena=str_ireplace("DROP TABLE", "", $cadena);
		$cadena=str_ireplace("DROP DATABASE", "", $cadena);
		$cadena=str_ireplace("TRUNCATE TABLE", "", $cadena);
		$cadena=str_ireplace("SHOW TABLES;", "", $cadena);
		$cadena=str_ireplace("SHOW DATABASES;", "", $cadena);
		$cadena=str_ireplace("<?php", "", $cadena);
		$cadena=str_ireplace("?>", "", $cadena);
		$cadena=str_ireplace("--", "", $cadena);
		$cadena=str_ireplace("^", "", $cadena);
		$cadena=str_ireplace("<", "", $cadena);
		$cadena=str_ireplace("[", "", $cadena);
		$cadena=str_ireplace("]", "", $cadena);
		$cadena=str_ireplace("==", "", $cadena);
		$cadena=str_ireplace(";", "", $cadena);
		$cadena=str_ireplace("::", "", $cadena);
		$cadena=trim($cadena);
		$cadena=stripslashes($cadena);
		return $cadena;
	}

	# Funcion paginador de tablas #
	function paginador_tablas($pagina, $Npaginas, $url, $botonoes, $clase = 'paginator') {
		$tabla = '<nav class="' . $clase . '">';
	
		if ($pagina <= 1) {
			$tabla .= '<a class="paginator-prev disabled">Anterior</a>';
		} else {
			$tabla .= '<a class="paginator-prev" href="' . $url . ($pagina - 1) . '">Anterior</a>';
		}
	
		$tabla .= '<ul class="paginator-list">';
	
		if ($pagina > 1) {
			$tabla .= '<li><a href="' . $url . '1">1</a></li>';
			if ($pagina > 4) {
				$tabla .= '<li><span>&hellip;</span></li>';
			}
		}
	
		$start = max(2, $pagina - 2);
		$end = min($Npaginas - 1, $pagina + 2);
	
		for ($i = $start; $i <= $end; $i++) {
			if ($pagina == $i) {
				$tabla .= '<li><a class="current" href="' . $url . $i . '">' . $i . '</a></li>';
			} else {
				$tabla .= '<li><a href="' . $url . $i . '">' . $i . '</a></li>';
			}
		}
	
		if ($pagina < $Npaginas) {
			if ($pagina < $Npaginas - 3) {
				$tabla .= '<li><span>&hellip;</span></li>';
			}
			$tabla .= '<li><a href="' . $url . $Npaginas . '">' . $Npaginas . '</a></li>';
		}
	
		$tabla .= '</ul>';
	
		if ($pagina >= $Npaginas) {
			$tabla .= '<a class="paginator-next disabled">Siguiente</a>';
		} else {
			$tabla .= '<a class="paginator-next" href="' . $url . ($pagina + 1) . '">Siguiente</a>';
		}
	
		$tabla .= '</nav>';
		return $tabla;
	}
	# Funcion renombrar fotos #
	function renombrar_fotos($nombre){
		$nombre=str_ireplace(" ", "_", $nombre);
		$nombre=str_ireplace("/", "_", $nombre);
		$nombre=str_ireplace("#", "_", $nombre);
		$nombre=str_ireplace("-", "_", $nombre);
		$nombre=str_ireplace("$", "_", $nombre);
		$nombre=str_ireplace(".", "_", $nombre);
		$nombre=str_ireplace(",", "_", $nombre);
		$nombre=$nombre."_".rand(0,100);
		return $nombre;
	}