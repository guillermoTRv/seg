<a href="" class="regresar_general" style="font-weight: bold;"><span class="icon-reply"></span> Regresar</a>
<?php 
	include("funciones.php");
	session_start();
	$id_usuario_session = $_SESSION['id_usuario'];
	$consulta_reservas = mysqli_query($q_sec,"SELECT * FROM reservas_juntas WHERE id_usuario='$id_usuario_session' and estado ='en proceso' and fecha_inicio>'$fecha_hora' order by fecha_inicio asc");
	$vali = 0;
	$cont_res = consulta_val("SELECT null FROM reservas_juntas WHERE id_usuario='$id_usuario_session' and fecha_inicio>'$fecha_hora'");
	$num_a    = 1;
	while ($array = mysqli_fetch_array($consulta_reservas)) {
		$sala  = consulta_tx("SELECT name_sala FROM salas_juntas WHERE id_sala = '".$array['id_sala']."'","name_sala");
		$id_reserva     = $array['id_reserva'];
		$fecha_cons     = $array['dia'];
		$hora_inicio    = tiempo($array['hora_inicio']);
		$minuto_inicio  = tiempo($array['min_inicio']);
		$hora_fin       = tiempo($array['hora_finalizacion']);
		$minuto_fin 	= tiempo($array['min_fin']);
		$detalles       = $array['detalles'];
		$snaks          = $array['snaks'];

		$dia  = substr($fecha_cons,8,2);
		$mes  = substr($fecha_cons,5,2);


		$datetime1 = date_create($fecha);
		$datetime2 = date_create($fecha_cons);
		$interval  = date_diff($datetime1, $datetime2);
		$restantes = $interval->format('%a');
		$cero = date_create_from_format("d","0");
		$uno  = date_create_from_format("d","1");

		if ($restantes == 0) {
			$mens_restante = "Hoy es su junta";
		}
		if ($restantes == 1) {
			$mens_restante = "Falta un día para que sea su junta";
		}
		if ($restantes > 1) {
			$mens_restante = "Faltan: $restantes días";
		}
		if ($detalles == ""){
			$detalles = "No hay detalles sobre la junta";
		}

		$hora_armada_inicio = $hora_inicio.":".$minuto_inicio;
		$hora_armada_fin    = $hora_fin.":".$minuto_fin;
		if($vali == 0){
			?>
				<h4><span class=" icon-pushpin"></span> Reserva más proxima - <?php echo $mens_restante ?></h4>
				<p class="p_info">Sala: <?php echo $sala ?> - Fecha: <?php echo saber_dia($fecha_cons)." $dia de ".mes($mes) ?> </p>
				
			<?php			
		}
		else{
			?>
				<h4><span class=" icon-pushpin"></span> Sala: <?php echo $sala." - ".$mens_restante ?> </h4>
				<p class="p_info">Fecha: <?php echo saber_dia($fecha_cons)." $dia de ".mes($mes) ?></p>
			<?php
		}

		?>
		<p class="p_info"><span class="icon-play2"></span> Comienza: <?php echo $hora_armada_inicio ?> - &nbsp;<span class="icon-stop"></span> Termina: <?php echo $hora_armada_fin ?></p>
		<!--<h4><span class="icon-history"></span>mes_restante</h4>-->
		<p class="p_info"><span class="glyphicon glyphicon-list-alt"></span> Detalles: <?php echo $detalles ?></p>
		<p class="p_info"><span class="glyphicon glyphicon-apple"></span> 
			Snaks: 
			<?php 
				if($snaks == "si" ){include("lista_snaks.php");}
				if($snaks == "no"){ echo "No";}	
			?> 
		</p><!--
		<p>¿Todo listo para la junta? <span class="glyphicon glyphicon-unchecked"></span> Si - <span class="glyphicon glyphicon-unchecked"></span> No</p>
		<p>Usted dejo una nota de que es lo que hacia falta</p>
		<br>-->
		<?php
		$vali = 1;	
		if ($num_a != $cont_res) {
			echo "<hr>";
		}
		$num_a++;	
	}

?>
