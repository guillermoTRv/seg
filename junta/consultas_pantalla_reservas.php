<h2 class="center visible-md-block visible-lg-block" style="font-size:1.8em;margin-right:18px">
    <?php 
	    echo $name_sala = consulta_tx("SELECT name_sala FROM salas_juntas where id_sala='$id_sala'","name_sala");
    ?>
</h2>
<div class="visible-sm-block">
    <br>
</div>
<div class="row">
	<center>
		<div class="reservas_lista">
			<?php 
				if ($type == "en uso") {
					?>
					<h3 class="center" style="font-weight:lighter;">En uso ahora</h3>
					<p><span class="icon-user-tie sombra_textos" style="color:rgb(8,141,198)"></span> <?php echo $nombre_armado ?></p>
					<div class="select" data-select="<?php echo $fecha.' '.$hora_armada_ini ?>">
						<div style="display: inline-block;">
							<p style="text-align: left;"><span class="icon-play2 sombra_textos" style="color:rgb(8,141,198)"></span> Inicio: <?php echo $hora_armada_ini ?></p>
							<p style="text-align: left;"><span class="icon-stop sombra_textos" style="color:rgb(8,141,198)"></span> Termino: <?php echo $hora_armada_fin ?></p>
						</div>
					</div>			
					<?php
					if ($type_desp == "ok") {
						?>
						<hr class="linea_azul">
						<div class="caja_siguiente">	
							<div class="sig_reserva" data-fecha='<?php echo $data_prox ?>' data-sala='<?php echo $id_sala ?>'>
								<h4 class="center">Siguiente reserva <?php echo $mens_dia ?></h4>
								<p><span class="icon-user-tie sombra_textos" style="color:rgb(8,141,198)"></span> <?php echo $nombre_armado_prox ?></p>
								<div>
									<div style="display: inline-block;">
										<p style="text-align: left;"><span class="icon-play2 sombra_textos" style="color:rgb(8,141,198)"></span> Inicio: <?php echo $tiempo_ini_prox ?></p>
										<p style="text-align: left;"><span class="icon-stop sombra_textos" style="color:rgb(8,141,198)"></span> Termino: <?php echo $tiempo_fin_prox ?></p>
									</div>
								</div>
							</div>
						</div>	
						<span class="glyphicon glyphicon-chevron-up atras" style="font-size:1.2em;margin-bottom: 15px;display: none">&nbsp;</span> 	
						<span class="glyphicon glyphicon-chevron-down siguiente" style="font-size:1.2em;margin-bottom: 15px"></span>
						<?php
					}
					if ($type_desp == "no") {
						?>
						<hr class="linea_azul">
						<h4>No hay más reservas para esta sala</h4><br>
						<?php
					}
				}
				if ($type == "hoy") {
					?>
						<h3 class="center">Próxima reservación - Hoy</h3>
						<p><span class="icon-user-tie sombra_textos" style="color:rgb(8,141,198)"></span> <?php echo $nombre_armado ?></p>
						<div class="select" data-select="<?php echo $fecha.' '.$hora_armada_ini ?>">
							<div style="display: inline-block;">
								<p style="text-align: left;"><span class="icon-play2 sombra_textos" style="color:rgb(8,141,198)"></span> Inicio: <?php echo $hora_armada_ini ?></p>
								<p style="text-align: left;"><span class="icon-stop sombra_textos" style="color:rgb(8,141,198)"></span> Termino: <?php echo $hora_armada_fin ?></p>
							</div>
						</div>	
					<?php
					if ($type_desp == "ok") {
						?>
						<hr class="linea_azul">
						<div class="caja_siguiente">	
							<div class="sig_reserva" data-fecha='<?php echo $data_prox ?>' data-sala='<?php echo $id_sala ?>'>
								<h4 class="center">Siguiente reserva <?php echo $mens_dia ?></h4>
								<p><span class="icon-user-tie sombra_textos" style="color:rgb(8,141,198)"></span> <?php echo $nombre_armado_prox ?></p>
								<div>
									<div style="display: inline-block;">
										<p style="text-align: left;"><span class="icon-play2 sombra_textos" style="color:rgb(8,141,198)"></span> Inicio: <?php echo $tiempo_ini_prox ?></p>
										<p style="text-align: left;"><span class="icon-stop sombra_textos" style="color:rgb(8,141,198)"></span> Termino: <?php echo $tiempo_fin_prox ?></p>
									</div>
								</div>
							</div>
						</div>	
						<span class="glyphicon glyphicon-chevron-up atras" style="font-size:1.2em;margin-bottom: 15px;display: none">&nbsp;</span> 	
						<span class="glyphicon glyphicon-chevron-down siguiente" style="font-size:1.2em;margin-bottom: 15px"></span>
						<?php
					}
					if ($type_desp == "no") {
						?>
						<hr class="linea_azul">
						<h4>No hay más reservas para esta sala</h4><br>
						<?php
					}
				}
				if ($type == "manana") {
					?>
						<h3 class="center">Proxima reservación <?php echo saber_dia($oper_c)." $dia_sigp de ";mes_castellano($mes_sigp) ?></h3>
						<p><span class="icon-user-tie sombra_textos" style="color:rgb(8,141,198)"></span> <?php echo $nombre_armado ?></p>
						<div class="select" data-select="<?php echo $oper_c.' '.$hora_armada_ini ?>">
							<div style="display: inline-block;">
								<p style="text-align: left;"><span class="icon-play2 sombra_textos" style="color:rgb(8,141,198)"></span> Inicio: <?php echo $hora_armada_ini ?></p>
								<p style="text-align: left;"><span class="icon-stop sombra_textos" style="color:rgb(8,141,198)"></span> Termino: <?php echo $hora_armada_fin ?></p>
							</div>
						</div>		
					<?php
					if ($type_desp == "ok") {
						?>
						<hr class="linea_azul">
						<div class="caja_siguiente">	
							<div class="sig_reserva" data-fecha='<?php echo $data_prox ?>' data-sala='<?php echo $id_sala ?>'>
								<h4 class="center">Siguiente reserva <?php echo $mens_dia ?></h4>
								<p><span class="icon-user-tie sombra_textos" style="color:rgb(8,141,198)"></span> <?php echo $nombre_armado_prox ?></p>
								<div>
									<div style="display: inline-block;">
										<p style="text-align: left;"><span class="icon-play2 sombra_textos" style="color:rgb(8,141,198)"></span> Inicio: <?php echo $tiempo_ini_prox ?></p>
										<p style="text-align: left;"><span class="icon-stop sombra_textos" style="color:rgb(8,141,198)"></span> Termino: <?php echo $tiempo_fin_prox ?></p>
									</div>
								</div>
							</div>
						</div>	
						<span class="glyphicon glyphicon-chevron-up atras" style="font-size:1.2em;margin-bottom: 15px;display: none">&nbsp;</span> 	
						<span class="glyphicon glyphicon-chevron-down siguiente" style="font-size:1.2em;margin-bottom: 15px"></span>
						<?php
					}
					if ($type_desp == "no") {
						?>
						<hr class="linea_azul">
						<h4>No hay más reservas para esta sala</h4><br>
						<?php
					}
				}
				if ($type == "sin") {
					?>
					<h4 class="center">No hay reservas para esta sala</h4>
					<?php
				}
			?>				
		</div>
	</center>	
</div>
<br>













<!--
<center>
	<div style="background-color:#f2f2f2;width:80%">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, voluptatibus praesentium impedit eum maiores, odio rerum placeat voluptate. Incidunt repudiandae dolorem rerum, obcaecati, reiciendis ipsa dignissimos soluta dolore quis veritatis.	
	</div>
</center>-->
