<?php 
	include("../funciones.php");
	$dia_fecha     = sanitizar("dia_txt");
	$id_sala       = sanitizar("sala_txt");
	$consulta_disponibilidad = consulta_val("SELECT * FROM reservas_juntas WHERE id_sala ='$id_sala' and dia = '$dia_fecha'");
	if ($consulta_disponibilidad == 0) {
		$mensaje_horarios  = "La sala esta disponible para cualquier hora en turno";
	}
	else{
		$mensaje_horarios = "La sala presenta ocupación en los horarios que se le presentan a continuación";
	}

	$oper_a = strlen($dia_fecha);
	if ($oper_a == 9) {
		$year_construc = substr($dia_fecha,0,4);
		$mes_construc = substr($dia_fecha,5,1);
		$dia_construc = substr($dia_fecha,7,2);
		$dia_fecha = $year_construc."-0".$mes_construc."-".$dia_construc;
	}

	$dia_normal    = substr($dia_fecha,8,2);
	$mes_normal    = substr($dia_fecha,5,2);
 	$fecha_armada  = saber_dia($dia_fecha)." $dia_normal de ".mes($mes_normal) ;
	$var = "q3234";
	$vas = "mmffsfW";
	$respuesta=[
			'uno'   => $fecha_armada."<br>".$mensaje_horarios,
			'dos'   => $fecha_armada,
		];
	echo json_encode($respuesta);
?>