<?php 
	include("../funciones.php");
	$id_sala = sanitizar_get("id_sala");
	$delete  = consulta_gen("DELETE FROM salas_juntas WHERE id_sala ='$id_sala'");
	$delete  = consulta_gen("DELETE FROM reservas_juntas WHERE id_sala ='$id_sala'");
?>