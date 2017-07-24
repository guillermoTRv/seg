<?php 
	include("../funciones.php");
	echo $id_reserva = sanitizar_get("id_reserva");
	$delete = consulta_gen("DELETE FROM reservas_juntas WHERE id_reserva ='$id_reserva'");
?>