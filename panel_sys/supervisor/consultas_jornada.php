<?php 
	$dia           = date("d");
	$year          = date("Y");
	$controler     = "no";
	$ultimoDiaMes  = date("d",(mktime(0,0,0,$month+1,1,$year)-1));	
	$month         = date("n");
	for ($i=0; $i < 7; $i++) { 
					
		if ($controler == "no") {
			$secuencia =  $dia + $i;
		}
				
		if ($secuencia > $ultimoDiaMes) {
			$controler = "yes";
			$secuencia = 0;
			$month = $month +1;
		}

		if ($controler == "yes") {
			$secuencia ++;
		}

		$secuencia;
		$fecha_calendario = $year."-".$month."-".$secuencia;


		$consulta_jornada = consulta_val("SELECT * FROM jornadas_trabajo WHERE fecha_entrada = '$fecha_calendario' and identificador = '$val'");
		if ($consulta_jornada == 0) {
			$mes_entrada = substr($fecha_calendario,5);
			$mes_entrada = substr($mes_entrada,0,-3)
			?>
			<tr class="active"> 
				<td>--</td>
				<td><?php saber_dia($fecha_calendario);echo $secuencia ?></td>
				<td><?php mes_castellano($month) ?></td>
				<td>Por <?php echo $mes_entrada ?></td>
				<td>Por definir</td>
				<td>Por definir</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='' data-toggle="modal" data-target="#<?php echo $secuencia ?>" class='btn_cambio' style='color:#5296E9'><span class='icon-cog'></span></a></td>
			</tr>
			<?php
			include("panel_sys/supervisor/modal_form_horario_uno.php");	
		}
		if ($consulta_jornada == 2){
			#se repite una fila para esa fecha
		}
		if ($consulta_jornada == 1) {
			
		}

	}	
	#estados cumplido definido por defini falto retraso
?>