<?php 
	session_start();
	if ($_SESSION['type_user'] == "admi" or isset($_SESSION['supervisor'])) {
		include("../../funciones.php");
		$id_categoria = sanitizar("categoria_txt");
		$id_situacion = sanitizar("situacion_txt");
		$val_anterior = sanitizar("val_anterior");
		$val_cambio   = sanitizar("cambio_txt");

		$consulta = consulta_gen("UPDATE checklist_situacion SET situacion = '$val_cambio' where id_situacion='$id_situacion'");

		echo "<h4>La situacion <strong>$val_anterior</strong> ha sido cambiada exitosamente a <strong>$val_cambio</strong> </h4>";
	}
	else{

	}
?>