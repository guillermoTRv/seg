<?php 
	include("../funciones.php");
	include("espacios.php");
	$id_sala =  sanitizar("sala_txt");
	$dia     =  sanitizar("dia_txt");
	$valor_info = sanitizar("valor_info");
	

	$consulta_horarios = consulta_array("SELECT hora_inicio,hora_fin FROM salas_juntas WHERE id_sala = '$id_sala'");
	$hora_inicio_turno = $consulta_horarios['hora_inicio'];
	$hora_fin_turno  = $consulta_horarios['hora_fin'];
	$rango_turno = $hora_fin_turno - $hora_inicio_turno;
	$rango_mitad = $rango_turno/2; 
	$rango_redon = round($rango_mitad);
	$rango_redon_for = $hora_inicio_turno+$rango_redon;


	$width = 100/$rango_redon;
	$oper_a = $rango_turno - $rango_redon;
	$width_ultimo = $width*$oper_a;
	$consulta_disponibilidad = consulta_val("SELECT null FROM reservas_juntas WHERE id_sala ='$id_sala' and dia = '$dia'");
	if ($consulta_disponibilidad == 0 ) {
		$mensaje_horarios  = "La sala esta disponible para cualquier hora en turno";
		//$horas = for ($i=$hora_inicio; $i < $hora_fin ; $i++) { echo "<br>".$i;}
		echo "<h3>$mensaje_horarios</h3>";
		if ($valor_info == "si") {
		}
		else{
			echo "<p margin-bottom:10px;>Espacios marrón disponibles - Click en ellos</p>";
		}
		
		?>
		<div class="cajota"><div style="height:22px;width:100%;background-color:"><?php
		for ($i=$hora_inicio_turno; $i < $rango_redon_for ; $i++) { 
			if ($i < 10 && $i!=$hora_inicio_turno) {$i = "0".$i;}
			?>
			<div style="display:inline-block;height:22px;width:<?php echo $width ?>%;background-color:white;margin-right:-4px;border-right:1px solid black">
				<p class="p_hora"><?php echo $i ?>hrs</p>
			</div>
			<?php
		}
		?>
		</div>
		<div style="height:20px;width:100%;background-color:">
			<div class='disponible' data-tipo='total' data-horainicio="<?php echo $hora_inicio_turno ?>" data-horafin="<?php echo $hora_fin_turno ?>" style="display:inline-block;height:30px;width:100%;background-color:brown;margin-right:-4px;padding-left: 2px;padding-top: 1px">
			  	<p class="p_hora_mens"><span class='icon-checkmark'></span></p>
			</div>
		</div>
		<br><?php
		
		?><div style="height:22px;width:100%;background-color:"><?php
		for ($i=$rango_redon_for; $i < $hora_fin_turno ; $i++) { 
			?>
			<div style="display:inline-block;height:22px;width:<?php echo $width ?>%;background-color:white;margin-right:-4px;border-right:1px solid black">
				<p class="p_hora"><?php echo $i ?>hrs</p>
			</div>
			<?php
		}
		?>
		</div>
		<div style="height:20px;width:100%;">
			<div class="disponible" data-tipo='total' data-horainicio="<?php echo $hora_inicio_turno ?>" data-horafin="<?php echo $hora_fin_turno ?>" style="display:inline-block;height:30px;width:<?php echo $width_ultimo ?>%;background-color:brown;margin-right:-4px;padding-left:2px;padding-top:1px">
			  	<p class="p_hora_mens"><span class='icon-checkmark'></span></p>
			</div>
		</div></div>
		<?php
		
	}
	else{
		$memo = 0;
		echo "<h3>Ocupada para los siguientes horarios</h3>";
		if ($valor_info == "si") {
		}
		else{
			echo "<p margin-bottom:10px;>Espacios marrón disponibles - Click en ellos</p>";
		}
		?>
		<div class="cajota"><div style="height:22px;width:100%;background-color:"><?php
			for ($i=$hora_inicio_turno; $i < $rango_redon_for ; $i++) { 
				if ($i < 10 && $i!=$hora_inicio_turno) {$i = "0".$i;}
				?>
				<div style="display:inline-block;height:22px;width:<?php echo $width ?>%;background-color:white;margin-right:-4px;border-right:1px solid black">
					<p class="p_hora"><?php echo $i ?>hrs</p>
				</div>
				<?php
			}
			?>
		</div>
		    <?php
			$consulta_uno = mysqli_query($q_sec,"SELECT * FROM reservas_juntas WHERE id_sala ='$id_sala' and dia = '$dia' and tiempo_inicio < '$rango_redon_for' order by tiempo_inicio asc");
			$num_consulta = consulta_val("SELECT null FROM reservas_juntas WHERE id_sala ='$id_sala' and dia = '$dia' and tiempo_inicio < '$rango_redon_for'");
			$ancho_cien = $rango_redon_for - $hora_inicio_turno; 
			$esp."|$rango_redon_for|".$ancho_cien."||$esp";
			echo '<div style="height:20px;width:100%;background-color">';
			$var_comienzo = 0;
			$var_ciclo =0;
			while ($array = mysqli_fetch_array($consulta_uno)) {
				$tiempo_inicio = $array['tiempo_inicio'];	
				$tiempo_fin    = $array['tiempo_fin'];
				$hora_ini = $array['hora_inicio'];
				$min_ini  = $array['min_inicio'];
				$hora_fin = $array['hora_finalizacion'];
				$min_fin  = $array['min_fin'];
				//echo $tiempo_inicio."-".$tiempo_fin;
				if ($var_comienzo == 0) {
					if ($tiempo_inicio == $hora_inicio_turno) {
						$ancho_purple = ($tiempo_fin-$tiempo_inicio)*100/$ancho_cien;
						echo purple($ancho_purple,"");
					}
					if ($tiempo_inicio > $hora_inicio_turno && $tiempo_fin <= $rango_redon_for) {
						$ancho_brown  = ($tiempo_inicio - $hora_inicio_turno)*100/$ancho_cien;
						$ancho_purple = ($tiempo_fin-$tiempo_inicio)*100/$ancho_cien;
						echo brown($ancho_brown,"",$hora_inicio_turno,"00",$hora_ini,$min_ini);
						echo purple($ancho_purple,"");
					}
					if ($tiempo_fin > $rango_redon_for) {
						$cachito = "si";
						$ancho_brown  = ($tiempo_inicio - $hora_inicio_turno)*100/$ancho_cien;
						$ancho_purple = ($rango_redon_for - $tiempo_inicio)*100/$ancho_cien;
						echo brown($ancho_brown,"",$hora_inicio_turno,"00",$hora_ini,$min_ini);
						echo  purple($ancho_purple,"");
						#echo "un cacho estara afuera";
					}
					$var_comienzo = 1;
				}
				else{
					if ($tiempo_inicio > $hora_inicio_turno && $tiempo_fin <= $rango_redon_for) {
						
						$ancho_brown  = ($tiempo_inicio - $salida_fin)*100/$ancho_cien;
						$ancho_purple = ($tiempo_fin-$tiempo_inicio)*100/$ancho_cien;
	 					echo brown($ancho_brown,"",$salida_hora_fin,$salida_min_fin,$hora_ini,$min_ini);
	 					echo purple($ancho_purple,"");

						#echo "---va entre $tiempo_fin - $hora_fin_turno";
					}
					if ($tiempo_fin > $rango_redon_for) {
						$cachito = "si";
						$ancho_brown  = ($tiempo_inicio-$salida_fin)*100/$ancho_cien;
						$ancho_purple = ($rango_redon_for - $tiempo_inicio)*100/$ancho_cien;
						echo brown($ancho_brown,"",$salida_hora_fin,$salida_min_fin,$hora_ini,$min_ini);
						echo purple($ancho_purple,"");
						#echo "un cachito";
					}
				}
				$salida_ini = $tiempo_inicio;
				$salida_fin = $tiempo_fin;
				$salida_hora_ini = $hora_ini;
				$salida_min_ini  = $min_ini;
				$salida_hora_fin = $hora_fin;
				$salida_min_fin  = $min_fin;
				$var_ciclo ++;
				#echo $var_ciclo;
				if ($var_ciclo == $num_consulta) {
					if ($cachito == "si") {
					}
					else{
						$ancho_brown = ($rango_redon_for-$tiempo_fin)*100/$ancho_cien;
						if ($ancho_brown != 0) {
							echo brown($ancho_brown,"<span class='aqui'></span>",$hora_fin,$min_fin,$rango_redon_for,"00");	
							$var_continue = "si";
						}
										
					}

				}
			}
			if ($num_consulta == 0) {
				echo brown(100,"<span class='aqui total_brown'></span>",$hora_inicio_turno,"00",$rango_redon_for,"00");
				$var_continue = "si";
			}
			echo "</div>";
		?><br>
		<div style="height:22px;width:100%;background-color:"><?php
			for ($i=$rango_redon_for; $i < $hora_fin_turno ; $i++) { 
				?>
				<div style="display:inline-block;height:22px;width:<?php echo $width ?>%;background-color:white;margin-right:-4px;border-right:1px solid black">
					<p class="p_hora"><?php echo $i ?>hrs</p>
				</div>
				<?php
			}
			 $ancho_total = ($hora_fin_turno-$rango_redon_for)*$width; 
			?>
		</div>
		<?php 
			$consulta_dos = mysqli_query($q_sec,"SELECT * FROM reservas_juntas WHERE id_sala ='$id_sala' and dia = '$dia' and tiempo_fin > '$rango_redon_for' order by tiempo_inicio asc");
			$num_consulta = consulta_val("SELECT null FROM reservas_juntas WHERE id_sala ='$id_sala' and dia = '$dia' and tiempo_fin > '$rango_redon_for'");
			$ancho_cien = $hora_fin_turno - $rango_redon_for; 
			$esp."|$rango_redon_for|".$ancho_cien."||$esp";
			echo "<div style='height:20px;width:$ancho_total%;background-color:;'>";
			$var_comienzo = 0;
			$var_ciclo =0;
			while ($array = mysqli_fetch_array($consulta_dos)) {
				$tiempo_inicio = $array['tiempo_inicio'];	
				$tiempo_fin    = $array['tiempo_fin'];
				$hora_ini = $array['hora_inicio'];
				$min_ini  = $array['min_inicio'];
				$hora_fin = $array['hora_finalizacion'];
				$min_fin  = $array['min_fin'];
				if ($var_comienzo == 0) {
					if ($tiempo_inicio < $rango_redon_for) {
						$ancho_purple = ($tiempo_fin-$rango_redon_for)*100/$ancho_cien;
						echo purple($ancho_purple,"");
					}
					if ($tiempo_inicio == $rango_redon_for) {
						$ancho_purple = ($tiempo_fin-$tiempo_inicio)*100/$ancho_cien;
						echo purple($ancho_purple,"");
					}
					if ($tiempo_inicio > $rango_redon_for) {
						$ancho_brown  = ($tiempo_inicio-$rango_redon_for)*100/$ancho_cien;
						$ancho_purple = ($tiempo_fin-$tiempo_inicio)*100/$ancho_cien;
						if ($var_continue == "si") {
							echo brown($ancho_brown,"<span class='aqui'></span>",$rango_redon_for,"00",$hora_ini,$min_ini);	
						}
						else{
							echo brown($ancho_brown,"",$rango_redon_for,"00",$hora_ini,$min_ini);
						}
 						echo purple($ancho_purple,"");
						
					}
					$var_comienzo = 1;
				}	
				else{ 
					$ancho_brown  = ($tiempo_inicio-$salida_fin)*100/$ancho_cien;
					$ancho_purple = ($tiempo_fin-$tiempo_inicio)*100/$ancho_cien;
					echo brown($ancho_brown,"",$salida_hora_fin,$salida_min_fin,$hora_ini,$min_fin);
					echo purple($ancho_purple,"");
				}
				$salida_ini = $tiempo_inicio;
				$salida_fin = $tiempo_fin;
				$salida_hora_ini = $hora_ini;
				$salida_min_ini  = $min_ini;
				$salida_hora_fin = $hora_fin;
				$salida_min_fin  = $min_fin;
				$var_ciclo ++;
				#echo $var_ciclo;
				if ($var_ciclo == $num_consulta) {
					$ancho_brown = ($hora_fin_turno-$tiempo_fin)*100/$ancho_cien;
					echo brown($ancho_brown,"",$hora_fin,$min_ini,$hora_fin_turno,00);					
				}
			}
			if ($num_consulta == 0) {
				if ($var_continue == "si") {
					echo brown(100,"<span class='aqui total_brown'></span>",$rango_redon_for,"00",$hora_fin_turno,"00");
				}
				else{
					echo brown(100,"<span class='total_brown'></span>",$rango_redon_for,"00",$hora_fin_turno,"00");
				}
				
			}
			echo "</div>";
		
		?>
		<?php
	}

?>