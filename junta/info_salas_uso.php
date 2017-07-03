<?php 
	$hora   =  date("H")."<br>";
	$minuto =  date("i");
	$tiempo_actual = $hora+($minuto/60);
	
	$consulta_uso = consulta_val("SELECT null FROM reservas_juntas WHERE dia = '$fecha' and hora_inicio='$hora' or hora_finalizacion='$hora'");
	if ($consulta_uso > 0) {
		$consulta = mysqli_query($q_sec,"SELECT hora_inicio,min_inicio,hora_finalizacion,min_fin FROM reservas_juntas WHERE dia = '$fecha' and hora_inicio='$hora' or hora_finalizacion='$hora'" );
		$cont = 0;
		while ($consulta_horario = mysqli_fetch_array($consulta)) {
		
			$hora_inicio       = $consulta_horario['hora_inicio'];
			$min_inicio        = $consulta_horario['min_inicio'];
			$hora_finalizacion = $consulta_horario['hora_finalizacion'];
			$min_fin           = $consulta_horario['min_fin'];

			$tiempo_inicio = $hora_inicio+($min_inicio/60);
			$tiempo_final  = $hora_finalizacion+($min_fin/60);
			

			if ($tiempo_inicio<$tiempo_actual && $tiempo_actual<$tiempo_final) {
				if ($cont == 0) {
				 	$cont = 1;
					$cont;
				}
				else{
				$cont = $cont +1;
				$cont;
				}
			}
		}
		if ($cont > 0) {
			if ($cont == 1) {
				$mens_uso = "En este momento hay una sala en eso - Ver detalle";
			}
			if ($cont > 1) {
				$mens_uso = "En este momento hay $cont salas en uso - Ver detalle";
			}
		}
	}
	else{
		$mens_uso = "En este momento no hay salas ocupadas";
	}
?>
<h3 class=""><a href=""><span class="icon-clock sombra_textos"></span> <?php echo $mens_uso ?></a></h3>