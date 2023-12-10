<?php

	$inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
	$tabla="";
	
	$consulta_datos="SELECT * FROM estudiantes ORDER BY estudiantes_cedula ASC LIMIT $inicio,$registros";
	$consulta_total="SELECT COUNT(estudiantes_id) FROM estudiantes";

	$conexion =conexion();

	$datos=$conexion->query($consulta_datos);
	$datos=$datos->fetchALL();

	$total=$conexion->query($consulta_total);
	$total=(int) $total->fetchColumn();

	$Npaginas=ceil($total/$registros);

	$tabla.='
    <div>
        <form>
            <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscar">
        </form>
    </div>
    <form>
        <table class="table table-striped table-dark table_id">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cedula</th>
                    <th>NOMBRES</th>
                    <th>APELLIDOS</th>
                    <th>FECHA DE REGISTRO</th>
                </tr>
            </thead>
        <tbody>
	';
	if($total>1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$paginador_inicial=$inicio+1;
		foreach($datos as $filas) {
			$tabla.='
			<tr>
                <td>'.$contador.'</td>
                <td>'.$filas['estudiantes_cedula'].'</td>
                <td>'.$filas['estudiantes_nombres'].'</td>
                <td>'.$filas['estudiantes_apellidos'].'</td>
                <td>'.$filas['estudiantes_inscripcion'].'</td>
                <td>
                    <a href="">Ver</a>
                    <a href="">Editar</a>
                    <a href="" onclick="return Delete()">Eliminar</a>
                </td>
            </tr>
			';
			$contador++;
		}
		$paginador_final=$contador-1;

	}else{
		if($total>1){
			$tabla.='
			<tr>
				<td>
					<a href="'.$url.'1">
						Haga clic acá para recargar el listado
					</a>
				</td>
			</tr>
			';
		}else{
			$tabla.='
			<tr>
				<td>No existen registros</td>
			</tr>
			';
		}
	}

	$tabla.='</tbody>
        </table>
    	</form>
	';

	if($total>0 && $pagina<=$Npaginas){
		$tabla.='<p>Mostrando estudiatess <strong>'.$paginador_inicial.'</strong> al <strong>'.$paginador_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

	$conexion=null;
	echo $tabla;

	if($total>=1 && $pagina<=$Npaginas){
		echo paginador_tablas($pagina,$Npaginas,$url,7);
	}
?>

<script src="./js/buscador.js"></script>
<script type="text/javascript">
    function Delete()
    {
        var respuesta = confirm("¿Estas seguro de eliminar este estudiante?");

        if (respuesta == true) {
            return true;
        }else{
            return false;
        }
    }
</script>
