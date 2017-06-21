
<?php 
	include("../funciones.php");
	$id_sala =  sanitizar("sala_txt");
	$dia     =  sanitizar("dia_txt");
	function saber_dia($nombredia) {
	    $dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
	    $fecha_l = $dias[date('N', strtotime($nombredia))];
	    return $fecha_l;
	}
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
	if ($consulta_disponibilidad == 0 ) {
		$mensaje_horarios  = saber_dia($dia)." - La sala esta disponible para cualquier hora en turno";
		//$horas = for ($i=$hora_inicio; $i < $hora_fin ; $i++) { echo "<br>".$i;}
		echo "<h3>$mensaje_horarios</h3>";
		echo "<p margin-bottom:10px;>Los espacios rojisos se encuentra disponibles, de click en cualquiera de ellos para especificar la hora de entrada y salida de su junta</p>";
		
		?><div class="cajota"><div style="height:22px;width:100%;background-color:"><?php
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
			<div class='disponible' data-tipo='total' data-horainicio="<?php echo $hora_inicio_turno ?>" data-horafin="<?php echo $hora_fin_turno ?>" style="display:inline-block;height:30px;width:100%;background-color:brown;margin-right:-4px;border:1px solid black">
			  	<p class="p_hora_mens">Disponible</p>
			</div>
		</div>
		<br><?php
		
		?><div style="height:22px;width:100%;background-color:"><?php
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
			<div class="disponible" data-tipo='total' data-horainicio="<?php echo $hora_inicio_turno ?>" data-horafin="<?php echo $hora_fin_turno ?>" style="display:inline-block;height:30px;width:<?php echo $width_ultimo ?>%;background-color:brown;margin-right:-4px;border:1px solid black">
			  	<p class="p_hora_mens" style=>Disponible</p>
			</div>
		</div></div>
		<br><?php
		
	}


	


?>