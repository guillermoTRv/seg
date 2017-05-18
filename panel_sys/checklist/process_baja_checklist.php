<?php 
	session_start();
	error_reporting(E_ALL ^ E_NOTICE);
	if ($_SESSION['type_user']=="admi" or isset($_SESSION['supervisor'])) {
		include("../../funciones.php");
		$valor_id = sanitizar_get("val_id");
		$valor_data = sanitizar_get("val_data");
		if ($valor_id != '') {
			$delete = consulta_gen("DELETE FROM checklist_situacion WHERE id_situacion = '$valor_id'");
		}
		if ($valor_data != '') {
			$delete = consulta_gen("DELETE FROM checklist_categoria WHERE id_categoria = '$valor_data'");
		}
	}
	else{
		echo "ataque";
	}
?>