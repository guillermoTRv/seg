	<?php 
	$minutos_a_horasIn = $min_inicio/60; 
	$oper_b          = (((($hrs_inicio+$minutos_a_horasIn)-$hora_inicio_turno)/$rango_redon)*100)-100;

	$minutos_a_horasFn = $min_fin/60;
	$oper_c = ((($hrs_fin+$minutos_a_horasFn)-($hrs_inicio+$minutos_a_horasIn))/$rango_redon)*100;

	
	if ($rango_mitad != $rango_redon) {
		$oper_e = 100.15-($oper_b+$oper_c+$width);
	}
	else{
		$oper_e = 100.15-($oper_b+$oper_c);
	}
	
	if ($oper_b != 0) {
	?>
	<div class='disponible' <?php echo $datas ?> style="display:inline-block;height:30px;width:<?php echo $oper_b ?>%;background-color:brown;margin-right:-5px;border:1px solid black">
		  	<p class="p_hora_mens">Disponible</p>
	</div>
	<?php
	}
	?>
	<div class='disponible' <?php echo $datas_con ?> style="display:inline-block;height:30px;width:<?php echo $oper_c ?>%;background-color:purple;margin-right:-5px;border:1px solid black">
		  	<p class="p_hora_mens">R</p>
	</div>
	<?php 
	if ($oper_e != 0) {
	?>
	<div class='disponible' <?php echo $datas ?> style="display:inline-block;height:30px;width:<?php echo $oper_e ?>%;background-color:brown;margin-right:-3px;border:1px solid black">
		  	<p class="p_hora_mens">Disponible</p>
	</div>
	<?php
	}
	?>