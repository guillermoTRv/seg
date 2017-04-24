<div class="row">
	<div class="col-md-10">
		<h3>Reporte general para la empresa - <?php echo $name_cliente ?></h3>
		&nbsp;<a href="#"><p style="display: inline;font-size:1.1em"><span class="icon-envelop"></span> Enviar reporte</p></a>&nbsp;&nbsp;&nbsp;
		<a href="#"><p style="display: inline;font-size:1.1em"><span class="icon-folder-download"></span> Descargar reporte</p></a>
	</div>
	<div class="col-md-10">
		<div class="content">
			<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>Inmueble</th>
							<th>Identificador</th>
							<th>Direccion</th>
							<th>Supervisor</th>
							<th>Personal Activo</th>
							<th>Total de Incidentes</th>
							<th>Costo del Servicio/Mes</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$inmuebles = mysqli_query($q_sec,"SELECT * FROM inmuebles WHERE cliente = '$id_cliente'");
							while ($array_inm = mysqli_fetch_array($inmuebles)) {
								$id_inmueble   = $array_inm['id_inmueble'];
								$name_inmueble = $array_inm['name_inmueble'];
								
								$calle         = $array_inm['calle'];
                                $colonia       = $array_inm['colonia'];
                                $num_exterior  = $array_inm['num_exterior'];
                                $entidad       = $array_inm['entidad'];
                                $demarcacion   = $array_inm['demarcacion'];

                                $identificador = $array_inm['identificador'];
                                $direccion     = $calle." #".$num_exterior." ".$colonia." ".$demarcacion." ".$entidad;
                                  
                                $conteo        = consulta_val("SELECT id_usuario FROM usuarios WHERE inmueble_asign='$id_inmueble'");
								echo "
									<tr>
										<td>$name_inmueble</td>
										<td>$identificador</td>
										<td>$direccion</td>
										<td>--</td>
										<td>#$conteo elementos</td>
										<td>--</td>
										<td>--</td>
									</tr>
								";
							}

						?>
					</tbody>
			</table>
		</div>
	</div>
</div>