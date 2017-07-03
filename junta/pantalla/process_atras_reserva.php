<?php  
	include("../funciones.php");
	$primero = sanitizar_get("primero").":00";
	$fecha_c = sanitizar_get("fecha");
	$sala  = sanitizar_get("sala");

	#este es el que mostrare
	$consulta = consulta_array("SELECT * FROM reservas_juntas WHERE fecha_inicio<'$fecha_c' and id_sala='$sala' order by fecha_inicio desc");
	$dia_atras  = $consulta['dia'];
	$fecha_span = $consulta['fecha_inicio'];
	
	$dia      = substr($dia_atras,8,2);
	$mes      = substr($dia_atras,5,2);
	$mens_dia = saber_dia($dia_atras)." $dia de ".mes($mes);
	$id_usuario   = $consulta['id_usuario'];
	$usuario_uso  = consulta_array("SELECT nombre, apellidos FROM usuarios WHERE id_usuario='$id_usuario'");
	$nombre_armado_prox = $usuario_uso['nombre']." ".$usuario_uso['apellidos'];

	$hora_ini_prox = tiempo($consulta['hora_inicio']);
	$min_ini_prox  = tiempo($consulta['min_inicio']);
	$tiempo_ini_prox = $hora_ini_prox.":".$min_ini_prox;
	$hora_fin_prox = tiempo($consulta['hora_finalizacion']);
	$min_fin_prox  = tiempo($consulta['min_fin']);
	$tiempo_fin_prox = $hora_fin_prox.":".$min_fin_prox;
	$data_prox = $dia_atras." ".$tiempo_ini_prox;

	#aqui veo si lo quito o no
	$poner_span = consulta_tx("SELECT fecha_inicio FROM reservas_juntas WHERE fecha_inicio<'$fecha_span' and id_sala='$sala' order by fecha_inicio desc","fecha_inicio");
	if ($poner_span == $primero) {
		$spans = "no";
	}
	else{
		$spans = "si";
	}

	?>
	<div  class="sig_reserva" data-fecha='<?php echo $data_prox ?>' data-sala='<?php echo $sala ?>' data-spans="<?php echo $spans ?>">
		<h4 class="center">Siguiente reserva <?php echo $mens_dia ?></h4>
		<p><span class="icon-user-tie sombra_textos" style="color:rgb(8,141,198)"></span> <?php echo $nombre_armado_prox ?></p>
		<div>
			<div style="display: inline-block;">
				<p style="text-align: left;"><span class="icon-play2 sombra_textos" style="color:rgb(8,141,198)"></span> Inicio: <?php echo $tiempo_ini_prox ?></p>
				<p style="text-align: left;"><span class="icon-stop sombra_textos" style="color:rgb(8,141,198)"></span> Termino: <?php echo $tiempo_fin_prox ?></p>
			</div>
		</div>
	</div> 
	<?php
?>