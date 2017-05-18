<?php 
	session_start();
	if ($_SESSION["type_user"]=='admi' or isset($_SESSION['supervisor'])) {
		include("../../funciones.php");
		$id_categoria = sanitizar("categoria_txt");
		$situacion = sanitizar("situacion_txt");
		$consulta_val = consulta_val("SELECT situacion FROM checklist_situacion WHERE id_categoria ='$id_categoria' and situacion='$situacion'");
		if ($consulta_val == 0) {
			$insertar = consulta_gen("INSERT INTO checklist_situacion(id_categoria,situacion,fecha_creacion,fecha_modificacion,estatus) VALUES('$id_categoria','$situacion','$fecha','$fecha','00')");
			echo "La situacion se creo exitosamente";
		}
		else{
			echo "La anterior situacion ya estaba registrada para tal categoria";
		}

	}
?>