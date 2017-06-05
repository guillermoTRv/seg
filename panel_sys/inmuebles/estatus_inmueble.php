<script>
	$(document).on("click",".btn-atendido",function(){
		var val_estatus = $(this).parent().parent().parent().attr("id")
		var span_id     = $(this).parent().parent().parent().find("."+val_estatus)
		var id_inmueble = $(".id_inmueble").val()
		$.ajax({
			ype:"GET",
			url:"panel_sys/inmuebles/process_status_estado.php?val="+val_estatus+"&inm="+id_inmueble+"",
			success:function(data){
				if (data == 00) {
					span_id.html("<span style='color:green'><span class='icon-checkmark'></span> Atendido</span>")
				}
			}	
	    });
	});
</script>
<div class="div_blanco">
	<table class="table">
		<thead>
			<tr>
				<th>Fecha-Hora</th>
				<th>Personal</th>
				<th>Descripcion</th>
				<th>Ck</th>
				<th>Tipo</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$q_estado = mysqli_query($q_sec,"SELECT * FROM estado_inmuebles WHERE id_inmueble = '$id_inmueble' and status != 'atendido'");
				while ($consulta_estado = mysqli_fetch_array($q_estado) ) {
					$id_est_inm      = $consulta_estado['id_est_inm'];
					$fecha_registro  = $consulta_estado['fecha_registro'];
					$modo_estado     = $consulta_estado['modo'];
					$identificador   = $consulta_estado['identificador'];
					$detalle         = $consulta_estado['detalle'];

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
						<td><?php echo $fecha_registro ?></td>
						<td><?php echo $nombre_completo ?></td>
						<td><?php echo $detalle ?></td>
						<td><?php echo $modo_estado ?>&nbsp;&nbsp;</td>
						<td><?php echo $detalle_info ?>&nbsp;</td>
						<td><span class="<?php echo $id_est_inm ?>"><button type="button" class="btn btn-success btn-xs btn-atendido">Marcar como atendido <?php echo $id_est_inm ?></button></span>&nbsp;&nbsp;&nbsp;</td>
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
			?>
		</tbody>
	</table>
	<input type="hidden" value="<?php echo $id_inmueble ?>" class="id_inmueble">
</div>
<br>
