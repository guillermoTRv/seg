<div class="row">
	<div class="col-md-10">
		<h3>
			<div class="alert alert-success" role="alert" style="padding:20px">
				Todos los inmuebles que estan bajo su supervision se encuentran en codigo verde
			</div>
			<br>
			<div class="alert alert-success" role="alert" style="padding:20px">
				Todo el personal que esta bajo su supervision se encuentran en codigo verde
			</div>
			<!--faltas retrasos etc-->
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
			
		</h3>
	</div>
</div>