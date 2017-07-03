<?php 
	$hora   =  date("H")."<br>";
	$minuto =  date("i");
	$tiempo_actual = $hora+($minuto/60);
	$consulta_uso = consulta_val("SELECT null FROM reservas_juntas WHERE dia = '$fecha' and id_sala = '$id_sala' AND (tiempo_inicio <= '$tiempo_actual' AND tiempo_fin >= '$tiempo_actual') ");
	if ($consulta_uso == 1) {
		include("pantalla/sala_ocupada.php");
	}
	else{
		$oper_a = consulta_val("SELECT null FROM reservas_juntas WHERE dia = '$fecha' and id_sala = '$id_sala' and tiempo_inicio > '$tiempo_actual'");
		if ($oper_a > 0) {
			include("pantalla/sala_hoy.php");
		}
		else{
			$oper_x = consulta_val("SELECT null FROM reservas_juntas WHERE dia > '$fecha' and id_sala = '$id_sala'");
			if ($oper_x == 0) {
				?>
				<h2 class="center h2peque"><span class="icon-briefcase"></span> No hay próximas reservas para esta sala</h2>
				<div class="visible-md-block visible-sm-block visible-lg-block">
                    <br>
                </div>
				<?php	
				$type = "sin";
			}
			if ($oper_x > 0) {
				include("pantalla/sala_otro_dia.php");		
				?>
				<br>
				<?php
			}
		}
		
	}
?>
