<?php 
	include("../funciones.php");
	$id_reserva = sanitizar_get("id_reserva");
	$array     = consulta_array("SELECT * FROM reservas_juntas WHERE id_reserva='$id_reserva'");
	$id_sala   = $array['id_sala'];
	$consulta_sala = consulta_array("SELECT * FROM salas_juntas WHERE id_sala = '$id_sala'","name_sala");
	$name_sala         = $consulta_sala['name_sala'];
	$hora_inicio_turno = tiempo($consulta_sala['hora_inicio']);
	$hora_fin_turno    = tiempo($consulta_sala['hora_fin']);
	$snaks        = $array['snaks'];

	$fecha_junta = $array['dia'];
	$hora_inicio = $array['hora_inicio'];
	$min_inicio  = $array['min_inicio'];
	$hora_fin    = $array['hora_finalizacion'];
	$min_fin     = $array['min_fin'];
	$detalles_c  = $array['detalles'];
	if ($detalles_c == "") {
		$detalles = "No hay detalles";
	}
	else{
		$detalles = $detalles_c;
	}
	$dia_num     = substr($fecha_junta,8,2);
	$mes_num     = substr($fecha_junta,5,2);
 	$fecha_poner = saber_dia($fecha_junta)." $dia_num de ".mes($mes_num);

 	$disponibilidad_dia = mysqli_query($q_sec,"SELECT * FROM reservas_juntas WHERE dia = '$fecha_junta' and id_sala='$id_sala' order by hora_inicio asc");
 	$num_dis = 0;
 	while ($array_disponibilidad = mysqli_fetch_array($disponibilidad_dia)) {
 		$hora_inicio_dis = tiempo($array_disponibilidad['hora_inicio']);
 		$min_inicio_dis  = tiempo($array_disponibilidad['min_inicio']);
 		$hora_fin_dis    = tiempo($array_disponibilidad['hora_finalizacion']);
 		$min_fin_dis     = tiempo($array_disponibilidad['min_fin']);
 		if ($num_dis == 0) {
 			$ocupado         = "De ".$hora_inicio_dis.":".$min_inicio_dis." a ".$hora_fin_dis.":".$min_fin_dis." ";
 			$num_dis = 1;
 		}
 		else{
 			$ocupado         = " - De ".$hora_inicio_dis.":".$min_inicio_dis." a ".$hora_fin_dis.":".$min_fin_dis." ";
 		}
 		$ocupado_conca   .= $ocupado;
 	}

?>
<h3>Modificar reserva</h3>
<hr class="linea">
<form class="form-horizontal form_mod_reserva" method="POST" enctype="multipart/form-data" style="margin-top:27px">
	<input type="hidden" value="<?php echo $id_reserva ?>" class="id_reserva" name="id_reserva">
    <div class="form-group">
        <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter">Sala</label>
        <div class="col-sm-6">
            <select name="sala_txt" id="sala_txt" class="form-control input_blue input-sm">
            	<option value="<?php echo $id_sala ?>" class="ip"><?php echo $name_sala ?></option>
            	<?php 
            		$consulta_salas = mysqli_query($q_sec,"SELECT * FROM salas_juntas ORDER BY id_sala ASC");
            		while ($array_salas = mysqli_fetch_array($consulta_salas)) {
            			$name_sala_while = $array_salas['name_sala'];
            			$id_sala_while   = $array_salas['id_sala'];
            			echo "<option value='$id_sala_while'>$name_sala_while</option>";
            		}
            	?>
            </select>
            <p class="mens_horario_sala" style="margin-top:5px;margin-bottom:-3px;">Horario de la sala: De <?php echo $hora_inicio_turno ?> hrs A: <?php echo $hora_fin_turno ?> hrs</p>
        </div>
    </div>
	<div class="form-group">
        <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"> Día</label>
        <div class="col-sm-6">
            <div class="input-group">
				<span class="input-group-addon input-sm icon-calendar "></span>
				<input type="text" class="form-control input-sm input_fecha_ventana" placeholder="Seleccione Fecha" aria-describedby="basic-addon1" value="<?php echo $fecha_poner ?>" style="cursor: pointer;font-weight: bold;">
				<input type="hidden" name="fecha_txt" id="fecha_txt" value="<?php echo $fecha_junta ?>">
			</div>
			<p style="margin-top:5px;margin-bottom:-3px;" class="mens_ocupada"> Ocupada en los siguientes horarios: <?php echo $ocupado_conca ?></p>
        </div>
    </div>
    <div class="respuesta_horas">
		    <div class="form-group">
		        <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"> Inicia</label>
		        <div class="col-sm-3">
		            <select name="hrs_ini" id="hrs_ini" class="form-control input_blue input-sm">
		          	 	<option value="<?php echo $hora_inicio ?>" class="ip"><?php echo $hora_inicio ?> Hrs</option>
		          	 	<?php
		          	 		for ($i=$hora_inicio_turno; $i < $hora_fin_turno ; $i++) { 
		          	 			$i = tiempo_esp($i);
		          	 			echo "<option class='opt_ini' value='$i'>$i hrs</option>";
		          	 		}
		          	 	?>
		            </select>
		        </div>
		        <div class="col-sm-3">
		            <select name="min_ini" id="min_ini" class="form-control input_blue input-sm">
		            	<option value="<?php echo $min_inicio ?>" class="ip"><?php echo $min_inicio ?> Min</option>
		            	<?php 
		            		for ($i=0; $i < 60 ; $i++) { 
		            			$i = tiempo_esp($i);
		            			echo "<option value='$i'>$i min</option>";
		            		}
		            	?>
		            </select>
		        </div>
		    </div>
		    <div class="form-group">
		        <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"> Termina </label>
		            <div class="col-sm-3">
		                <select name="hrs_fin" id="hrs_fin" class="form-control input_blue input-sm">
		                	<option class="opt_fin" value="<?php echo $hora_fin ?>" class="ip"><?php echo $hora_fin ?> Hrs</option>
							<?php 
								$resta = $hora_fin_turno - $hora_inicio;
								if ($resta >= 6) {
									$valor_for = $hora_inicio +6;
									for ($i=$hora_inicio; $i < $valor_for; $i++) { 
										$i = tiempo_esp($i);
										echo "<option class='opt_fin' value='$i'>$i hrs</option>";
									}
								}
								if ($resta < 6) {
									for ($i=$hora_inicio; $i < $hora_fin_turno; $i++) { 
										$i = tiempo_esp($i);
										echo "<option class='opt_fin' value='$i'>$i hrs</option>";
									}
								}
							?>
		                </select>
		            </div>
		            <div class="col-sm-3">
		                <select name="min_fin" id="min_ini" class="form-control input_blue input-sm">
		                	<option value="<?php echo $min_fin ?>" class="ip"><?php echo $min_fin ?> Min</option>
		                	<?php
			          	 		for ($i=0; $i < 60 ; $i++) { 
			            			$i = tiempo_esp($i);
			            			echo "<option value='$i'>$i min</option>";
			            		}
			          	 	?>
		                </select>
		            </div>
		    </div>
	</div>
    <div class="form-group" style="margin-top:18px">
        <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"> Detalles</label>
        <div class="col-sm-6">
            <input type="text" name="detalles_txt" id="detalles_txt" class="form-control input_blue input-sm" value="<?php echo $detalles ?>">
        </div>
    </div>
    <div class="form-group" style="margin-top:18px">
        <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"> Snaks</label>
        <div class="col-sm-6">
            <div class="input-group">
			         <input type="text" class="form-control snaks_mod" placeholder="Agregar Snaks" aria-describedby="basic-addon2" style="font-weight: bold">
			          <span class="input-group-addon btn_snaks_mod" id="basic-addon2" style="font-weight:bolder;cursor:pointer;">Agregar</span>
			     </div>
			     <br>
			     <div class="lista_snaks_mod">
    				<?php 
    					if ($snaks == "si") {
    						$consulta_array = mysqli_query($q_sec,"SELECT * FROM snaks WHERE id_reserva = '$id_reserva'");
    						$consulta_val_snaks = consulta_val("SELECT * FROM snaks WHERE id_reserva = '$id_reserva'");
    						$num_snak = $consulta_val_snaks;
    						while ($arra_snaks = mysqli_fetch_array($consulta_array)) {
    							$id_snak    = $arra_snaks['id_snak'];
    							$name_snak  = $arra_snaks['snak'];
    							?>	
    									<div><p style='font-size:1.15em'><strong><span class='icon-cancel-circle' style='color:#81DAF5;font-size:1.2em;'></span> <?php echo $name_snak ?></strong></p><input type='hidden' value="<?php echo $name_snak ?>" name='<?php echo $num_snak ?>' id='<?php echo $num_snak ?>' class='input_val_snak'></div>
    							<?php
    							$num_snak--;
    						}
    					}
    					else{
    						//echo "<h4>No registro Snaks</4>";	
    					}
    				?>
			     </div>
			     <input type="hidden" class="input_inicio" name="inicio_snak">
			     <input type="hidden" class="input_fin" name="fin_snak">
        </div>
    </div>             
    <div class="form-group" style="margin-top:20px;margin-bottom:20px">
        <div class="col-sm-offset-2 col-sm-6">
            <button type="button" class="btn btn-default btn-block btn_mod_reserva" style="border:2px solid rgb(8,141,198);font-size:1.2em;font-weight:bold;">Aceptar y Modificar</button>
            <div class="mens" style="font-size:1.1em;font-weight: bold;margin-top:20px"></div>  
        </div>
    </div>
</form>
<button type="button" class="btn btn-primary btn-lg btn_emergente_fecha" data-toggle="modal" data-target="#myfecha" style="display: none">
  Launch demo modal
</button>
<div class="modal fade" id="myfecha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:100px;">
    <div class="modal-content" style="margin:20px;background-color: black;border: 1px solid rgb(8,141,198);-webkit-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);-moz-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color:white" aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel"><p class="name_sala_ventana" style="display:inline"></p>Seleccione el día de su reserva</h3>
      </div>
      <div class="modal-body">
        <?php $month=date("n"); ?>
        <div class="calendario" data="<?php echo $month ?>">  
          <?php
            # definimos los valores iniciales para nuestro calendario
            $year=date("Y");

            $diaActual=date("j");
            # Obtenemos el dia de la semana del primer dia
            # Devuelve 0 para domingo, 6 para sabado

            $diaSemana=date("w",mktime(0,0,0,$month,1,$year));
            # Obtenemos el ultimo dia del mes

            $ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));

            $meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
            "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
          ?>
          <center>
            
              <table id="calendar">

                <caption style="margin-top:20px"><h4><?php echo $meses[$month]." ".$year?><span class=" icon-circle-right siguiente_mes" style="cursor:pointer;margin-left:15px"></span></h4></caption>
                <tr>
                  <th>Lun</th>
                  <th>Mar</th>
                  <th>Mie</th>
                  <th>Jue</th>
                  <th>Vie</th>
                  <th>Sab</th>
                  <th>Dom</th>
                </tr>
                <tr bgcolor="silver">
                  <?php

                  $last_cell=$diaSemana+$ultimoDiaMes;
                  // hacemos un bucle hasta 42, que es el máximo de valores que puede
                  // haber... 6 columnas de 7 dias
                  for($i=1;$i<=42;$i++)
                  {
                    if($i==$diaSemana)

                    {

                      // determinamos en que dia empieza

                      $day=1;

                    }

                    if($i<$diaSemana || $i>=$last_cell)

                    {
                      // celca vacia
                      echo "<td>&nbsp;</td>";

                    }else{

                      // mostramos el dia
                      if($day==$diaActual){
                        if ($day < 10) {
                          $day_pon = "0".$day;
                        }
                        else{
                          $day_pon = $day;
                        }
                        $fecha_calendario_data = $year."-".$month."-".$day_pon;
                        echo "<td data='$fecha_calendario_data' style='background-color:#A4A4A4' class='caja_dia'>$day</td>";
                      }

                      else{

                        if ($day < $diaActual) {
                          echo "<td>$day</td>";                        
                        }
                        if ($day > $diaActual) {
                                                  if ($day < 10) {
                          $day_pon = "0".$day;
                          }
                          else{
                            $day_pon = $day;
                          }
                          $fecha_calendario_data = $year."-".$month."-".$day_pon;
                          echo "<td data='$fecha_calendario_data' style='background-color:#A4A4A4' class='caja_dia'>$day</td>";  
                        }

                      }

                      $day++;
                    }
                    // cuando llega al final de la semana, iniciamos una columna nueva
                    if($i%7==0)
                    {
                      echo "</tr><tr>\n";
                    }
                  }
                ?>
                </tr>

              </table>
          </center>
        </div>
      <div class="row">
      <p class="mensaje_fecha" style="text-align:center;margin-top: 15px">
        
      </p>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-close" data-dismiss="modal" style="font-weight:bold;font-size: 1.1em"> Cerrar Ventana</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" style="font-weight:bold;font-size: 1.1em">Aceptar</button>
      </div>
    </div>
  </div>
</div>
