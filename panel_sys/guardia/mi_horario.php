<?php 
	echo $val = consulta_tx("SELECT identificador FROM usuarios WHERE id_usuario = '$num_user'","identificador");
?>
<div class="row">
	<div class="col-md-10">
		<h3>Mi horario</h3>
		<div class="div_blanco">
			<table>
				<thead>
					<tr>
						<th>Jornada</th>
						<!--<th>Jornada</th>-->
						<th>Dia</th>
						<th>Mes</th>
						<th>Entrada</th>
						<th>Salida</th>
						<th>Estado</th>
						<!--<th>Modificar</th>-->
						<th>Definir</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					function saber_dia($nombredia) {
						$dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
						$fecha_l = $dias[date('N', strtotime($nombredia))];
						echo $fecha_l;
					}
					function mes_castellano($mes_valor){
						$meses = array(Enero=>'01', Febrero=>'02', Marzo=>'03', Abril=>'04', Mayo=>'05',Junio=>'06',Julio=>'07',Agosto=>'08',Septiembre=>'09',Octubre=>'10',Noviembre=>'11',Diciembre=>'12');
						foreach($meses as $mes_nombre=>$mes_num){
							if ($mes_valor == $mes_num) {
								echo $mes_nombre;
								return false;
							}
						}
					}
					$dia           = date("d");
					$year          = date("Y");
					$controler     = "no";
					$ultimoDiaMes  = date("d",(mktime(0,0,0,$month+1,1,$year)-1));	
					$month         = date("n");
					for ($i=0; $i < 7; $i++) { 
									
						if ($controler == "no") {
							$secuencia =  $dia + $i;
						}
								
						if ($secuencia > $ultimoDiaMes) {
							$controler = "yes";
							$secuencia = 0;
							$month = $month +1;
						}

						if ($controler == "yes") {
							$secuencia ++;
						}

						$secuencia;
						$fecha_calendario = $year."-".$month."-".$secuencia;


						$consulta_jornada = consulta_val("SELECT * FROM jornadas_trabajo WHERE fecha_entrada = '$fecha_calendario' and identificador = '$val'");
						echo "<br>$consulta_jornada";
						if ($consulta_jornada == 0) {
							$mes_entrada = substr($fecha_calendario,5);
							$mes_entrada = substr($mes_entrada,0,-3)
							?>
							<tr class="active"> 
								<td>Por definir</td>
								<td><?php saber_dia($fecha_calendario);echo $secuencia ?></td>
								<td><?php mes_castellano($month) ?></td>
								<td>Por definir</td>
								<td>Por definir</td>
								<td>Por definir</td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='' data-toggle="modal" data-target="#<?php echo $secuencia ?>" class='btn_cambio' style='color:#5296E9'><span class='icon-cog'></span></a></td>
							</tr>
							<?php
							include("panel_sys/supervisor/modal_form_horario_uno.php");	
						}
						if ($consulta_jornada == 2){
							include("panel_sys/supervisor/section_jornada_doble.php");	
						}
						if ($consulta_jornada == 1) {
					    	include("panel_sys/supervisor/section_jornada_normal.php");	
						}


					}	
					#estados cumplido definido por defini falto retraso
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>