<?php 
	include("../funciones.php");
	include("espacios.php");
	$hrs_ini = sanitizar_get("hrs_ini");
	$min_ini = sanitizar_get("min_ini");
	$hrs_fin = sanitizar_get("hrs_fin");
	$min_fin = sanitizar_get("min_fin");
	$tiempo_inicio_blue = $hrs_ini+($min_ini/60);
	$tiempo_fin_blue    = $hrs_fin+($min_fin/60);

	$id_sala = sanitizar_get("sala");
	$dia     = sanitizar_get("fecha");
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
	
	?>
	    <div style="height:22px;width:100%;background-color:"><?php
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
							if ($tiempo_inicio_blue >= $hora_inicio_turno && $tiempo_fin_blue <= $tiempo_inicio) {
								$ancho_primer_brow = ($tiempo_inicio_blue-$hora_inicio_turno)*100/$ancho_cien;
								$ancho_blue = ($tiempo_fin_blue-$tiempo_inicio_blue)*100/$ancho_cien;
								$ancho_ultimo_brown = ($tiempo_inicio-$tiempo_fin_blue)*100/$ancho_cien;
								echo brown($ancho_primer_brow,"",$hora_inicio_turno,"00",$hora_ini,$min_ini);
								echo blue($ancho_blue,"",$hora_inicio_turno,"00",$hora_ini,$min_ini,$hrs_ini,$min_ini,$hrs_fin,$min_fin);
								echo brown($ancho_ultimo_brown,"",$hora_inicio_turno,"00",$hora_ini,$min_ini);


							}
							else{
								echo brown($ancho_brown,"",$hora_inicio_turno,"00",$hora_ini,$min_ini);	
							}

							$ancho_purple = ($tiempo_fin-$tiempo_inicio)*100/$ancho_cien;
							echo purple($ancho_purple,"");
						}
						if ($tiempo_fin > $rango_redon_for) {
							$cachito = "si";
							if ($tiempo_inicio_blue >= $hora_inicio_turno && $tiempo_fin_blue <= $tiempo_inicio) {
								$ancho_primer_brow = ($tiempo_inicio_blue-$hora_inicio_turno)*100/$ancho_cien;
								$ancho_blue = ($tiempo_fin_blue-$tiempo_inicio_blue)*100/$ancho_cien;
								$ancho_ultimo_brown = ($tiempo_inicio-$tiempo_fin_blue)*100/$ancho_cien;
								echo brown($ancho_primer_brow,"",$hora_inicio_turno,"00",$hora_ini,$min_ini);
								echo blue($ancho_blue,"",$hora_inicio_turno,"00",$hora_ini,$min_ini,$hrs_ini,$min_ini,$hrs_fin,$min_fin);
								echo brown($ancho_ultimo_brown,"",$hora_inicio_turno,"00",$hora_ini,$min_ini);
							}							
							else{
								$ancho_brown  = ($tiempo_inicio - $hora_inicio_turno)*100/$ancho_cien;
								echo brown($ancho_brown,"$mensaje",$hora_inicio_turno,"00",$hora_ini,$min_ini);
								#echo "un cacho estara afuera";
							}
							$ancho_purple = ($rango_redon_for - $tiempo_inicio)*100/$ancho_cien;
							echo  purple($ancho_purple,"");
						}
						$var_comienzo = 1;
					}
					else{
						if ($tiempo_inicio > $hora_inicio_turno && $tiempo_fin <= $rango_redon_for) {
							
							if ($tiempo_inicio_blue>=$salida_fin && $tiempo_fin_blue<=$tiempo_inicio) {
								$ancho_primer_brown = ($tiempo_inicio_blue-$salida_fin)*100/$ancho_cien;
								$ancho_blue = ($tiempo_fin_blue-$tiempo_inicio_blue)*100/$ancho_cien;
								$ancho_ultimo_brown = ($tiempo_inicio-$tiempo_fin_blue)*100/$ancho_cien;
								echo brown($ancho_primer_brown,"",$salida_hora_fin,$salida_min_fin,$hora_ini,$min_ini);
								echo blue($ancho_blue,"",$salida_hora_fin,$salida_min_fin,$hora_ini,$min_ini,$hrs_ini,$min_ini,$hrs_fin,$min_fin);
								echo brown($ancho_ultimo_brown,"",$salida_hora_fin,$salida_min_fin,$hora_ini,$min_ini);
							}
							else{
								$ancho_brown  = ($tiempo_inicio - $salida_fin)*100/$ancho_cien;
			 					echo brown($ancho_brown,"",$salida_hora_fin,$salida_min_fin,$hora_ini,$min_ini);
							}
							

		 					$ancho_purple = ($tiempo_fin-$tiempo_inicio)*100/$ancho_cien;
		 					echo purple($ancho_purple,"");

							#echo "---va entre $tiempo_fin - $hora_fin_turno";
						}
						if ($tiempo_fin > $rango_redon_for) {
							$cachito = "si";
							if ($tiempo_inicio_blue>=$salida_fin && $tiempo_fin_blue<=$tiempo_inicio) {
								$ancho_primer_brown = ($tiempo_inicio_blue-$salida_fin)*100/$ancho_cien;
								$ancho_blue = ($tiempo_fin_blue-$tiempo_inicio_blue)*100/$ancho_cien;
								$ancho_ultimo_brown = ($tiempo_inicio-$tiempo_fin_blue)*100/$ancho_cien;
								echo brown($ancho_primer_brown,"",$salida_hora_fin,$salida_min_fin,$hora_ini,$min_ini);
								echo blue($ancho_blue,"",$salida_hora_fin,$salida_min_fin,$hora_ini,$min_ini,$hrs_ini,$min_ini,$hrs_fin,$min_fin);
								echo brown($ancho_ultimo_brown,"",$salida_hora_fin,$salida_min_fin,$hora_ini,$min_ini);
							}
							else{
								$ancho_brown  = ($tiempo_inicio - $salida_fin)*100/$ancho_cien;
			 					echo brown($ancho_brown,"",$salida_hora_fin,$salida_min_fin,$hora_ini,$min_ini);
							}

							$ancho_purple = ($rango_redon_for - $tiempo_inicio)*100/$ancho_cien;
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
								$tiempo_fin_blue;
								$tiempo_inicio_blue;	
								if ($tiempo_inicio_blue>=$tiempo_fin && $tiempo_fin_blue<=$rango_redon_for) {
									$ancho_primer_brown = ($tiempo_inicio_blue-$tiempo_fin)*100/$ancho_cien;
									$ancho_blue = ($tiempo_fin_blue-$tiempo_inicio_blue)*100/$ancho_cien;
									$ancho_ultimo_brown = ($rango_redon_for-$tiempo_fin_blue)*100/$ancho_cien;
									echo brown($ancho_primer_brown,"<span class='aqui'></span>",$hora_fin,$min_fin,$rango_redon_for,"00");	
									echo blue($ancho_blue,"<span class='aqui_hay'></span>",$hora_fin,$min_fin,$rango_redon_for,"00",$hrs_ini,$min_ini,$hrs_fin,$min_fin);
									if ($ancho_ultimo_brown!=0) {
									echo brown($ancho_ultimo_brown,"<span class='aqui'></span>",$hora_fin,$min_fin,$rango_redon_for,"00");
									}
									$var_continue = "si"; 

								}
								else{
									if ($tiempo_inicio_blue>=$tiempo_fin && $tiempo_inicio_blue<$rango_redon_for && $tiempo_fin_blue>$rango_redon_for) {
										$ancho_primer_brown = ($tiempo_inicio_blue-$tiempo_fin)*100/$ancho_cien;
											
											$ancho_blue = ($rango_redon_for-$tiempo_inicio_blue)*100/$ancho_cien;
											//$ancho_ultimo_brown = ($rango_redon_for-$tiempo_fin_blue)*100/$ancho_cien;
											echo brown($ancho_primer_brown,"<span class='aqui'></span>",$hora_fin,$min_fin,$rango_redon_for,"00");	
											echo blue($ancho_blue,"<span clas='aqui_hay'></span>",$hora_fin,$min_fin,$rango_redon_for,"00",$hrs_ini,$min_ini,$hrs_fin,$min_fin);
											if ($ancho_ultimo_brown!=0) {
											//echo brown($ancho_ultimo_brown,"<span class='aqui'></span>",$hora_fin,$min_fin,$rango_redon_for,"00");
											}
											$var_continue = "si"; 										
									}
									else{
										echo brown($ancho_brown,"<span class='aqui'></span>",$hora_fin,$min_fin,$rango_redon_for,"00");	
										$var_continue = "si";										
									}
								}

							}
											
						}

					}
				}
				if ($num_consulta == 0) {
					if ($tiempo_inicio_blue>=$hora_inicio_turno && $tiempo_fin_blue <= $rango_redon_for) {
						$ancho_primer_brown = ($tiempo_inicio_blue-$hora_inicio_turno)*100/$ancho_cien;
						$ancho_blue = ($tiempo_fin_blue-$tiempo_inicio_blue)*100/$ancho_cien;
						$ancho_ultimo_brown = ($rango_redon_for-$tiempo_fin_blue)*100/$ancho_cien;
						echo brown($ancho_primer_brown,"<span class='aqui total_brown'></span>",$hora_inicio_turno,"00",$rango_redon_for,"00");
						echo blue($ancho_blue,"<span clas='aqui_hay'></span>",$hora_inicio_turno,"00",$rango_redon_for,"00",$hrs_ini,$min_ini,$hrs_fin,$min_fin);
						if ($ancho_ultimo_brown != 0) {
							echo brown($ancho_ultimo_brown,"<span class='aqui total_brown'></span>",$hora_inicio_turno,"00",$rango_redon_for,"00");
						}

					}
					else{
						if ($tiempo_inicio_blue >= $hora_inicio_turno && $tiempo_inicio_blue < $rango_redon_for && $tiempo_fin_blue>$rango_redon_for) {
							$ancho_primer_brown = ($tiempo_inicio_blue-$hora_inicio_turno)*100/$ancho_cien;
							$ancho_blue = ($rango_redon_for-$tiempo_inicio_blue)*100/$ancho_cien;
							echo brown($ancho_primer_brown,"<span class='aqui total_brown'></span>",$hora_inicio_turno,"00",$rango_redon_for,"00");
							echo blue($ancho_blue,"<span clas='aqui_hay'></span>",$hora_inicio_turno,"00",$rango_redon_for,"00",$hrs_ini,$min_ini,$hrs_fin,$min_fin);
						}
						else{
							echo brown(100,"<span class='aqui total_brown'></span>",$hora_inicio_turno,"00",$rango_redon_for,"00");
						}
					}
					//
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
						$ancho_purple = ($tiempo_fin-$tiempo_inicio)*100/$ancho_cien;
						if ($var_continue == "si") {
							//echo brown($ancho_brown,"<span class='aqui'></span>",$rango_redon_for,"00",$hora_ini,$min_ini);	
						    if ($tiempo_inicio_blue < $rango_redon_for && $tiempo_fin_blue>$rango_redon_for) {
						    	$ancho_blue = ($tiempo_fin_blue-$rango_redon_for)*100/$ancho_cien;
						    	$ancho_brown = ($tiempo_inicio-$tiempo_fin_blue)*100/$ancho_cien;
						    	echo blue($ancho_blue,"<span class='aqui_hay'></span>",$rango_redon_for,"00",$hora_ini,$min_ini,$hrs_ini,$min_ini,$hrs_fin,$min_fin);
						    	echo brown($ancho_brown,"<span class='aqui'></span>",$rango_redon_for,"00",$hora_ini,$min_ini);

						    }
						    else{
							    if ($tiempo_inicio_blue >= $rango_redon_for && $tiempo_fin_blue <=$tiempo_inicio) {
							    	$ancho_primer_brown = ($tiempo_inicio_blue-$rango_redon_for)*100/$ancho_cien;
							    	$ancho_blue = ($tiempo_fin_blue-$tiempo_inicio_blue)*100/$ancho_cien;
							    	$ancho_ultimo_brown = ($tiempo_inicio-$tiempo_fin_blue)*100/$ancho_cien;
							    	echo brown($ancho_primer_brown,"<span class='aqui'></span>",$rango_redon_for,"00",$hora_ini,$min_ini);
							    	echo blue($ancho_blue,"<span class='aqui_hay'></span>",$rango_redon_for,"00",$hora_ini,$min_ini,$hrs_ini,$min_ini,$hrs_fin,$min_fin);
							    	echo brown($ancho_ultimo_brown,"<span class='aqui'></span>",$rango_redon_for,"00",$hora_ini,$min_ini);
							    }
							    else{
							    	$ancho_brown  = ($tiempo_inicio-$rango_redon_for)*100/$ancho_cien;
							    	echo brown($ancho_brown,"<span class='aqui'></span>",$rango_redon_for,"00",$hora_ini,$min_ini);	
							    }
							}

						}
						else{
							if ($tiempo_inicio_blue >= $rango_redon_for && $tiempo_fin_blue <= $tiempo_inicio) {
								$ancho_primer_brown = ($tiempo_inicio_blue-$rango_redon_for)*100/$ancho_cien;
								$ancho_blue = ($tiempo_fin_blue-$tiempo_inicio_blue)*100/$ancho_cien;
								$ancho_ultimo_brown = ($tiempo_inicio - $tiempo_fin_blue)*100/$ancho_cien;
								echo brown($ancho_primer_brown,"",$rango_redon_for,"00",$hora_ini,$min_ini);
								echo blue($ancho_blue,"",$rango_redon_for,"00",$hora_ini,$min_ini,$hrs_ini,$min_ini,$hrs_fin,$min_fin);
								echo brown($ancho_ultimo_brown,"",$rango_redon_for,"00",$hora_ini,$min_ini);
							}
							else{
								$ancho_brown  = ($tiempo_inicio-$rango_redon_for)*100/$ancho_cien;		
							    echo brown($ancho_brown,"",$rango_redon_for,"00",$hora_ini,$min_ini);
							}
						}
 						echo purple($ancho_purple,"");
						
					}
					$var_comienzo = 1;
				}	
				else{ 
					if ($tiempo_inicio_blue >= $salida_fin && $tiempo_fin_blue <= $tiempo_inicio) {
						$ancho_uno = ($tiempo_inicio_blue-$salida_fin)*100/$ancho_cien;
						$ancho_two = ($tiempo_fin_blue-$tiempo_inicio_blue)*100/$ancho_cien;
						$ancho_tre = ($tiempo_inicio-$tiempo_fin_blue)*100/$ancho_cien;
						echo brown($ancho_uno,"",$salida_hora_fin,$salida_min_fin,$hora_ini,$min_fin);
						echo blue($ancho_two,"",$salida_hora_fin,$salida_min_fin,$hora_ini,$min_fin,$hrs_ini,$min_ini,$hrs_fin,$min_fin);
						echo brown($ancho_tre,"",$salida_hora_fin,$salida_min_fin,$hora_ini,$min_fin);	
					}
					else{
						$ancho_brown  = ($tiempo_inicio-$salida_fin)*100/$ancho_cien;
						echo brown($ancho_brown,"",$salida_hora_fin,$salida_min_fin,$hora_ini,$min_fin);
					}

					$ancho_purple = ($tiempo_fin-$tiempo_inicio)*100/$ancho_cien;
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
					if ($tiempo_inicio_blue>=$tiempo_fin && $tiempo_fin_blue<=$hora_fin_turno) {
						$ancho_uno = ($tiempo_inicio_blue-$tiempo_fin)*100/$ancho_cien;
						$ancho_two = ($tiempo_fin_blue-$tiempo_inicio_blue)*100/$ancho_cien;
						$ancho_tre = ($hora_fin_turno-$tiempo_fin_blue)*100/$ancho_cien;
						echo brown($ancho_uno,"",$hora_fin,$min_ini,$hora_fin_turno,00);
						echo blue($ancho_two,"",$hora_fin,$min_ini,$hora_fin_turno,00,$hrs_ini,$min_ini,$hrs_fin,$min_fin);
						echo brown($ancho_tre,"",$hora_fin,$min_ini,$hora_fin_turno,00);
					}
					else{
						$ancho_brown = ($hora_fin_turno-$tiempo_fin)*100/$ancho_cien;	
						echo brown($ancho_brown,"",$hora_fin,$min_ini,$hora_fin_turno,00);
					}					
				}
			}
			if ($num_consulta == 0) {
				if ($var_continue == "si") {
					if ($tiempo_inicio_blue < $rango_redon_for && $tiempo_fin_blue >=$rango_redon_for  ) {
						$ancho_blue = ($tiempo_fin_blue-$rango_redon_for)*100/$ancho_cien;
						$ancho_two  = ($hora_fin_turno-$tiempo_fin_blue)*100/$ancho_cien;
						echo blue($ancho_blue,"<span class='aqui_hay'></span>",$rango_redon_for,"00",$hora_fin_turno,"00",$hrs_ini,$min_ini,$hrs_fin,$min_fin);
						echo brown($ancho_two,"<span class='aqui total_brown'></span>",$rango_redon_for,"00",$hora_fin_turno,"00"); 
					}
					else{
						if ($tiempo_inicio_blue >= $rango_redon_for) {
							$ancho_uno = ($tiempo_inicio_blue-$rango_redon_for)*100/$ancho_cien;
							$ancho_two = ($tiempo_fin_blue-$tiempo_inicio_blue)*100/$ancho_cien;
							$ancho_tre = ($hora_fin_turno-$tiempo_fin_blue)*100/$ancho_cien;
							echo brown($ancho_uno,"<span class='aqui total_brown'></span>",$rango_redon_for,"00",$hora_fin_turno,"00");
							echo blue($ancho_two,"<span class='aqui_hay'></span>",$rango_redon_for,"00",$hora_fin_turno,"00",$hrs_ini,$min_ini,$hrs_fin,$min_fin);
							echo brown($ancho_tre,"<span class='aqui total_brown'></span>",$rango_redon_for,"00",$hora_fin_turno,"00");
						}
						else{
							echo brown(100,"<span class='aqui total_brown'></span>",$rango_redon_for,"00",$hora_fin_turno,"00");
						}
					}
				}
				else{
					if ($tiempo_inicio_blue>=$rango_redon_for && $tiempo_fin_blue <=$hora_fin_turno) {
						$ancho_uno = ($tiempo_inicio_blue-$rango_redon_for)*100/$ancho_cien;
						$ancho_two = ($tiempo_fin_blue-$tiempo_inicio_blue)*100/$ancho_cien;
						$ancho_tre = ($hora_fin_turno-$tiempo_fin_blue)*100/$ancho_cien;
						echo brown($ancho_uno,"<span class='total_brown'></span>",$rango_redon_for,"00",$hora_fin_turno,"00");
						echo blue($ancho_two,"<span class='aqui_hay'></span>",$rango_redon_for,"00",$hora_fin_turno,"00",$hrs_ini,$min_ini,$hrs_fin,$min_fin);
						echo brown($ancho_tre,"<span class='total_brown'></span>",$rango_redon_for,"00",$hora_fin_turno,"00");
					}
					else{
						echo brown(100,"<span class='total_brown'></span>",$rango_redon_for,"00",$hora_fin_turno,"00");
					}
				}
				
			}
			echo "<br><br><br>";
?>