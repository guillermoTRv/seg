<?php 
	include("../funciones.php");
	$name_sala   = sanitizar("sala_txt");
	$hora_inicio = sanitizar("hora_inicio_txt");
	$hora_fin    = sanitizar("hora_fin_txt");
	$ini_equipo  = sanitizar("ini_equipo");
	$fin_equipo  = sanitizar("fin_equipo");

	$val = consulta_val("SELECT null FROM salas_juntas WHERE name_sala ='$name_sala'");
	if ($val == 0) {
			$insertar    = consulta_gen("INSERT INTO salas_juntas(name_sala,hora_inicio,hora_fin,fecha_registro,estado) values('$name_sala','$hora_inicio','$hora_fin','$fecha_hora','libre')");
			echo "00";

			$id_sala = consulta_tx("SELECT id_sala FROM salas_juntas WHERE name_sala = '$name_sala'","id_sala");

			for ($i=$ini_equipo; $i <=$fin_equipo ; $i++) { 
				$val_equipo_post = sanitizar($i);
				if ($val_equipo_post != '') {
					$insert_equipo = consulta_gen("INSERT INTO equipo_salas(id_sala,name_equipo) values('$id_sala','$val_equipo_post')");			
				}		
			}	
	}
	else{
		echo "El nombre que este ingresando para la sala ya había sido registrado";
	}

?>