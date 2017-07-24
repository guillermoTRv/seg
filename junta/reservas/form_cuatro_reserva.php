<div class="nota_reserva">
    
</div>
<a href="" class="regresar_cuatro_reserva memo" style="font-weight: bold;"><span class="icon-reply"></span> Regresar</a>
<h3 class="memo">4 - Detalles y Confirmacion</h3>
<form class="form-horizontal memo" method="POST" enctype="multipart/form-data" style="margin-top:27px">
    
    <div class="form-group">
        <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"><span class="icon-pencil2" style=""></span> Agregar detalles sobre la junta (opcional) </label>
        <div class="col-sm-6">
          <textarea class="form-control input_blue input_detalles" rows="3"></textarea>
        </div>
    </div>
                  
    <!--<div class="form-group" style="margin-top:18px">
        <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"><span class=" icon-key"></span> Password</label>
        <div class="col-sm-6">
          <input type="password" name="password_txt" class="form-control input_blue input_pass" id="pass">
        </div>
    </div>-->

     <div class="form-group" style="margin-top:37px;margin-bottom:20px">
        <div class="col-sm-offset-2 col-sm-6">
            <button type="button" class="btn btn-default btn-block btn_aceptar_ventana" style="border:2px solid rgb(8,141,198);font-size:1.2em;font-weight:bold;" data-toggle="modal" data-target="#myModal">Aceptar</button>
            <div class="mens" style="font-size:1.1em;font-weight: bold;margin-top:20px"></div>  
        </div>
    </div>

  
</form>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:80px;">
    <div class="modal-content" style="margin:20px;background-color: black;border: 1px solid rgb(8,141,198);-webkit-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);-moz-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color:white" aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Información de su Reserva</h3>
      </div>
      <div class="modal-body">
        <h4 class="sala_info">Sala:</h4>
        <h4 class="dia_info">Fecha:</h4>
        <h4 class="inicio_hora_info">Hora de inicio:</h4>
        <h4 class="fin_hora_info">Hora de finalización:</h4>
        <h4 class="detalles_info">Detalles:</h4>
        <h4 class="snaks_info">Snaks:</h4>
        <div><ul class="snaks_lista"></ul></div>
        <div class="form-group" style="margin-top:18px">
            <label class="col-sm-4 control-label" style="font-size:1.3em;font-weight: lighter;margin-right:-30px"><span class=" icon-key"></span> Password</label>
            <div class="col-sm-6">
              <input type="password" name="password_txt" class="form-control input_blue input_pass" id="pass">
            </div>
            
            <div class="visible-sm-block visible-md-block visible-lg-block">
                <br><br>                
            </div>   

        </div>
        <!--<div class="form-group visible-xs-block" style="margin-top:18px">
            <label class="col-sm-4 control-label" style="font-size:1.3em;font-weight: lighter"><span class=" icon-key"></span> Password</label>
            <div class="col-sm-6">
              <input type="password" name="password_txt" class="form-control input_blue input_pass" id="pass">
            </div>
            <div class="col-sm-6">
              <input type="password" name="password_txt" class="form-control input_blue pass" id="pass">
            </div>
        </div>-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-close" data-dismiss="modal" style="font-weight:bold;font-size: 1.1em"> Cerrar Ventana</button>
        <button type="button" class="btn btn-primary btn_registrar" style="font-weight:bold;font-size: 1.1em">Registrar Reserva</button>
      </div>
    </div>
  </div>
</div>