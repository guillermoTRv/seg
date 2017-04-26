<?php 
	session_start();
	if ($_SESSION['type_user'] == 'admi') {
		include("../../funciones.php");
		$get_inm = sanitizar_get("get_inm");
		if ($get_inm != '') {
				
			$b_inmueble = consulta_val("SELECT name_inmueble FROM inmuebles WHERE name_inmueble = '$get_inm' and supervisor = 'Aun no cuenta'");
			$id_inmueble = consulta_tx("SELECT id_inmueble FROM inmuebles WHERE name_inmueble = '$get_inm' and supervisor = 'Aun no cuenta'","id_inmueble");
			$id_inmueble_c = consulta_tx("SELECT id_inmueble FROM inmuebles WHERE name_inmueble = '$get_inm'","id_inmueble");

			if ($b_inmueble == 1) {
				$respuesta=[
					'uno'   => 0,
					'two'   => $id_inmueble."-",
				];
				echo json_encode($respuesta);

			}
			else{
				$respuesta=[
					'uno'   => 1,
					'two'   => $id_inmueble_c."-",
				];
				echo json_encode($respuesta);
			}


		}
		if ($get_inm == '') {

			include("process_alta_supervisor_two.php");

		}	
	}
	else{
		echo "ataque";
	}
?>