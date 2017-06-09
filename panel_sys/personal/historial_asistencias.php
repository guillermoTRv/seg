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
		<h3>Historial de Asistencias para el Guardia: <strong><?php echo $nombre_completo ?></strong></h3>
		<h3>
			Identificador: <strong><?php echo $identificador ?> </strong> &nbsp; Nombre de usuario: <strong><?php echo $usuario ?></strong>
		</h3>
		<h3>Inmueble Actual de Labores: <strong><?php echo $inmueble_asign ?></strong></h3>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-10">
		<div class="div_blanco">
			<table class="table">
				<thead>
					<tr>
						<!--<th>numero</th>-->	
						<th>Fecha</th>
						<th>Estado</th>
						<th>Turno</th>
						<th>Hora Est.Entrada</th>
						<th>Hora Est.Salida</th>
						<th>Hora Real.Entrada</th>
						<th>Hora Real Salida</th>
						<th>Sanción</th>
						<th>Monto sanción</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>