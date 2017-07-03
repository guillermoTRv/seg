<?php 
	include("../funciones.php");
	$fecha = sanitizar_get("fecha");
	$sala  = sanitizar_get("sala");
	$cont  = consulta_val("SELECT null FROM reservas_juntas WHERE id_sala ='$sala' and fecha_inicio > '$fecha'");
	if ($cont > 0) {
		$array = consulta_array("SELECT * FROM reservas_juntas WHERE id_sala ='$sala' and fecha_inicio > '$fecha' order by fecha_inicio asc");
		$fecha_inicio_prox = $array['hora_inicio'];
		$dia_proximo       = $array['dia'];
		if ($dia_proximo == $fecha) {
			$mens_dia = "Hoy";
		}
		else{
			$dia      = substr($dia_proximo,8,2);
			$mes      = substr($dia_proximo,5,2);
			$mens_dia = saber_dia($dia_proximo)." $dia de ".mes($mes);
		}
		$id_usuario   = $array['id_usuario'];
		$usuario_uso  = consulta_array("SELECT nombre, apellidos FROM usuarios WHERE id_usuario='$id_usuario'");
		$nombre_armado_prox = $usuario_uso['nombre']." ".$usuario_uso['apellidos'];

		$hora_ini_prox = tiempo($array['hora_inicio']);
		$min_ini_prox  = tiempo($array['min_inicio']);
		$tiempo_ini_prox = $hora_ini_prox.":".$min_ini_prox;
		$hora_fin_prox = tiempo($array['hora_finalizacion']);
		$min_fin_prox  = tiempo($array['min_fin']);
		$tiempo_fin_prox = $hora_fin_prox.":".$min_fin_prox;
		$data_prox = $dia_proximo." ".$tiempo_ini_prox;

		?>
		<div class="sig_reserva" data-fecha='<?php echo $data_prox ?>' data-sala='<?php echo $sala ?>'>
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

	}
	else{
		echo "no";
	}
?>