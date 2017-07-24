<a href="" class="regresar regresar_uno_reserva"><span class="icon-reply"></span> Regresar</a>
<h3>Información, Modificación y Baja de usuarios</h3>
<br>
<?php  
	include("../funciones.php");
	$consulta = mysqli_query($q_sec,"SELECT * FROM usuarios order by id_usuario asc");
	$consulta_val = consulta_val("SELECT NULL FROM usuarios");
	$num = 1;
	while ($array = mysqli_fetch_array($consulta)) {
		$id_usuario = $array['id_usuario'];
		$nombre = $array['nombre'];
		$apellidos = $array['apellidos'];
		$usuario = $array['usuario'];
		$correo  = $array['correo'];
		$fecha_registro = $array['fecha_registro'];
		$num_reservas = consulta_val("SELECT NULL FROM reservas_juntas WHERE id_usuario ='$id_usuario'");
		?>
			<p class="p_info">Nombre: <?php echo $nombre." ".$apellidos ?></p>
			<p class="p_info">Correo: <?php echo $correo ?>&nbsp;&nbsp;&nbsp;Usuario: <?php echo $usuario ?></p>
			<p class="p_info">Fecha de registro <?php echo substr($fecha_registro,0,10) ?></p>
			<p class="p_info"><a href="" data-toggle="modal" data-target="#<?php echo $id_usuario ?>">No. Reservaciones - <?php echo $num_reservas ?> (Click ver historial)</a></p>
			<p>
			  <button type="button" class="btn btn-primary btn-xs modicar_usuario" data="<?php echo $id_usuario ?>">Modificar</button>
			  <button type="button" class="btn btn-default btn-xs eliminar_usuario" data="<?php echo $id_usuario ?>">Eliminar</button>
			</p>
			<?php include("modal_reservaciones_usuarios.php"); ?>
		<?php
		if ($num != $consulta_val) {
			echo "<hr>";
		}
	$num++;
	}
?>
<br>

