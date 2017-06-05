<?php 
	$q_personal = consulta_array("SELECT * FROM usuarios WHERE id_usuario='$val'");
	$nombre =     $q_personal['nombre'];
	$apellido_p = $q_personal['apellido_p'];
	$apellido_m = $q_personal['apellido_m'];
	$nombre_completo = $nombre." ".$apellido_p." ".$apellido_m;
	$identificador = $q_personal['identificador'];
	$usuario = $q_personal['usuario'];
	$puesto = $q_personal['puesto'];

    $inmueble_asign = $q_personal['inmueble_asign'];
	$inmueble_asign = consulta_tx("SELECT name_inmueble FROM inmuebles WHERE id_inmueble='$inmueble_asign'","name_inmueble");
?>
<div class="row">
	<div class="col-md-10">
		<h3>Historial de reportes para el Guardia: <strong><?php echo $nombre_completo ?></strong></h3>
		<h3>
			Identificador: <strong><?php echo $identificador ?> </strong> &nbsp; Nombre de usuario: <strong><?php echo $usuario ?></strong>
		</h3>
		<h3>Inmueble Actual de Labores: <strong><?php echo $inmueble_asign ?></strong></h3>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-11">
		<div class="div_blanco">
			<table class="table">
				<thead>
					<tr>
						<!--<th>#Num</th>-->
						<th>Fecha</th>
						<th>Hora</th>
						<th>Inmueble</th>
						<th>Detalle</th>
						<th>Estado</th>
						<th>Solución</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$q_repo = mysqli_query($q_sec,"SELECT * FROM reportes_extra WHERE identificador = '$val' order by id_reporte desc");
						while ($array_repo = mysqli_fetch_array($q_repo)) {
							$fecha_hora = $array_repo['fecha_registro'];
							$fecha = substr($fecha_hora,0,10);
							$hora  = substr($fecha_hora,10);

							$inmueble = consulta_tx("SELECT name_inmueble FROM inmuebles WHERE id_inmueble = '".$array_repo['id_inmueble']."'","name_inmueble");
							$detalle_reporte = $array_repo['detalle_reporte'];
							$estado = $array_repo['estado_inicial'];
							?>
							<tr>
								<td><?php echo $fecha ?></td>
								<td><?php echo $hora ?></td>
								<td><?php echo $inmueble ?></td>
								<td><?php echo $detalle_reporte ?></td>
								<td><?php echo $estado ?></td>
								<td>--</td>
							</tr>
							<?php
						}	
					?>
				</tbody>
			</table>
		</div>	
	</div>
</div>