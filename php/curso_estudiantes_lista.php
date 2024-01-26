<?php

	$inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
	$tabla="";
	
	$consulta_datos="SELECT * FROM cursos WHERE curso_id = '$curso' ORDER BY curso_año ASC LIMIT $inicio,$registros";
	$consulta_total="SELECT COUNT(curso_id) FROM cursos WHERE curso_id = '$curso'";

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
        <thead class="thead">
            <tr>
                <th>#</th>
                <th>Curso / Grado</th>
                <th>Trayecto</th>
                <th>Evaluacion Teorica</th>
                <th>Evaluacion Practica</th>
            </tr>
        </thead>
        <tbody>
	';
	if($total>1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$paginador_inicial=$inicio+1;
		foreach($datos as $filas) {
			if ($filas['curso_grado']!=0) {
                	$grado=$filas['curso_grado'];
                }else{
                	$grado="";
                }
			$tabla.='
			<tr>
                <td>'.$contador.'</td>
                <td>'.$filas['curso_nombre'].''.$grado.'</td>
                <td>'.$filas['curso_mes']."/".$filas['curso_año'].'</td>
                <td></td>
                <td></td>
                	<td>
                    	<a href="index.php?vista=curso_profile&curso_id_up='.$filas['curso_id'].'">Ver</a>
                    </td>';
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
		$tabla.='<p>Mostrando cursos <strong>'.$paginador_inicial.'</strong> al <strong>'.$paginador_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

	$conexion=null;
	echo $tabla;

	if($total>=1 && $pagina<=$Npaginas){
		echo paginador_tablas($pagina,$Npaginas,$url,7);
	}
?>
<script src="./js/buscador.js"></script>
