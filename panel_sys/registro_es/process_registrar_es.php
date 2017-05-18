<?php 
	include("../../funciones.php");
	$identificador = sanitizar("identificador_txt");
	$inmueble      = sanitizar("inmueble_slc");
	$puesto        = sanitizar("puesto_txt");
	$name_inmueble = consulta_tx("SELECT name_inmueble FROM inmuebles WHERE id_inmueble = '$inmueble'","name_inmueble");
	$insertar_registro  = consulta_gen("INSERT INTO registros_es(
		identificador,
		hora_entrada,
		hora_salida,
		estado_registro,
		inmueble,
		personal,
		fecha_rango,
		cumplio_repo
		) 
		VALUES(
		'$identificador',
		'$fecha_hora',
		'$fecha_hora',
		'entrada',
		'$inmueble',
		'$puesto',
		'$fecha',
		'--'
		)");
	
    $array_jornada  = consulta_array("SELECT estado_registro,inmueble,id_registro_es FROM registros_es WHERE identificador = '$identificador' order by id_registro_es desc");
    $id_registro_es     = $array_jornada['id_registro_es'];


		?>
			<h3>
				Fecha de registro de la entrada 
				<br><strong>
					<?php echo $fecha ?> 
				</strong>
			</h3>
			<h3>
				Hora de registro
				<br>
				<strong>
					<?php echo $hora ?>
				</strong>
			</h3>
			<h3>
				Inmueble de registro
				<br><strong>
					<?php echo $name_inmueble ?>
				</strong>
			</h3>
			<h3>
				¡Que tenga un buen dia de trabajo! 
			</h3>
			<br>
		<?php


?>