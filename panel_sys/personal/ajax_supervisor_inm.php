<?php 
	session_start();
	if ($_SESSION['type_user'] == "admi" ) {
		include("../../funciones.php");
		$id_inmueble = sanitizar_get("val");
		$consulta_val = consulta_val("SELECT null FROM inmuebles WHERE id_inmueble = '$id_inmueble' and supervisor != 'Aun no cuenta'");
		if ($consulta_val == 0) {
			echo 11;
		}
		else{
			echo 22;
		}
	}
	else{
		echo "ataque";
	}
?>