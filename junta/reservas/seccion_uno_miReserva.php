	<?php 
	$minutos_a_horasIn = $min_inicio/60; 
	$oper_b          = ((($hrs_inicio+$minutos_a_horasIn)-$hora_inicio_turno)/$rango_redon)*100;

	$minutos_a_horasFn = $min_fin/60;
	$oper_c = ((($hrs_fin+$minutos_a_horasFn)-($hrs_inicio+$minutos_a_horasIn))/$rango_redon)*100;

	$oper_e = 100-($oper_b+$oper_c);
	
	if ($oper_b != 0) {
	?>
	<div class='disponible' <?php echo $datas ?> style="display:inline-block;height:30px;width:<?php echo $oper_b ?>%;background-color:brown;margin-right:-5px;border:1px solid black;padding-left:2px;padding-top: 1px">
		  	<p class="p_hora_mens"><span class='icon-checkmark'></span></p>
	</div>
	<?php
	}
	?>
	<div class='disponible' <?php echo $datas_con ?> style="display:inline-block;height:30px;width:<?php echo $oper_c ?>%;background-color:rgb(129, 218, 245);margin-right:-5px;border:1px solid black;padding-left: 2px;padding-top: 1px">
		  	<p class="p_hora_mens"><span class='icon-user-check'></span></p>
	</div>
	<?php 
	if ($oper_e != 0) {
	?>
	<div class='disponible' <?php echo $datas ?> style="display:inline-block;height:30px;width:<?php echo $oper_e ?>%;background-color:brown;margin-right:-5px;border:1px solid black;padding-left:2px;padding-top: 1px">
		  	<p class="p_hora_mens"><span class='icon-checkmark'></span></p>
	</div>
	<?php
	}
	?>
	