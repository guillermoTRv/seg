<?php 
	session_start();
	if ($_SESSION['type_user'] == 'admi' or isset($_SESSION['supervisor'])) {
		include("../../funciones.php");
		$id_situacion = sanitizar("situacion_val");
		$name_situacion = sanitizar("situacion_txt");
		$delete = consulta_gen("DELETE FROM checklist_situacion WHERE id_situacion = '$id_situacion'");
		echo "<br><h4>La situacion <strong>$name_situacion</strong> fue eliminada exitosamente </h4>";

	}
?>