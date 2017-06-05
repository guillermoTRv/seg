<?php 
	include("get.php");
	
	if ($qr != '') {
		include("panel_sys/registro_es/registro_qr.php");
	}

	if ($personal_get == '' && $inmuebles_get =='' && $checklist_get == '' && $reportes_get == '' && $qr == '') {
		if ($type_personal == "guardia") {
			include("panel_sys/registro_es/registro_qr.php");
		}
		if ($type_personal == "supervisor") {
			include("panel_sys/supervisor/info_general.php");
		}
	}

	if ($personal_get != '') {
	
		if ($personal_get == 'listado') {
			include("panel_sys/supervisor/listado_personal.php");
		}
		if ($type_personal == "supervisor" && $personal_get == "info") {
			include("panel_sys/supervisor/info_personal.php");
		}
		if ($type_personal == "supervisor" && $personal_get == "horarios") {
			include("panel_sys/supervisor/manejo_horarios.php");
		}
		if ($type_personal == "supervisor" && $personal_get == "hr") {
			include("panel_sys/supervisor/administrar_horario.php");
		}
		if ($type_personal == "guardia" && $personal_get == "mi_horario") {
			include("panel_sys/guardia/mi_horario.php");
		}
	}


	if ($inmuebles_get != '') {
		if ($inmuebles_get == "listado") {
			include("panel_sys/supervisor/listado_inmuebles.php");	
		}
		if ($inmuebles_get == "info") {
			include("panel_sys/inmuebles/info_inmueble.php");	
		}
	}
	
	if ($checklist_get != '') {
		if ($checklist_get == 'listado') {
			include("panel_sys/checklist/listado_checklist.php");
		}
		if ($checklist_get == 'alta') {
			include("panel_sys/checklist/alta_checklist.php");	
		}
		if ($checklist_get == 'baja') {
			include("panel_sys/checklist/baja_checklist.php");
		}

		if ($checklist_get == 'llenar' && $type_personal == "guardia") {
			include("panel_sys/guardia/llenar_checklist.php");
		}
	}

	if ($reportes_get != '') {
		if ($reportes_get != '' && $type_personal == 'guardia') {
			include("panel_sys/reportes/crear_reporte.php");	
		}
	}


	
?>