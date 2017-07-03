<?php 
	$controler = sanitizar_get("cont");
	if ($controler == '') {
		include("menu_inicial/vista_general.php");
	}
	if ($controler == 'listado') {
		include("menu_inicial/info_clientes.php");
	}
	if ($controler == 'alta') {
		include("menu_inicial/alta_clientes.php");
	}
?>