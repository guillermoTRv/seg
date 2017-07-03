<?php 
	$consulta_cercana = consulta_array("SELECT * FROM  reservas_juntas WHERE id_usuario = '$id_usuario_session' and estado ='en proceso' order by dia asc");
	$dia = $consulta_cercana['dia'];
	$datetime1 = date_create($fecha);
	$datetime2 = date_create($dia);
	$interval  = date_diff($datetime1, $datetime2);
	$restantes = $interval->format('%a');
	$sala  = consulta_tx("SELECT name_sala FROM salas_juntas WHERE id_sala = '".$consulta_cercana['id_sala']."'","name_sala");

	$hora_inicio   = $consulta_cercana['hora_inicio'];
	$minuto_inicio = $consulta_cercana['min_inicio'];
	if ($hora_inicio < 10) {
		$hora_inicio = "0".$hora_inicio;
	}
	if ($minuto_inicio < 10) {
		$minuto_inicio = "0".$minuto_inicio;
	}
	$hora_construida = $hora_inicio.":".$minuto_inicio;
	if ($restantes == 0) {
		$mens_cercano = "Hoy es su junta en $sala a las $hora_construida hrs";
	}
	if ($restantes == 1) {
		$mens_cercano = "Falta un día para que sea su proxima junta en $sala a las $hora_construida hrs ";
	}
	if ($restantes > 1) {
		$mens_cercano = "Faltan $restantes dias para que sea su proxima Junta en $sala comience a las $hora_construida hrs";
	}
?>
<h3 class="sombra_texto"><a><span class="icon-history sombra_textos"></span> <?php echo $mens_cercano ?>  </a> </h3>
<!--ss  Faltan 2 horas para que su junta comience en sala uno
faltan 2 ia para que su proxima junta comience a las 12:12
hoy fue su junta a las 12 su proxima junta es a las 12
-->
