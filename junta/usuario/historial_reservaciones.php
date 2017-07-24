<a href="" class="regresar_general" style="font-weight: bold;"><span class="icon-reply"></span> Regresar</a>
<h3><span class="icon-drawer"></span> Historial de reservaciones</h3>
<hr class="linea">
<?php 
		  include("../funciones.php");
		  session_start();
		  $id_usuario = $_SESSION['id_usuario'];
          $consulta_re = mysqli_query($q_sec,"SELECT * FROM reservas_juntas WHERE id_usuario='$id_usuario' order by dia desc");
          $cont_re = consulta_val("SELECT * FROM reservas_juntas WHERE id_usuario='$id_usuario'");
          if($cont_re > 0){  
            $num_re = 1;
            while ($array_re = mysqli_fetch_array($consulta_re)) {
              $id_reserva  = $array_re['id_reserva'];
              $id_sala     = $array_re['id_sala'];
              $sala = consulta_tx("SELECT name_sala FROM salas_juntas WHERE id_sala = '$id_sala'","name_sala");
              $hora_inicio = tiempo($array_re['hora_inicio']);
              $min_inicio  = tiempo($array_re['min_inicio']);
              $hora_fin    = tiempo($array_re['hora_finalizacion']);
              $min_fin     = tiempo($array_re['min_fin']);
              $dia_array   = $array_re['dia'];
              $dia_num     = substr($dia_array,8,2);
              $mes_num     = substr($dia_array,5,2);
              $year_num    = substr($dia_array,0,4);
              $dia_nombre  = saber_dia($dia_array)." $dia_num de ".mes($mes_num)." - $year_num" ;
              $snaks       = $array_re['snaks'];
              $detalles    = $array_re['detalles'];
              ?>
              <p style="line-height:.85">Fecha: <?php echo $dia_nombre; ?>&nbsp;&nbsp;&nbsp;Sala: <?php echo $sala ?></p>
              <p style="line-height:.85">Hora inicio: <?php echo $hora_inicio.":".$min_inicio ?>&nbsp;&nbsp;&nbsp;Hora finalización: <?php echo $hora_fin.":".$min_fin ?></p>
              <p style="line-height:.85">
	              	Snaks:&nbsp;
					<?php
						if ($snaks == "si") {
							$cons_snaks = mysqli_query($q_sec,"SELECT snak FROM snaks where id_reserva = '$id_reserva' order by id_snak asc");
							$snaks_val = consulta_val("SELECT null FROM snaks where id_reserva = '$id_reserva'");
							$num_s = 1;
			         		while ($array_snaks = mysqli_fetch_array($cons_snaks)) {
			         			$snak = $array_snaks['snak'];
			         			echo "$snak";
			         			if ($snaks_val != $num_s) {
			         				echo ", ";
				         		}
				         		$num_s++;
			         		}


						}
						if ($snaks == "no"){
							echo "No";
						}
					?>
              </p>
              <p style="line-height:.85">Detalles: 
			  	<?php  
			  		if ($detalles !='') {
			  			echo "$detalles";
			  		}
			  		else{
			  			echo "No hay detalles";
			  		}
			  	?>
              </p>
              
              
              <?php
              if ($num_re != $cont_re) {
                echo "<hr>";
              }
              $num_re++;
            }
          }
          if($cont_re == 0){
            echo "Este usuario no ha realizado alguna reservación";
          }
        ?>
<br>