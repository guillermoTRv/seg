<?php 
	include("../funciones.php");
	$id_sala = sanitizar("sala_txt");
  
	function saber_dia($nombredia) {
	    $dias = array('', 'L','M','M','J','V','S','D');
	    $fecha_l = $dias[date('N', strtotime($nombredia))];
	    return $fecha_l;
	  }


      $dia           = date("d");
      $year          = date("Y");
      $month         = date("n");
      if ($month < 10) {
        $month = "0".$month;
      }
      $ultimoDiaMes  = date("d",(mktime(0,0,0,$month+1,1,$year)-1));  
      $fin_conteo    = $dia + 7;
      $i_next        = 0;
      for ($i=$dia; $i < $fin_conteo; $i++) {
        
        if ($i <= $ultimoDiaMes) {
          $fecha_calendario = $year."-".$month."-".$i;
          $fecha_calendario_data = $fecha_calendario;
          $dia_num_mostrar   = $i;
          $dia_letra_mostrar = saber_dia($fecha_calendario);
        }
        if ($i > $ultimoDiaMes) {
          $month_next = $month + 1;
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


        echo "<div class='caja_dia' data='$fecha_calendario'> $dia_letra_mostrar <br> $dia_num_mostrar <p style='color:$color_disponibilidad;'>$consulta_fecha<strong>$dato_disponibilidad</strong></p></div>";
      }
    
?>
