<?php 
			$turno_uno        = consulta_array("SELECT * FROM jornadas_trabajo WHERE identificador = '$val' and fecha_entrada = '$fecha_calendario' order by id_jornada asc");
			$hora_entrada_uno  = $turno_uno['hora_entrada'];
			$hora_salida_uno   = $turno_uno['hora_salida'];
			$type_jornada_uno  = $turno_uno['type_jornada'];
			if ($hora_entrada_uno < 10) {
				$hora_entrada_uno = $hora_entrada_uno." AM";
			}
			else{
				$hora_entrada_uno  = $hora_entrada_uno." PM";
			}
			if ($hora_salida_uno < 10) {
				$hora_salida_uno = $hora_salida_uno." AM";
			}
			else{
				$hora_salida_uno  = $hora_salida_uno." PM";
			}

			$turno_dos         = consulta_array("SELECT * FROM jornadas_trabajo WHERE identificador = '$val' and fecha_entrada = '$fecha_calendario' order by id_jornada desc");
			$hora_entrada_dos  = $turno_dos['hora_entrada'];
			$hora_salida_dos   = $turno_dos['hora_salida'];
			$type_jornada_dos  = $turno_dos['type_jornada'];
			if ($hora_salida_dos <= $hora_entrada_dos) {
			 	$hora_salida_dos = $hora_salida_dos." del dia siguiente";
			} 

			if ($hora_entrada_dos < 10) {
				$hora_entrada_dos = $hora_entrada_dos." AM";
			}
			else{
				$hora_entrada_dos  = $hora_entrada_dos." PM";
			}
			if ($hora_salida_dos < 10) {
				$hora_salida_dos = $hora_salida_dos." AM";
			}
			else{
				$hora_salida_dos  = $hora_salida_dos." PM";
			}
				
			?>
			<tr class="info"> 
				<td><?php echo $type_jornada_uno ?> Horas</td>
				<td><?php saber_dia($fecha_calendario);echo $secuencia ?></td>
				<td><?php mes_castellano($month) ?></td>
				<td><?php echo $hora_entrada_uno ?></td>
				<td><?php echo $hora_salida_uno ?></td>
				<td><strong>Jornada doble</strong></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='' data-toggle="modal" data-target="#<?php echo $secuencia ?>" class='btn_cambio' style='color:#5296E9'><span class='icon-cog'></span></a></td>
			</tr>
			<tr class="info"> 
				<td><?php echo $type_jornada_dos ?> Horas</td>
				<td><?php saber_dia($fecha_calendario);echo $secuencia ?></td>
				<td><?php mes_castellano($month) ?></td>
				<td><?php echo $hora_entrada_dos ?></td>
				<td><?php echo $hora_salida_dos ?></td>
				<td><strong>Jornada doble</strong></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='' data-toggle="modal" data-target="#<?php echo $secuencia ?>" class='btn_cambio' style='color:#5296E9'><span class='icon-cog'></span></a></td>
			</tr>
			<?php
			include("panel_sys/supervisor/modal_form_horario_dos.php");
?>