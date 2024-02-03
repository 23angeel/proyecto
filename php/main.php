<?php
    // CONEXION A LA BASE DE DATOS
    function conexion(){
        $pdo = new PDO('mysql:host=localhost;dbname=escuela_del_transporte', 'root', '');
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
	function paginador_tablas($pagina, $Npaginas, $url, $botonoes){
		$tabla='<nav class="paginator">';

		if($pagina<=1){
			$tabla.='
			<a>Anterior</a>
			<ul>
			';

		}else{
			$tabla.='
			<a disabled href="'.$url.($pagina-1).'">Anterior</a>
			<ul>
				<li><a href="'.$url.'1">1</a></li>
				<li><span>&hellip;</span></li>
			';
		}

		$ci=0;
		for($i=$pagina; $i<=$Npaginas; $i++){
			if($ci>=$i){
				break;
			}
			if($pagina==$i){
				$tabla.='<li><a href="'.$url.$i.'">'.$i.'</a></li>';
			}else{
				$tabla.='<li><a href="'.$url.$i.'">'.$i.'</a></li>';
			}
			$ci++;
		}

		if($pagina==$Npaginas){
			$tabla.='
			</ul>
			<a disabled >Siguiente</a>
			';
		}else{
			$tabla.='
				<li><span>&hellip;</span></li>
				<li><a href="'.$url.$Npaginas.'">'.$Npaginas.'</a></li>
			</ul>
			<a href="'.$url.($pagina+1).'" >Siguiente</a>
			';
		}

		$tabla.='</nav>';
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
