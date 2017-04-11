<?php 
	if ($personal_get == '' && $inmuebles_get =='' && $checklist_get == '' && $costos_get == '' && $reportes_get == '') {
		include("panel_sys/general_clientes.php");
	}
	if ($personal_get != '') {
		if ($personal_get == 'listado') {
			include("panel_sys/personal/listado_personal.php");
		}
		if ($personal_get == 'info') {
			include("panel_sys/personal/info_personal.php");	
		}
		if ($personal_get == 'alta') {
			include("panel_sys/personal/alta_personal.php");
		}
		if ($personal_get == 'baja') {
			include("panel_sys/personal/baja_personal.php");
		}
	}
	if ($inmuebles_get != '') {
		if ($inmuebles_get == 'listado') {
			include("panel_sys/inmuebles/listado_inmuebles.php");
		}
		if ($inmuebles_get == 'info') {
			include("panel_sys/inmuebles/info_inmueble.php");
		}
		if ($inmuebles_get == 'alta') {
			include("panel_sys/inmuebles/alta_inmueble.php");
		}
		if ($inmuebles_get == 'baja') {
			include("panel_sys/inmuebles/baja_inmueble.php");
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
	}
	if ($costos_get != '') {
		include("panel_sys/costos/principal.php");
	}
	if ($reportes_get !='') {
		echo "Estas en reportes";
	}
?>