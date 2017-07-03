<?php 
	include("../funciones.php");
	$id_sala    = sanitizar_get("valor_sala");
  $primer_dia = sanitizar_get("primer_dia");
  
      $dia           = substr($primer_dia,8,2);
      $year          = date("Y");
      echo $month         = substr($primer_dia,5,2);
      if ($month < 10) {
        //$month = "0".$month;
      }
      $ultimoDiaMes  = date("d",(mktime(0,0,0,$month+1,1,$year)-1));  
      $fin_conteo    = $dia + 9;
      $i_next        = 0;
      for ($i=$dia+2; $i < $fin_conteo; $i++) {
        
        if ($i <= $ultimoDiaMes) {
          $fecha_calendario = $year."-".$month."-".$i;
          $fecha_calendario_data = $fecha_calendario;
          $dia_num_mostrar   = $i;
          $dia_letra_mostrar = saber_dia($fecha_calendario);
        }
        if ($i > $ultimoDiaMes) {
          $month_next = $month + 1;
          if ($month_next < 10) {
              $month_next = "0".$month_next;
          }
          $i_next++;
          $fecha_calendario_next = $year."-".$month_next."-0".$i_next;
          $fecha_calendario_data = $fecha_calendario_next;
          $dia_num_mostrar   = $i_next;
          $dia_letra_mostrar = saber_dia($fecha_calendario_next);
        }

        $consulta_disponibilidad = consulta_val("SELECT * FROM reservas_juntas WHERE id_sala ='$id_sala' and dia = '$fecha_calendario_data'");
        if ($consulta_disponibilidad == 0) {
        	$color_disponibilidad = "green";
        	$dato_disponibilidad  = "L";
        }
        else{
        	$color_disponibilidad = "red";
        	$dato_disponibilidad  = $consulta_disponibilidad."R";
        }	


        echo "<div class='caja_dia' data='$fecha_calendario_data'> $dia_letra_mostrar <br> $dia_num_mostrar <p style='color:$color_disponibilidad;'>$consulta_fecha<strong>$dato_disponibilidad</strong></p></div>";
      }
    
?>