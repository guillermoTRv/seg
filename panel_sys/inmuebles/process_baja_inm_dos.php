<?php 
	session_start();
	if ($_SESSION['type_user'] == "admi") {
		include("../../funciones.php");
		$intento = sanitizar("codigo");
		if ($intento == 1234) {
			$identificador = sanitizar("identificador_txt");
			$delete = consulta_gen("DELETE FROM inmuebles WHERE identificador ='$identificador'");
			echo "<br> <strong> EL inmueble ah sido dado da baja exitosamente </strong>";
		}
		else{
			echo "00";
		}
	}
?>