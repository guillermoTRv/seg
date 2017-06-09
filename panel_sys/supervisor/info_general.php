<br>
<div class="row">
	<div class="col-md-10">
			<?php 
				$estado_inm = consulta_val("SELECT null FROM inmuebles WHERE supervisor = '$num_user' and status != 'si'");
				if ($estado_inm > 0) {
				?>
					<?php if($estado_inm == 1){$mens = "Se ha presentado alguna anomalia en un inmueble que supervisa";} ?> 
					<?php if($estado_inm >  1){$mens = "Se ha presentado alguna anomalia en $estado_inm inmuebles que supervisa";} ?>
					<div class="alert alert-warning" role="alert" style="padding-top:30px">
						<h4><strong><span class="icon-warning"></span> Alerta: </strong><?php echo $mens ?></h4>
					</div>
						 
				<?php		
				}
				if ($estado_inm == 0) {
				?>
					<div class="alert alert-success" role="alert" style="padding:20px">
						Todos los inmuebles que estan bajo su supervision se encuentran en codigo verde
					</div>
					<br>
					<div class="alert alert-success" role="alert" style="padding:20px">
						Todo el personal que esta bajo su supervision se encuentran en codigo verde
					</div>
				<?php
				}

			?>
			<br>
	</div>
</div>
<div class="row">
	<div class="col-md-10">
		<div class="div_blanco">
			<table class="table">
				<thead>
					<tr>
						<th>Inmueble</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Personal</th>
						<th>Descripcion</th>
						<th>Tipo</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$q_inmueble = mysqli_query($q_sec,"SELECT * FROM inmuebles WHERE supervisor = '$num_user' and status != 'si'");
						while ($array_estado = mysqli_fetch_array($q_inmueble)) {
							$id_inmueble   = $array_estado['id_inmueble'];	
							$name_inmueble = consulta_tx("SELECT name_inmueble FROM inmuebles WHERE id_inmueble = '$id_inmueble'","name_inmueble");
							$q_estado = mysqli_query($q_sec,"SELECT * FROM estado_inmuebles WHERE id_inmueble = '$id_inmueble' and status != 'atendido'");
							while ($consulta_estado = mysqli_fetch_array($q_estado) ) {
								$id_est_inm      = $consulta_estado['id_est_inm'];
								$fecha_registro  = $consulta_estado['fecha_registro'];
								$fecha           = substr($fecha_registro,0,10);
								$hora            = substr($fecha_registro,10);
								$modo_estado     = $consulta_estado['modo'];
								$identificador   = $consulta_estado['identificador'];
								$detalle         = $consulta_estado['detalle'];
								$status          = $consulta_estado['status'];

								$q_personal = consulta_array("SELECT * FROM usuarios WHERE identificador='$identificador'");
								$nombre =     $q_personal['nombre'];
								$apellido_p = $q_personal['apellido_p'];
								$apellido_m = $q_personal['apellido_m'];
								$nombre_completo = $nombre." ".$apellido_p." ".$apellido_m;


								if ($modo_estado == "checklist") {
									$detalle_info  = $consulta_estado['detalle_ck'];
								}
								if ($modo_estado == "extraordinario") {
									$detalle_info  = "<a href='' data-toggle='modal' data-target='#my_$id_est_inm'class='blue'>Ver Imagen</a>";

								}
								?>
								  <tr id="<?php echo $id_est_inm ?>">
									<td><?php echo $name_inmueble ?></td>
									<td><?php echo $fecha ?></td>
									<td><?php echo $hora ?></td>
									<td><?php echo $nombre_completo ?>&nbsp;&nbsp;</td>
									<td><?php echo $detalle ?></td>
									<td><?php echo $detalle_info ?>&nbsp;</td>
									<td><?php echo $status  ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							      </tr>
							      <div class="modal fade" id="<?php echo "my_$id_est_inm" ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Fotografia Reporte</h4>
									      </div>
									      <div class="modal-body">
									      	<h4><?php echo $detalle ?></h4>
									      	<img src="panel_sys/reportes/imagenes_reportes/<?php echo $id_est_inm ?>" class="img-responsive" alt="">
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar ventana</button>
									      </div>
									    </div>
									  </div>
								</div>
								<?php
							}


						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-10">	
		<br>
		<?php 
				if ($estado_registro == "correcto") {
					?>
					<div class="alert alert-info" role="alert" style="padding:20px">
						Usted se encuenta fuera de turno - No se ha registrado entrada
					</div>
					<?php
				}
				if ($estado_registro == "entrada") {
					?>
					<div class="alert alert-info" role="alert" style="padding:20px">
						Usted registro una entrada el <strong>"<?php echo $hora_entrada ?>"</strong> en el inmueble <strong>"<?php echo $name_inmueble_j ?>"</strong>
					</div>
					<?php
				}
		?>
	</div>
</div>
