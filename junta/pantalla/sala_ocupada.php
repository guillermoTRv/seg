<?php 
	$oper_o = consulta_array("SELECT * FROM reservas_juntas WHERE dia = '$fecha' and id_sala = '$id_sala' AND (tiempo_inicio <= '$tiempo_actual' AND tiempo_fin >= '$tiempo_actual') ");
	$type = "en uso";
	include("pantalla/consultas_hechas.php");
?>	

	<h2 class="center" style="font-size:1.8em"><span class="icon-briefcase"></span> La sala se encuentra ocupada</h2>
	<h4 class="center"><span class="icon-history"></span> Tiempo restante:</h4>
	<div>
		<center>
			<div id="DateCountdown" data-date="<?php echo $data_data ?>" style="width: 100%;"></div>	
		</center>
	</div>