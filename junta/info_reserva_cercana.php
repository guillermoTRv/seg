<?php 
	$consulta_cercana = consulta_array("SELECT * FROM  reservas_juntas WHERE id_usuario = '$id_usuario_session' and estado ='en proceso' and fecha_inicio > '$fecha_hora'  order by fecha_inicio asc");
	$consulta_val = consulta_val("SELECT null FROM  reservas_juntas WHERE id_usuario = '$id_usuario_session' and estado ='en proceso' and fecha_inicio > '$fecha_hora'  order by fecha_inicio asc");

	if ($consulta_val == 0) {
		$mens_cercano = "No hay proximas reservaciones";
	}
	else{
		$fecha_inicio = $consulta_cercana['fecha_inicio'];
		$dia_reserva = $consulta_cercana['dia'];
		$hora_inicio = tiempo($consulta_cercana['hora_inicio']);
		$min_inicio  = tiempo($consulta_cercana['min_inicio']);
		$hora_construida = $hora_inicio.":".$min_inicio;
		$sala  = consulta_tx("SELECT name_sala FROM salas_juntas WHERE id_sala = '".$consulta_cercana['id_sala']."'","name_sala");

		if ($dia_reserva == $fecha) {
			$mens_cercano = "Su junta es hoy a las $hora_construida hrs ";
		}
		if ($dia_reserva > $fecha) {
			$datetime1 = date_create($fecha);
			$datetime2 = date_create($dia_reserva);
			$interval  = date_diff($datetime1, $datetime2);
			$restantes = $interval->format('%a');
			if ($restantes == 1) {
				$mens_cercano = "Falta un día para que sea su proxima junta en $sala a las $hora_construida hrs";
			}
			if ($restantes > 1) {
				$mens_cercano = "Faltan $restantes dias para que sea su proxima Junta en $sala comience a las $hora_construida hrs";
			}
		}
	}

?>
<h3 class="sombra_texto"><a><span class="icon-history sombra_textos"></span> <?php echo $mens_cercano ?>  </a> </h3>
<!--ss  Faltan 2 horas para que su junta comience en sala uno
faltan 2 ia para que su proxima junta comience a las 12:12
hoy fue su junta a las 12 su proxima junta es a las 12
-->
