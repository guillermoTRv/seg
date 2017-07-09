<?php 
	include("../funciones.php");
	$pass_xc      = sanitizar("pass_txt");
	$id_sala      = sanitizar("sala_txt");
	$id_usuario   = sanitizar("id_usuario_txt");
	$fecha        = sanitizar("dia_txt");
	$hora_inicio  = sanitizar("hrs_ini_txt");
	$min_inicio   = sanitizar("min_ini_txt");
	$hora_fin     = sanitizar("hrs_fin_txt");
	$min_fin      = sanitizar("min_fin_txt");
	$conf_snaks	  = sanitizar("input_conf_snaks");
	$detalles_txt = sanitizar("detalles_txt");

	$pass_consulta = consulta_tx("SELECT pass_xc FROM usuarios WHERE id_usuario = '$id_usuario'","pass_xc");
	$tiempo_inicio = $hora_inicio+($min_inicio/60);
	$tiempo_fin    = $hora_fin+($min_fin/60);

	if ($hora_inicio < 10) {
		$hora_inicio = "0".$hora_inicio;
	}
	if ($min_inicio < 10) {
		$min_inicio = "0".$min_inicio;
	}
    $fecha_fregona = $fecha." ".$hora_inicio.":".$min_inicio.":00";
 

	if ($pass_consulta == $pass_xc) {
		$insertar_reserva = consulta_gen("INSERT INTO reservas_juntas(id_sala,id_usuario,dia,hora_inicio,min_inicio,tiempo_inicio,fecha_inicio,hora_finalizacion,min_fin,tiempo_fin,snaks,detalles,estado) VALUES('$id_sala','$id_usuario','$fecha','$hora_inicio','$min_inicio','$tiempo_inicio','$fecha_fregona','$hora_fin','$min_fin','$tiempo_fin','$conf_snaks','$detalles_txt','en proceso')");
		if ($conf_snaks == "si") {
			$id_reserva = consulta_tx("SELECT id_reserva FROM reservas_juntas WHERE id_usuario = '$id_usuario' order by id_reserva desc","id_reserva");
			$snak_first = sanitizar("snak_last");
			$snal_last  = sanitizar("snak_first");
			for ($i=$snak_first; $i <= $snal_last ; $i++) { 
				$var_snak = sanitizar($i);
				if ($var_snak == '') {
					
				}
				else{
					$insert_snak = consulta_gen("INSERT INTO snaks(id_reserva,snak) VALUES('$id_reserva','$var_snak')");
				}
			}
		}
		echo 00;
	}
	else{
		echo 11;
	}
?>