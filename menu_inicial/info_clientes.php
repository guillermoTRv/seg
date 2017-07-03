<div class="col-md-10">
	<h2><span class="glyphicon glyphicon-list-alt"></span> Listado e información de sus Clientes</h2>
	<div class="div_blanco" style="margin-top: 15px">	
		<table class="table">
			<thead>
				<tr>
					<th>Cliente</th>
					<th>No.Inmuebles</th>
					<th>No.Personal</th>
					<th>Contrato Ini.</th>
					<th>Contrato Fin.</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$consulta = mysqli_query($q_sec,"SELECT * FROM clientes order by id_cliente asc");
				while ($array = mysqli_fetch_array($consulta)) {
					$name_cliente  = $array['name_cliente'];
					$id_cliente    = $array['id_cliente'];
					$val_inmuebles = consulta_val("SELECT null FROM inmuebles WHERE cliente = '$id_cliente'");
					$val_personal  = consulta_val("SELECT null FROM usuarios WHERE empresa = '$id_cliente'");
					?>
					<tr>
						<td><?php echo $name_cliente ?></td>
						<td><?php echo $val_inmuebles ?></td>
						<td><?php echo $val_personal ?></td>
						<td>--</td>
						<td>--</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>