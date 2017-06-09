<br>
<div class="row">
	<div class="col-md-10">
			<?php 
				$estado_inm = consulta_val("SELECT null FROM inmuebles WHERE supervisor = '$num_user' and status != 'si'");
				if ($estado_inm > 0) {
				?>
					<?php if($estado_inm == 1){$mens = "Se ha presentado una anomalia en alguno de los inmuebles que supervisa";} ?> 
					<?php if($estado_inm >  1){$mens = "Se han presentado $estado_inm anomalias en alguno de los inmuebles que supervisa";} ?>
					<div class="alert alert-warning" role="alert" style="padding-top:30px">
						<h4><strong>Alerta: </strong><?php echo $mens ?></h4>
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
					</tr>
				</thead>
				<tbody>
					<?php 
						$q_estado = mysqli_query($q_sec,"SELECT * FROM inmuebles WHERE supervisor = '$num_user' and status != 'si'");
						while ($array_estado = mysqli_fetch_array($q_estado)) {
						?>

						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>