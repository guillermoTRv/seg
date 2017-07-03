<?php 
	$consulta_reservaciones = consulta_val("SELECT null FROM  reservas_juntas WHERE id_usuario = '$id_usuario_session' and estado ='en proceso'");
	if ($consulta_reservaciones == 0) {
		?>
			<h3 class="sombra_texto btn_ventana" data="mis_reservaciones"><a href=""><span class="icon-pushpin sombra_textos"></span>   Usted no ha realizado ninguna reservación</a> </h3>
		<?
	}
	if ($consulta_reservaciones == 1) {
		?>
			<h3 class="sombra_texto btn_ventana" data="mis_reservaciones"><a href=""><span class="icon-pushpin sombra_textos"></span>   Usted ha realizado una reservación</a> </h3>
		<?php
	}
	if ($consulta_reservaciones > 1) {
		?>
			<h3 class="sombra_texto btn_ventana" data="mis_reservaciones"><a href=""><span class="icon-pushpin sombra_textos"></span>   Usted ha realizado <?php echo $consulta_reservaciones ?> reservaciones</a> </h3>
		<?php
	}
	##aqui seria donde puedan modificar y eliminar los datos
?>

