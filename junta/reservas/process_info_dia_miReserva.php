<?php 
	include("../funciones.php");
	$id_sala = sanitizar_get("sala");
	$dia   = sanitizar_get("fecha");

    
    $hrs_inicio = sanitizar_get("hrs_ini");
    $min_inicio = sanitizar_get("min_ini");
    $hrs_fin    = sanitizar_get("hrs_fin");
    $min_fin    = sanitizar_get("min_fin");

	$consulta_horarios = consulta_array("SELECT hora_inicio,hora_fin FROM salas_juntas WHERE id_sala = '$id_sala'");
	$hora_inicio_turno = $consulta_horarios['hora_inicio'];
	$hora_fin_turno  = $consulta_horarios['hora_fin'];
	$rango_turno = $hora_fin_turno - $hora_inicio_turno;
	$rango_mitad = $rango_turno/2; 
	$rango_redon = round($rango_mitad);
	$rango_redon_for = $hora_inicio_turno+$rango_redon;


	$width = 100/$rango_redon;
	$oper_a = $rango_turno - $rango_redon;
	$width_ultimo = $width*$oper_a;
	$consulta_disponibilidad = consulta_val("SELECT * FROM reservas_juntas WHERE id_sala ='$id_sala' and dia = '$dia'");
	$datas      = "data-tipo='total' data-horainicio='$hora_inicio_turno' data-horafin='$hora_fin_turno'";
	$horas_data = "data-hrsIn='$hrs_inicio' data-minIn='$min_inicio' data-hrsFin='$hrs_fin' data-minFin='$min_fin'";
	$datas_con  = "data-tipo='con' data-horainicio='$hora_inicio_turno' data-horafin='$hora_fin_turno' $horas_data";
	if ($consulta_disponibilidad == 0 ) {
		?>
		<div style="height:22px;width:100%;background-color:"><?php
			for ($i=$hora_inicio_turno; $i < $rango_redon_for ; $i++) { 
				if ($i < 10 && $i!=$hora_inicio_turno) {$i = "0".$i;}
				?>
				<div style="display:inline-block;height:22px;width:<?php echo $width ?>%;background-color:white;margin-right:-4px;border-right:1px solid black">
					<p class="p_hora"><?php echo $i ?>hrs</p>
				</div>
				<?php
			}
		?>
		</div>
		<div style="height:20px;width:100%;background-color:">
			<?php 
			$tiempo_fin = $hrs_fin+($min_fin/60);
			if ($hrs_inicio < $rango_redon_for && $tiempo_fin <= $rango_redon_for) {
				include("seccion_uno_miReserva.php");
			}
			if ($hrs_inicio < $rango_redon_for && $tiempo_fin > $rango_redon_for) {
				include("seccion_dos_miReserva.php");
			}
			if ($hrs_inicio >= $rango_redon_for) {
			?>
			<div class="disponible" <?php echo $datas ?> style="display:inline-block;height:30px;width:100%;background-color:brown;margin-right:-4px;border:1px solid black;padding-left: 2px;padding-top: 1px">
			  	<p class="p_hora_mens"><span class='icon-checkmark'></span></p>
			</div>
			<?php
			}
			?>
		</div>
		<br>

		<div style="height:22px;width:100%;background-color:"><?php
			for ($i=$rango_redon_for; $i < $hora_fin_turno ; $i++) { 
				?>
				<div style="display:inline-block;height:22px;width:<?php echo $width ?>%;background-color:white;margin-right:-4px;border-right:1px solid black">
					<p class="p_hora"><?php echo $i ?>hrs</p>
				</div>
				<?php
			}
			?>
		</div>
		<div style="height:20px;width:100%;">
			<?php 
			if ($hrs_inicio >= $rango_redon_for) {
				include("seccion_tres_miReserva.php");
			}
			if ($hrs_inicio < $rango_redon_for && $tiempo_fin > $rango_redon_for) {
				include("seccion_four_miReserva.php");
			}
			if ($hrs_inicio < $rango_redon_for && $tiempo_fin <= $rango_redon_for) {
			?>
			<div class="disponible" <?php echo $datas ?> style="display:inline-block;height:30px;width:<?php echo $width_ultimo ?>%;background-color:brown;margin-right:-4px;border:1px solid black;padding-left:2px;padding-top: 1px">
			  	<p class="p_hora_mens"><span class='icon-checkmark'></span></p>
			</div>
			<?php
			}
			?>
			<!--<div class="disponible" data-tipo='total' data-horainicio="<?php echo $hora_inicio_turno ?>" data-horafin="<?php echo $hora_fin_turno ?>" style="display:inline-block;height:30px;width:<?php echo $width_ultimo ?>%;background-color:brown;margin-right:-4px;border:1px solid black">
			  	<p class="p_hora_mens" style=>Disponible</p>
			</div>-->
		</div>
		<?php
		
	}
?>