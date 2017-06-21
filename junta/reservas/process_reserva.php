<?php 
	include("../funciones.php");
	$pass_xc      = sanitizar("pass_txt");
	$id_sala      = sanitizar("sala_txt");
	$id_usuario   = sanitizar("id_usuario_txt");
	$fecha        = sanitizar("dia_txt");
	$hora_inicio  = sanitizar("hora_inicio_txt");
	$hora_fin     = sanitizar("hora_fin_txt");
	$conf_snaks	  = sanitizar("input_conf_snaks");
	$detalles_txt = sanitizar("detalles_txt");


	$pass_consulta = consulta_tx("SELECT pass_xc FROM usuarios WHERE id_usuario = '$id_usuario'","pass_xc");

	if ($pass_consulta == $pass_xc) {
		$insertar_reserva = consulta_gen("INSERT INTO reservas_juntas(id_sala,id_usuario,dia,hora_inicio,hora_finalizacion,snaks,detalles,estado) VALUES('$id_sala','$id_usuario','$fecha','$hora_inicio','$hora_fin','$conf_snaks','$detalles_txt','en proceso')");
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