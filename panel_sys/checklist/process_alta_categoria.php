<?php 
	session_start();
	if ($_SESSION['type_user'] == 'admi') {
		include("../../funciones.php");
		$inmueble = sanitizar("inmueble_txt");
		$categoria = sanitizar("categoria_txt");
		$consulta_val = consulta_val("SELECT categoria FROM checklist_categoria WHERE id_inmueble='$inmueble' and categoria='$categoria'");
		if ($consulta_val == 0) {
			$crear_categoria = insertar("INSERT INTO checklist_categoria(id_inmueble,categoria,fecha_creacion,fecha_modificacion,estatus) values('$inmueble','$categoria','$fecha','$fecha','00')");
			echo "La categoria se creo exitosamente";

		}
		else{
			echo "La anterior categoria ya estaba registrada";
		}
	}
	else{
		echo "Ataque";
	}
?>