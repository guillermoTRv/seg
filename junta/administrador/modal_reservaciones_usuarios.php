<div class="modal fade" id="<?php echo $id_usuario ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:100px">
    <div class="modal-content" style="color:black">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Reservaciones - <?php echo $nombre." ".$apellidos ?></h4>
      </div>
      <div class="modal-body">
        <?php 
          $consulta_re = mysqli_query($q_sec,"SELECT * FROM reservas_juntas WHERE id_usuario='$id_usuario' order by dia desc");
          $cont_re = consulta_val("SELECT * FROM reservas_juntas WHERE id_usuario='$id_usuario'");
          if($cont_re > 0){  
            $num_re = 1;
            while ($array_re = mysqli_fetch_array($consulta_re)) {
              $id_sala     = $array_re['id_sala'];
              $hora_inicio = tiempo($array_re['hora_inicio']);
              $min_inicio  = tiempo($array_re['min_inicio']);
              $hora_fin    = tiempo($array_re['hora_finalizacion']);
              $min_fin     = tiempo($array_re['min_fin']);
              $dia_array   = $array_re['dia'];
              $dia_num     = substr($dia_array,8,2);
              $mes_num     = substr($dia_array,5,2);
              $year_num    = substr($dia_array,0,4);
              $dia_nombre  = saber_dia($dia_array)." $dia_num de ".mes($mes_num)." - $year_num" ;
              $sala = consulta_tx("SELECT name_sala FROM salas_juntas WHERE id_sala = '$id_sala'","name_sala");
              ?>
              <p style="line-height:.85">Fecha: <?php echo $dia_nombre; ?>&nbsp;&nbsp;&nbsp;Sala: <?php echo $sala ?></p>
              <p style="line-height:.85">Hora inicio: <?php echo $hora_inicio.":".$min_inicio ?>&nbsp;&nbsp;&nbsp;Hora finalización: <?php echo $hora_fin.":".$min_fin ?></p>
              
              
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar Ventana</button>
      </div>
    </div>
  </div>
</div>