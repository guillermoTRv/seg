	<?php 
		if ($hrs_inicio < $rango_redon_for) {
			$minutos_a_horasIn = $min_inicio/60; 
			$oper_b          = ((($hrs_inicio+$minutos_a_horasIn)-$hora_inicio_turno)/$rango_redon)*100;

			$minutos_a_horasFn = $min_fin/60;
			$oper_c = ((($hrs_fin+$minutos_a_horasFn)-($hrs_inicio+$minutos_a_horasIn))/$rango_redon)*100;

			$oper_e = ($oper_b+$oper_c)-100;
			$oper_f = 100-$oper_b;
	}
	if ($oper_b != 0) {
	?>
	<div class='disponible' style="display:inline-block;height:30px;width:<?php echo $oper_b ?>%;background-color:brown;margin-right:-5px;border:1px solid black">
		  	<p class="p_hora_mens"><?php echo $hrs_inicio."-".$rango_redon_for."-".round($oper_b,3) ?></p>
	</div>
	<?php
	}
	?>
	<div class='disponible' style="display:inline-block;height:30px;width:<?php echo $oper_f ?>%;background-color:purple;margin-right:-5px;border:1px solid black">
		  	<p class="p_hora_mens"><?php echo $hrs_fin."-".$rango_redon_for."-".round($oper_f,3) ?></p>
	</div>
	