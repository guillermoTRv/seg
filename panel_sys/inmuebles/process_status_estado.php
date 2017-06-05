<?php 
	include("../../funciones.php");
	$val = sanitizar_get("val");
	$id_inmueble = sanitizar_get("inm");


	$consulta_cambio = consulta_gen("UPDATE estado_inmuebles SET status = 'atendido' WHERE id_est_inm='$val'");
	
	$val_estado = consulta_val("SELECT null FROM estado_inmuebles WHERE id_inmueble = '$id_inmueble' and status != 'atendido'");
	if ($val_estado == 0) {
		$cambio_status = consulta_gen("UPDATE inmuebles SET status = 'si' WHERE id_inmueble='$id_inmueble'");
	}

	echo "00";
?>