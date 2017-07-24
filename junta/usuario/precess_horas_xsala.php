<?php 
	include("../funciones.php");
	session_start();
	$id_usuario = $_SESSION['id_usuario'];

	$id_sala = sanitizar_get("id_sala");
	$fecha_junta = sanitizar_get("fecha_junta");
	$hora_inicio = sanitizar_get("hrs_ini");
    $min_inicio  = sanitizar_get("min_ini");
    $hora_fin    = sanitizar_get("hrs_fin");
    $min_fin     = sanitizar_get("min_fin");

    $tiempo_inicio = $hora_inicio+($min_inicio/60);
    $tiempo_fin    = $hora_fin+($min_fin/60);

    $consulta_sala = consulta_array("SELECT hora_inicio,hora_fin FROM salas_juntas WHERE id_sala = '$id_sala'");
    $hora_inicio_turno = $consulta_sala["hora_inicio"];
    $hora_fin_turno    = $consulta_sala["hora_fin"];
    $val_pasa = 0;
    if ($hora_inicio>=$hora_inicio_turno && $hora_fin<=$hora_fin_turno ) {
    	//echo $esp."pasa";
    }
    else{
    	$val_pasa = 1;
    	$mens_nopasa = "La reserva no esta dentro del rango en que opera la sala";
    }

    $consulta_hay_uno = consulta_val("SELECT null FROM reservas_juntas WHERE dia='$fecha_junta' and id_usuario!='$id_usuario' and id_sala='$id_sala' and (tiempo_inicio >= '$tiempo_inicio' and tiempo_inicio <= '$tiempo_fin')");
	
	$consulta_hay_two = consulta_val("SELECT null FROM reservas_juntas WHERE dia='$fecha_junta' and id_usuario!='$id_usuario' and id_sala='$id_sala' and (tiempo_fin >= '$tiempo_inicio' and tiempo_fin <= '$tiempo_fin')");

	$consulta_hay_tre = consulta_val("SELECT null FROM reservas_juntas WHERE dia='$fecha_junta' and id_usuario!='$id_usuario' and id_sala='$id_sala' and (tiempo_inicio >= '$tiempo_inicio' and tiempo_fin <= '$tiempo_fin')");
	
	$consulta_hay_fou = consulta_val("SELECT null FROM reservas_juntas WHERE dia='$fecha_junta' and id_usuario!='$id_usuario' and id_sala='$id_sala' and (tiempo_inicio <= '$tiempo_inicio' and tiempo_inicio >= '$tiempo_fin')");
    
	if ($consulta_hay_uno==0 && $consulta_hay_two==0 && $consulta_hay_tre==0 && $consulta_hay_fou==0) {
			//echo $esp."Tambien pasa esta validacion";
	}
	else{
			$val_pasa = 1;
			$mens_nopasa = "Alguien más ya reservo algun espacio de este horario";
	}

	/*$consulta_hay_cinc = consulta_val("SELECT null FROM reservas_juntas WHERE dia='$fecha_junta' and id_usuario='$id_usuario' and id_sala!='$id_sala' and (tiempo_inicio >= '$tiempo_inicio' and tiempo_inicio <= '$tiempo_fin')");
	
	$consulta_hay_seis = consulta_val("SELECT null FROM reservas_juntas WHERE dia='$fecha_junta' and id_usuario='$id_usuario' and id_sala!='$id_sala' and (tiempo_fin >= '$tiempo_inicio' and tiempo_fin <= '$tiempo_fin')");

	$consulta_hay_siet = consulta_val("SELECT null FROM reservas_juntas WHERE dia='$fecha_junta' and id_usuario='$id_usuario' and id_sala!='$id_sala' and (tiempo_inicio >= '$tiempo_inicio' and tiempo_fin <= '$tiempo_fin')");
	
	$consulta_hay_ocho = consulta_val("SELECT null FROM reservas_juntas WHERE dia='$fecha_junta' and id_usuario='$id_usuario' and id_sala!='$id_sala' and (tiempo_inicio <= '$tiempo_inicio' and tiempo_inicio >= '$tiempo_fin')");
    
	if ($consulta_hay_cinc==0 && $consulta_hay_seis==0 && $consulta_hay_siet==0 && $consulta_hay_ocho==0) {
			//echo $esp."Tambien pasa esta validacion de encimacion";
	}
	else{
			$mens_nopasa = "Usted ya reservo este horario";
	}*/
?>
<div class="form-group">
		        <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"> Inicia</label>
		        <div class="col-sm-3">
		            <select name="hrs_ini" id="hrs_ini" class="form-control input_blue input-sm">
		          	 	<option value="<?php echo $hora_inicio ?>" class="ip"><?php echo $hora_inicio ?> Hrs</option>
		          	 	<?php
		          	 		for ($i=$hora_inicio_turno; $i <$hora_fin_turno ; $i++) { 
		          	 			$i = tiempo_esp($i);
		          	 			echo "<option value='$i'>$i hrs</option>";
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
		                		if ($hora_inicio < $hora_inicio_turno) {
		                			
		                		}
		                		else{
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
<?php 
	if ($val_pasa != 0) {
			?>
			<div class="form-group">
				<div class="col-sm-3">
					<center><?php echo $mens_nopasa ?></center>
					<input type="text" value="No pasa :(" class="no_pasa">
				</div>
			</div>
			<?php
	}
?>