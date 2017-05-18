<?php 
	$turno        = consulta_array("SELECT * FROM jornadas_trabajo WHERE identificador = '$val' and fecha_entrada = '$fecha_calendario' order by id_jornada asc");
	$type_jornada  = $turno['type_jornada'];
	$hora_entrada  = $turno['hora_entrada'];
	$hora_salida   = $turno['hora_salida'];
	if ($hora_salida <= $hora_entrada) {
	 	$mensaje_salida = "del dia siguiente";
	}

	if ($hora_entrada < 10) {
		$hora_entrada = $hora_entrada." AM";
	}
	else{
		$hora_entrada  = $hora_entrada." PM";
	}
	if ($hora_salida < 10) {
		$hora_salida = $hora_salida." AM";
	}
	else{
		$hora_salida  = $hora_salida." PM";
	}

	?>
	<tr class="info"> 
		<td><?php echo $type_jornada ?> Horas</td>
		<td><?php saber_dia($fecha_calendario);echo $secuencia ?></td>
		<td><?php mes_castellano($month) ?></td>
		<td><?php echo $hora_entrada ?></td>
		<td><?php echo $hora_salida ?> <?php echo $mensaje_salida ?></td>
		<td></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='' data-toggle="modal" data-target="#<?php echo $secuencia ?>" class='btn_cambio' style='color:#5296E9'><span class='icon-cog'></span></a></td>
	</tr>
	<?php	
	include("panel_sys/supervisor/modal_form_horario_dos.php");
?>