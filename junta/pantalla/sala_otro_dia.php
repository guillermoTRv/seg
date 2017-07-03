<?php 
	$oper_c = consulta_tx("SELECT dia FROM reservas_juntas WHERE dia > '$fecha' and id_sala = '$id_sala' order by dia asc","dia");
	$fecha  = $oper_c;
	$oper_o = consulta_array("SELECT * FROM reservas_juntas WHERE dia='$oper_c' and id_sala='$id_sala' order by hora_inicio asc");
	$type = "manana";
	include("pantalla/consultas_hechas.php");
	$mes_sigp = substr($oper_c,5,2);
	$dia_sigp = substr($oper_c,8,2);
?>
<h2 class="center" style="font-size:1.8em"><span class="icon-briefcase"></span> La sala no se encuentra ocupada</h2>
<h3 class="center">La próxima junta será el <?php echo saber_dia($oper_c)." $dia_sigp de ";mes_castellano($mes_sigp) ?> a las <?php echo $hora_armada_ini ?>hrs</h3><br>		