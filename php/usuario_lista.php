<?php
	
	$inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
	$tabla="";
	
	$consulta_datos="SELECT * FROM usuarios WHERE usuario_id!='".$_SESSION['id']."' ORDER BY usuario_id ASC LIMIT $inicio,$registros";
	$consulta_total="SELECT COUNT(usuario_id) FROM usuarios WHERE usuario_id!='".$_SESSION['id']."'";

	$conexion =conexion();

	$datos=$conexion->query($consulta_datos);
	$datos=$datos->fetchALL();

	$total=$conexion->query($consulta_total);
	$total=(int) $total->fetchColumn();

	$Npaginas=ceil($total/$registros);

	$tabla.='
	<div>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>USUARIO</th>
					<th>ROL</th>
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
					<td>'.$filas['usuario_usuario'].'</td>
					<td>'.$filas['usuario_rol'].'></td>
					<td>
						<a href="index.php?vista=usuario_update&user_id_up='.$filas['usuario_id'].'"><img class="img-btn-edit" src="./Imagenes/edit.svg"></a>
						<a href="'.$url.$pagina.'&user_id_del='.$filas['usuario_id'].'"><img class="img-btn-delete" onclick="return Delete()" src="./Imagenes/eliminar.svg"></button></a>
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
			</div>';

	if($total>0 && $pagina<=$Npaginas){
		$tabla.='<p>Mostrando usuarios <strong>'.$paginador_inicial.'</strong> al <strong>'.$paginador_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

	$conexion=null;
	echo $tabla;

	if($total>=1 && $pagina<=$Npaginas){
		echo paginador_tablas($pagina,$Npaginas,$url,7);
	}
?>
<script type="text/javascript">
	function Delete()
	{
		var respuesta = confirm("¿Estas seguro de eliminar este usuario?");

		if (respuesta == true) {
			return true;
		}else{
			return false;
		}
	}
</script>
