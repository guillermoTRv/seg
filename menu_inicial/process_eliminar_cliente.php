<?php 
	include("../funciones.php");
	$id_cliente = sanitizar("id_cliente");
	$pass = sanitizar("pass");
	if ($pass != '') {
		if ($pass == $permiso) {
			$delete = consulta_gen("DELETE FROM clientes WHERE id_cliente = '$id_cliente'");
			#$delete = consulta_gen("DELETE From ")
			echo "El cliente ha sido dado de  baja junto con todos los inmubles y usuarios relacionados";
		}
		else{
			echo "Codigo de autorización incorrecto";
		}
	}
?>