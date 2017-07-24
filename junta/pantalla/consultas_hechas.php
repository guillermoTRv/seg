<?php 
	$hora_inicio_o   = tiempo($oper_o['hora_inicio']);
	$min_inicio_o    = tiempo($oper_o['min_inicio']);
	$hora_armada_ini = $hora_inicio_o.":".$min_inicio_o;
	$hora_fin_o      = tiempo($oper_o['hora_finalizacion']);
	$min_fin_o       = tiempo($oper_o['min_fin']);
	$hora_armada_fin = $hora_fin_o.":".$min_fin_o;
	
	if ($type == 'en uso') {
		$data_data       = $fecha." ".$hora_armada_fin;
	}
	else{
		$data_data       = $fecha." ".$hora_armada_ini;
	}
	
	$id_usuario  = $oper_o['id_usuario'];
	$usuario_uso = consulta_array("SELECT nombre, apellidos FROM usuarios WHERE id_usuario='$id_usuario'");
	$nombre_armado = $usuario_uso['nombre']." ".$usuario_uso['apellidos'];
	$fecha_armada_inicio = $fecha." ".$hora_armada_ini.":00";
	$desp = consulta_val("SELECT null FROM reservas_juntas WHERE id_sala ='$id_sala' and fecha_inicio > '$fecha_armada_inicio'");

	if ($desp > 0) {
		$type_desp = "ok";
		$proxima = consulta_array("SELECT * FROM reservas_juntas WHERE id_sala ='$id_sala' and fecha_inicio > '$fecha_armada_inicio' order by fecha_inicio asc");
		$dia_proximo = $proxima['dia'];
		$dia = substr($dia_proximo,8,2);
		$mes = substr($dia_proximo,5,2);
		$hora_ini_prox = tiempo($proxima['hora_inicio']);
		$min_ini_prox  = tiempo($proxima['min_inicio']);
		$tiempo_ini_prox = $hora_ini_prox.":".$min_ini_prox;
		$hora_fin_prox = tiempo($proxima['hora_finalizacion']);
		$min_fin_prox  = tiempo($proxima['min_fin']);
		$tiempo_fin_prox = $hora_fin_prox.":".$min_fin_prox;
		$data_prox = $dia_proximo." ".$tiempo_ini_prox;

		$id_usuario_prox    = $proxima['id_usuario'];
		$usuario_uso_prox   = consulta_array("SELECT nombre, apellidos FROM usuarios WHERE id_usuario='$id_usuario_prox'");
		$nombre_armado_prox = $usuario_uso_prox['nombre']." ".$usuario_uso_prox['apellidos'];
		if ($dia_proxima == $fecha) {
			$mens_dia = "Hoy a las 2";	
		} 
		else{
			$mens_dia = saber_dia($dia_proximo)." $dia de ".mes($mes);
		}
	}
	else{
		$type_desp = "no";
	}

?>