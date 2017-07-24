<?php 
	include("../funciones.php");
	$id_sala = sanitizar_get("id_sala");
	$fecha_junta = sanitizar_get("fecha_junta");
	$consulta_sala = consulta_array("SELECT * FROM salas_juntas WHERE id_sala = '$id_sala'","name_sala");
	$hora_inicio_turno = tiempo($consulta_sala['hora_inicio']);
	$hora_fin_turno    = tiempo($consulta_sala['hora_fin']);
	//$fecha_dia = sanitizar_get("fecha_dia");
	$uno = "Horario de la sala: De $hora_inicio_turno hrs A: $hora_fin_turno hrs";

	$disponibilidad_dia = mysqli_query($q_sec,"SELECT * FROM reservas_juntas WHERE dia = '$fecha_junta' and id_sala='$id_sala' order by hora_inicio asc");
 	$num_dis = 0;
 	$consulta_val = consulta_val("SELECT * FROM reservas_juntas WHERE dia = '$fecha_junta' and id_sala='$id_sala'");
 	if ($consulta_val > 0) {
 	 	while ($array_disponibilidad = mysqli_fetch_array($disponibilidad_dia)) {
	 		$hora_inicio_dis = tiempo($array_disponibilidad['hora_inicio']);
	 		$min_inicio_dis  = tiempo($array_disponibilidad['min_inicio']);
	 		$hora_fin_dis    = tiempo($array_disponibilidad['hora_finalizacion']);
	 		$min_fin_dis     = tiempo($array_disponibilidad['min_fin']);
	 		if ($num_dis == 0) {
	 			$ocupado         = "De ".$hora_inicio_dis.":".$min_inicio_dis." a ".$hora_fin_dis.":".$min_fin_dis." ";
	 			$num_dis = 1;
	 		}
	 		else{
	 			$ocupado         = " - De ".$hora_inicio_dis.":".$min_inicio_dis." a ".$hora_fin_dis.":".$min_fin_dis." ";
	 		}
	 		$ocupado_conca   .= $ocupado;
	 	}
	 	$two = "Ocupada en los siguientes horarios: ".$ocupado_conca;
 	}
 	if ($consulta_val == 0) {
 		$two = "La esta disponible para cualquier hora en turno";
 	} 
 	


	$respuesta=[
			'uno'    => $uno,
			'dos'    => $two,
			'tres'   => $hora_inicio_turno,
			'cuatro' => $hora_fin_turno
		];
	echo json_encode($respuesta);

?>
