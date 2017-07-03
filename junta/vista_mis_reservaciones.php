<a href="" class="regresar_general" style="font-weight: bold;"><span class="icon-reply"></span> Regresar</a>
<?php 
	include("funciones.php");
	session_start();
	$id_usuario_session = $_SESSION['id_usuario'];
	$consulta_reservas = mysqli_query($q_sec,"SELECT * FROM reservas_juntas WHERE id_usuario='$id_usuario_session' and estado ='en proceso' order by dia asc");
	$vali = 0;
	while ($array = mysqli_fetch_array($consulta_reservas)) {
		$sala  = consulta_tx("SELECT name_sala FROM salas_juntas WHERE id_sala = '".$array['id_sala']."'","name_sala");
		$fecha_cons = $array['dia'];
		$hora_inicio    = $array['hora_inicio'];
		$minuto_inicio  = $array['min_inicio'];
		$hora_fin       = $array['hora_finalizacion'];
		$minuto_fin 	= $array['min_fin'];

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
			$mens_restante = "Falta un día para su junta";
		}
		if ($restantes > 1) {
			$mens_restante = "Faltan: $restantes días";
		}


		if ($hora_inicio<10) {
			$hora_inicio = "0".$hora_inicio;
		}
		if ($minuto_inicio<10) {
			$minuto_inicio = "0".$minuto_inicio;
		}

		if ($hora_fin < 10) {
			$hora_fin = "0".$hora_fin;
		}
		if ($minuto_fin<10) {
			$minuto_fin = "0".$minuto_fin;
		}
		
		$hora_armada_inicio = $hora_inicio.":".$minuto_inicio;
		$hora_armada_fin    = $hora_fin.":".$minuto_fin;
		if($vali == 0){
			?>
				<h3><span class=" icon-pushpin"></span> Reserva más proxima</h3>
				<h4 style="display:inline;">Sala: <?php echo $sala ?> - </h4>
				<h4 style="display:inline;"> Fecha: <?php saber_dia($fecha_cons);echo " $dia de ";mes_castellano($mes) ?> </h4>
				<h4><span class="icon-play2"></span> Comienza:<?php echo $hora_armada_inicio ?> - &nbsp;<span class="icon-stop"></span> Termina <?php echo $hora_armada_fin ?></h4>
				<h4><span class="icon-history"></span> <?php echo $mens_restante ?></h4><br>
			<?php			
		}
		else{
			?>
				<h3><span class=" icon-pushpin"></span> Sala: <?php echo $sala ?> </h3>
				<h4><span class="icon-play2"></span> Comienza:<?php echo $hora_armada_inicio ?> - &nbsp;<span class="icon-stop"></span> Termina <?php echo $hora_armada_fin ?></h4>
				<h4><span class="icon-history"></span> <?php echo $mens_restante ?></h4><br>
			<?php
		}
		$vali = 1;	
	}

?>
