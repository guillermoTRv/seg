<?php 
	include("../funciones.php");
	$id_reserva  = sanitizar("id_reserva");
	$sala        = sanitizar("sala_txt");
	$fecha_junta = sanitizar("fecha_txt");
	$hora_inicio = sanitizar("hrs_ini");
	$min_inicio  = sanitizar("min_ini");
	$hora_fin    = sanitizar("hrs_fin");
	$min_fin     = sanitizar("min_fin");
	$detalles    = sanitizar("detalles_txt");
	$snaks_ini   = sanitizar("inicio_snak");
	$snaks_fin   = sanitizar("fin_snak");

	$tiempo_inicio = $hora_inicio+($min_inicio/60);
	$tiempo_fin    = $hora_fin+($min_fin/60);
	
	$fecha_inicio = $fecha_junta." ".$hora_inicio.":".$min_inicio;

	if ($snaks_ini != '') {
		$snaks = "si";
		consulta_gen("DELETE FROM snaks WHERE id_reserva ='$id_reserva'");
		for ($i=$snaks_ini; $i <= $tiempo_fin ; $i++) { 
			$input_snak = sanitizar($i);
			if ($input_snak != '') {
				consulta_gen("INSERT INTO snaks(id_reserva,snak) values('$id_reserva','$input_snak')");
			}
		}

	}
	else{
		$snaks = "no";
		consulta_gen("DELETE FROM snaks WHERE id_reserva ='$id_reserva'");
	}

	$consulta_cambiar = consulta_gen("UPDATE reservas_juntas SET id_sala = '$sala',dia='$fecha_junta', hora_inicio='$hora_inicio',min_inicio = '$min_inicio',tiempo_inicio='$tiempo_inicio',fecha_inicio='$fecha_inicio',hora_finalizacion='$hora_fin',min_fin='$min_fin',tiempo_fin='$tiempo_fin',snaks='$snaks',detalles='$detalles' WHERE id_reserva='$id_reserva'");

?>