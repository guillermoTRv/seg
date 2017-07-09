<a href="" class="regresar regresar_uno_reserva"><span class="icon-reply"></span> Regresar</a>
<h3>Información, Modificación y Baja de Salas</h3><br>
<?php 
	include("../funciones.php");
	$consulta = mysqli_query($q_sec,"SELECT * FROM salas_juntas order by id_sala asc");
	$consulta_val = consulta_val("SELECT null FROM salas_juntas");
	$num = 1;
	while ($array = mysqli_fetch_array($consulta)) {
		$id_sala     = $array['id_sala'];
		$name_sala   = $array['name_sala'];
		$hora_inicio = $array['hora_inicio'].":00";
		$hora_fin    = $array['hora_fin'].":00";
		$num_reservas = consulta_val("SELECT null FROM reservas_juntas WHERE id_sala = '$id_sala'");
		?>
		<p class="p_info"><?php echo $name_sala ?></p>
		<p class="p_info">Horario: De <?php echo $hora_inicio ?> - A <?php echo $hora_fin ?></p>
		<p class="p_info">
			Equipo: 
			<?php 
			$consulta_equipo = mysqli_query($q_sec,"SELECT * FROM equipo_salas WHERE id_sala = '$id_sala' order by id_equipo asc");
			while ($array_equipo = mysqli_fetch_array($consulta_equipo)) {
				$name_equipo = $array_equipo['name_equipo'];
				echo " $name_equipo,";
			}
			?>
		</p>
		<p class="p_info"><a>No.Total de reservas hechas: <?php echo $num_reservas ?></a></p>
		<p>
			<button type="button" class="btn btn-primary btn-xs">Modificar</button>
			<button type="button" class="btn btn-default btn-xs">Eliminar</button>
		</p>
		<?php
		if ($num != $consulta_val) {
			echo "<hr style='margin-top:0px'>";
		}
		$num++;
	}
?>
<br>