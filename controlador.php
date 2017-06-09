<?php 
	if ($personal_get == '' && $inmuebles_get =='' && $checklist_get == '' && $costos_get == '' && $reportes_get == '' && $clientes_get == '') {
		include("panel_sys/general_clientes.php");
	}
	if ($personal_get != '') {
		if ($personal_get == 'listado') {
			include("panel_sys/personal/listado_personal.php");
		}
		if ($personal_get == 'info') {
			include("panel_sys/personal/info_personal.php");	
		}
		

		if ($personal_get == 'opciones_alta') {
			include("panel_sys/personal/opciones_alta_personal.php");
		}
		if ($personal_get == 'alta_guardia') {
			include("panel_sys/personal/alta_personal_guardia.php");
		}
		if ($personal_get == 'alta_supervisor') {
			include("panel_sys/personal/alta_personal_supervisor.php");
		}
		if ($personal_get == 'alta_cliente') {
			include("panel_sys/personal/alta_personal_cliente.php");
		}
		

		if ($personal_get == 'baja') {
			include("panel_sys/personal/baja_personal.php");
		}
		

		if ($personal_get == 'modificar_personal') {
			include("panel_sys/personal/modificar_busqueda.php");
		}
		if ($personal_get == 'opciones_modificar_usuario') {
			include("panel_sys/personal/opciones_modificar_usuario.php");	
		}
		if ($personal_get == 'mod_datos_generales_usuario') {
			include("panel_sys/personal/modificar_generales_usuario.php");	
		}
		if ($personal_get == 'mod_fotografia_usuario') {
			include("panel_sys/personal/modificar_fotografia_usuario.php");	
		}
		if ($personal_get == 'mod_puesto_usuario') {
			include("panel_sys/personal/modificar_puesto_usuario.php");	
		}
		if ($personal_get == 'mod_inmuebles_usuario') {
			include("panel_sys/personal/modificar_inmuebles_usuario.php");	
		}
		if ($personal_get == 'mod_password_usuario') {
			include("panel_sys/personal/modificar_password_usuario.php");	
		}
		if ($personal_get == "historial_reportes") {
			include("panel_sys/personal/historial_reportes.php");
		}
		if ($personal_get == "historial_asistencias") {
			include("panel_sys/personal/historial_asistencias.php");
		}
		if ($personal_get == "costos_personal") {
			include("panel_sys/personal/costos_personal.php");
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
		if ($inmuebles_get == 'modificar_busqueda') {
			include("panel_sys/inmuebles/modificar_busqueda.php");
		}
		if ($inmuebles_get == 'modificar_inmueble') {
			include("panel_sys/inmuebles/modificar_inmueble.php");
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
	if ($reportes_get !='') {
		if ($reportes_get == 'todos') {
			include("panel_sys/reportes/opciones_reportes.php");
		}
		if ($reportes_get == 'general') {
			include("panel_sys/reportes/reportes_generales.php");
		}
		if ($reportes_get == 'personal') {
			include("panel_sys/reportes/personal_reportes.php");
		}
		if ($reportes_get == 'inmuebles') {
			include("panel_sys/reportes/inmuebles_reportes.php");
		}
		if ($reportes_get == 'costos') {
			# code...
		}
	}
	if ($clientes_get != '') {
		if ($clientes_get == 'alta') {
			include("panel_sys/clientes/alta_cliente.php");
		}
	}
?>