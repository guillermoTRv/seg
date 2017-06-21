<a href="" class="regresar"><span class="icon-reply"></span> Regresar</a>
<h3>Reservacion Sala de Juntas</h3>
<hr class="linea">
<h4 style="font-weight: bold;">
  1 - Seleccione la Sala que desea reservar. Tenga en cuenta la disponibilidad de horario de cada sala   
</h4>
<?php  
  include("funciones.php");
  $consulta_sala = mysqli_query($q_sec,"SELECT * FROM salas_juntas order by id_sala asc");
  while ($array  = mysqli_fetch_array($consulta_sala)) {
      $name_sala = $array['name_sala'];
      $id_sala   = $array['id_sala'];
      ?>
        <p class="boton_sala" id='<?php echo $id_sala ?>' data="<?php echo $name_sala ?>"><?php echo $name_sala ?></p>
      <?php
  }
?>

<!--<p class="boton_sala">Sala 3: Actualmente en Uso(9-11) - Uso(11-1) - Libre(1-4) - Uso(4-5)</p>
<p class="boton_sala">Sala 3: Actualmente en Uso(9-11) - Uso(11-1) - Libre(1-4) - Uso(4-5)</p>
<br>-->
                <!--
                <form class="form-horizontal form_alta_usuario" method="POST" enctype="multipart/form-data" style="margin-top:27px">
                  <div class="form-group">
                    <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"><span class="glyphicon glyphicon-asterisk"></span>Comienza </label>
                    <div class="col-sm-6">
                      <input type="text" name="nombre_txt" class="form-control input_blue" id="usuario" autocomplete="off" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"><span class="glyphicon glyphicon-asterisk"></span>Termina </label>
                    <div class="col-sm-6">
                      <input type="text" name="apellidos_txt" class="form-control input_blue" id="usuario" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"><span class="glyphicon glyphicon-user" style=""></span>¿ Tiempo para snaks ?</label>
                    <div class="col-sm-6">
                      <input type="text" name="usuario_txt" class="form-control input_blue" id="usuario" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"><span class="glyphicon glyphicon-envelope" style=""></span> Agregar detalle sobre la juta </label>
                    <div class="col-sm-6">
                      <input type="mail" name="correo_txt" class="form-control input_blue" id="usuario" autocomplete="off">
                    </div>
                  </div>
                  
                  <div class="form-group" style="margin-top:18px">
                    <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"><span class=" icon-key"></span> Password</label>
                    <div class="col-sm-6">
                      <input type="password" name="password_txt" class="form-control input_blue" id="pass">
                    </div>
                  </div>
                 
                  <div class="form-group" style="margin-top:37px;margin-bottom:20px">
                    <div class="col-sm-offset-2 col-sm-6">
                      <button type="button" class="btn btn-default btn-block btn_alta_usuario" style="border:2px solid rgb(8,141,198);font-size:1.2em;font-weight:bold;">Aceptar y Registrar</button>
                       <div class="mens" style="font-size:1.1em;font-weight: bold;margin-top:20px"></div>  
                    </div>
                  </div>

                </form>-->
