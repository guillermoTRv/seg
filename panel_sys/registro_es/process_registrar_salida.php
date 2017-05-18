<?php 
	include("../../funciones.php");

	function conversorSegundosHoras($tiempo_en_segundos) {
		$horas = floor($tiempo_en_segundos / 3600);
		$minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
		$segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);

		return $horas . ' horas ' . $minutos . " minutos " . $segundos." segundos";
	}


	$identificador = sanitizar("identificador_txt");
	$type_salida   = sanitizar("type_salida_txt");
	$hora_entrada  = sanitizar("hora_entrada_txt");

	$segundos= strtotime('now')-strtotime($hora_entrada);
	$horas = $segundos/3600;

	$id_registro_es  = consulta_tx("SELECT id_registro_es FROM registros_es WHERE estado_registro = 'entrada' and identificador = '$identificador' order by id_registro_es desc","id_registro_es");
	$turno = conversorSegundosHoras($segundos);

	$registro_salida = consulta_gen("UPDATE registros_es SET hora_salida = '$fecha_hora',estado_registro='correcto',cumplio_repo='$type_salida' WHERE id_registro_es = '$id_registro_es'");

	
	echo "<h3>SE REGISTRO EXITOSAMENTE LA SALIDA</h3>";
	echo "<h3>Usted cumplio un turno de <br><strong>$turno<strong></h3>";
	

	

?>