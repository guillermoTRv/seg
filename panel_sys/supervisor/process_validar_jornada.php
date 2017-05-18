<?php 
	
	$otra_jr = sanitizar("checkbox_ck");

	if ($otra_jr == "otra_jornada") {
		$validar_jornada_uno = consulta_val("SELECT null FROM jornadas_trabajo 
													 WHERE fecha_entrada = '$fecha_entrada_post'");
		if ($validar_jornada_uno == 0) {
			$insertar_jornada = consulta_gen("INSERT INTO jornadas_trabajo(identificador,id_registro_es,estado,fecha_entrada,fecha_salida,hora_entrada,hora_salida,type_jornada) 
				VALUES('$identificador','0','$estado','$fecha_entrada_post','$fecha_salida','$hora_entrada','$hora_salida','$type_jornada')");
			echo "Los datos se subieron exitosamente";
		}

		if ($validar_jornada_uno > 0 && $validar_jornada_uno < 3) {
			        
			        $validar_jornada_dos = consulta_tx("SELECT hora_salida FROM jornadas_trabajo WHERE fecha_entrada = '$fecha_entrada_post' order by id_jornada desc","hora_salida");
					
					if ($hora_entrada > $validar_jornada_dos ) {
						##
						$insertar_jornada = consulta_gen("INSERT INTO jornadas_trabajo(identificador,id_registro_es,estado,fecha_entrada,fecha_salida,hora_entrada,hora_salida,type_jornada) 
						VALUES('$identificador','0','$estado','$fecha_entrada_post','$fecha_salida','$hora_entrada','$hora_salida','$type_jornada')");
					}
					else{
						echo "No se puede proceder con el registro debido a que los datos que se ingresan se superponen a una Jornada registrada";
					}
		}
		else{
			echo "No se pueden registrar mas de 2 jornadas en un mismo día";
		}
	}
	else{
		$validar_jornada_uno = consulta_val("SELECT null FROM jornadas_trabajo 
													 WHERE fecha_entrada = '$fecha_entrada_post'");
		if ($validar_jornada_uno == 0) {
			$insertar_jornada = consulta_gen("INSERT INTO jornadas_trabajo(identificador,id_registro_es,estado,fecha_entrada,fecha_salida,hora_entrada,hora_salida,type_jornada) 
				VALUES('$identificador','0','$estado','$fecha_entrada_post','$fecha_salida','$hora_entrada','$hora_salida','$type_jornada')");
			echo "Los datos se subieron exitosamente";
		}
		else{
			echo "Jornada única. Para cambiar esta situación marque el recuadro de arriba";
		}
	}
?>