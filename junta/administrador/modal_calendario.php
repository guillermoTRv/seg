<div class="modal fade" id="<?php echo $fecha_calendario ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:100px">
    <div class="modal-content" style="color: black">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color:black">Reservaciones <?php echo saber_dia($fecha_calendario)." $dia_poner de ".mes($mes_poner); ?></h4>
      </div>
      <div class="modal-body">
        <?php 
          if ($consulta_val == 0) {
            echo "No hay reservaciones para este día";
          }
          else{
            $consulta = mysqli_query($q_sec,"SELECT * FROM reservas_juntas WHERE id_sala ='$id_sala' and dia='$fecha_calendario' order by fecha_inicio asc");
              while($consulta_array = mysqli_fetch_array($consulta)){
                $usuario = consulta_array("SELECT nombre,apellidos FROM usuarios WHERE id_usuario = '".$consulta_array['id_usuario']."'");
                $nombre = $usuario['nombre'];
                $apellidos = $usuario['apellidos'];
                $hora_inicio = tiempo($consulta_array['hora_inicio']);
                $min_inicio  = tiempo($consulta_array['min_inicio']);
                $hora_finalizacion = tiempo($consulta_array['hora_finalizacion']);
                $min_fin = tiempo($consulta_array['min_fin']);
                ?>
                <p>Usuario: <?php echo $nombre." ".$apellidos ?></p>
                <p>Hora de inicio: <?php echo $hora_inicio.":".$min_inicio." hrs" ?>&nbsp;&nbsp;&nbsp;Hora de finalización:<?php echo $hora_finalizacion.":".$min_fin ?></p><hr>
                <?php
              }
          }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar ventana</button>
      </div>
    </div>
  </div>
</div>