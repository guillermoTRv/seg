<?php 
	$controler = sanitizar_get("cont");
	if ($controler == '') {
		include("menu_inicial/vista_general.php");
	}
	if ($controler == 'listado') {
		include("menu_inicial/listado_clientes.php");
	}
	if ($controler == 'alta') {
		include("menu_inicial/alta_clientes.php");
	}
	if ($controler == 'lista_modificar') {
		include("menu_inicial/lista_modificar_cliente.php");
	}
	if ($controler == 'modificar') {
		include("menu_inicial/modificar_cliente.php");
	}
	if ($controler == 'lista_eliminar') {
		include("menu_inicial/lista_eliminar_cliente.php");
	}
	if ($controler == 'eliminar') {
		include("menu_inicial/eliminar_cliente.php");
	}

?>