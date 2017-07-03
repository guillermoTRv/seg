<?php 
	$oper_o = consulta_array("SELECT * FROM reservas_juntas WHERE dia = '$fecha' and id_sala = '$id_sala' and tiempo_inicio > '$tiempo_actual' order by tiempo_inicio asc");
	$type="hoy";
	include("pantalla/consultas_hechas.php");
?>
<h2 class="center" style="font-size:1.8em"><span class="icon-briefcase"></span> La sala no se encuentra ocupada</h2>
<h3 class="center">La próxima junta será hoy a las <?php echo $hora_armada_ini ?></h3>
<h4 class="center"><span class="icon-history"></span> Tiempo estimado para que comience la proxima Junta:</h4>
<div>
	<center>
		<div id="DateCountdown" data-date="<?php echo $data_data ?>" style="width: 100%;"></div>	
	</center>
</div>