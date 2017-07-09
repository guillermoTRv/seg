<?php 
	include("../funciones.php");
	$mes_get = sanitizar_get("mes");
	$plan = sanitizar_get("plan");
    # definimos los valores iniciales para nuestro calendario

	if ($plan == "siguiente") {
		$month=$mes_get+1;
	    $resta_mes = $month -date("n");
		//echo "siguiente $resta_mes";
	}
    if ($plan == "atras") {
    	$month=$mes_get-1;
    	$resta_mes = $month -date("n");
    	//echo "atras $resta_mes";
    }
    if ($resta_mes  > 2 or $resta_mes < 0) {
    	echo 00;
    }
    else{

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

                
				<?php 
				if ($plan == "atras" && $resta_mes == 0) {
					?>
					                <caption style="margin-top:20px"><h4><?php echo $meses[$month]." ".$year?><span class=" icon-circle-right siguiente_mes" style="cursor:pointer;margin-left:15px"></span></h4></caption>
					<?php
				}
				else{
					?>
						<caption style="margin-top:20px"><h4><span class=" icon-circle-left atras_mes" style="cursor:pointer;margin-right:15px;cursor: pointer;"></span><?php echo $meses[$month]." ".$year?><span class=" icon-circle-right siguiente_mes" style="cursor:pointer;margin-left:15px"></span></h4></caption>
					<?php
				}
				?>
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


                      if ($plan == "atras" && $resta_mes == 0) {
                      	$memo = $day;
                        if ($day < 10) {
                          $memo = "0".$day;
                        }
                        if($day==$diaActual){
		                        $fecha_calendario_data = $year."-".$month."-".$memo;
		                        echo "<td data='$fecha_calendario_data' style='background-color:#A4A4A4' class='caja_dia'>$day</td>";
		                    }
		                    else{
		                        if ($day < $diaActual) {
		                          echo "<td>$day</td>";                        
		                        }
		                        if ($day > $diaActual) {
		                          $fecha_calendario_data = $year."-".$month."-".$memo;
		                          echo "<td data='$fecha_calendario_data' style='background-color:#A4A4A4' class='caja_dia'>$day</td>";  
		                        }
		                    }
                      }
                      else{
                      	$memo = $day;
	                      if ($day < 10) {
	                      	$memo = "0".$day;
	                      }
	                      $fecha_calendario_data = $year."-".$month."-".$memo;
	                      echo "<td data='$fecha_calendario_data' style='background-color:#A4A4A4' class='caja_dia'>$day</td>";
	  						
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
	<?php }#queda pendiente los dias menores a 10 en los calendarios con el mes igual al actual y talves algo mas ah y que el dia azul siempre este seleccionado ?>

