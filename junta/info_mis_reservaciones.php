<?php 
	$cons_reservaciones = consulta_val("SELECT null FROM  reservas_juntas WHERE id_usuario = '$id_usuario_session' and estado ='en proceso' and fecha_inicio>'$fecha_hora'");
	if ($cons_reservaciones == 0) {
		?>
		<h3 class="sombra_texto" ><a><span class="icon-pushpin sombra_textos"></span>   Usted no ha realizado ninguna reservación a futuro</a> </h3>
		<?php
	}
	if ($cons_reservaciones == 1) {
		?>
			<h3 class="sombra_texto btn_ventana" data="mis_reservaciones"><a href=""><span class="icon-pushpin sombra_textos"></span>   Usted tiene una reservación a futuro</a> </h3>
		<?php
	}
	if ($cons_reservaciones > 1) {
		?>
			<h3 class="sombra_texto btn_ventana" data="mis_reservaciones"><a href=""><span class="icon-pushpin sombra_textos"></span>   Usted tiene <?php echo $consulta_reservaciones ?> reservaciones a futuro</a> </h3>
		<?php
	}
	##aqui seria donde puedan modificar y eliminar los datos
	if ($cons_reservaciones > 0) {
		?>
			<h3 class="btn_ventana" data="cancelar-modificar"><a href=""><span class="icon-pencil2 sombra_textos"></span> Modificar o Cancelar reservas</a></h3>
		<?php
	}
?>

