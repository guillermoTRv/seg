<style>
  .caja_hora{margin-right:-4px;display:inline-block;height:100px;width:10%;background-color:white;border:1px solid black;}
  .p_hora{color:black}
  .p_hora_mens{color:white;font-weight: bold;margin-left:5px}

  .caja_nueva{display:inline-block;height:100px;width:12.3%;background:white;margin-right:1px;}
  .caja_nueva_right{display:inline-block;height:100px;width:12.3%;background:white;}
  .flecha    {display:inline-block;height:30px;width:6.6%;border-right:1px solid black;text-align:center;}
  .caja_dia
    {
        display:inline-block;width:12.8%;height:100px;background-color:white;border:1px solid black;color:rgba(1,1,1,.8);font-weight: bold;padding:4px
    }
    @media screen and (max-width:800px){
        .caja_dia
        {
            display:inline-block;width:12%;height:100px;background-color:white;border:1px solid black;color:rgba(1,1,1,.8);font-weight: bold;padding:4px
        }
    }



</style>
<a href="" class="regresar_dos_reserva" style="font-weight: bold;"><span class="icon-reply"></span> Regresar</a>
<h3>2 - Selección de Fecha y Hora </h3>
<h3 style="font-weight:bold;" class="name_sala_form"></h3>



<div style="width: 100%">
  <div style="display:inline-block;color: black;">
    <span class="icon-arrow-left" style="background-color:white;font-size: 1.1em;border-radius:50%;padding:5px"></span>
  </div>
  <div class="dias_semana" style="display:inline">
   
  </div>
  <!--<div class='caja_dia'>L <br> 13 <p style="color:green;"><strong>3R</strong></p></div>
  <div class="caja_dia">M <br> 14 <p style="color:blue;"><strong>L</strong></p></div>-->
  <div style="display:inline-block;color: black;">
    <span class="icon-arrow-right" style="background-color:white;font-size: 1.1em;border-radius:50%;padding:5px"></span>
  </div>
</div>



<p  class="horas_disponibilidad"></p>
<div class="horarios">
  
</div>
<form class="form-horizontal form_alta_usuario" method="POST" enctype="multipart/form-data" style="margin-top:27px">
    <!--<div class="form-group">
        <label class="col-lg-2 col-md-3 control-label" style="font-size:1.3em;font-weight: lighter"><span class="icon-play2"></span> Comienza </label>
        <div class="col-sm-6">
          <select name="" id="" class="form-control input_blue select_inicio_hora">
            <option value="">Seleccione un día</option>
          </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 col-md-3 control-label" style="font-size:1.3em;font-weight: lighter"><span class="icon-stop"></span> Termina </label>
        <div class="col-sm-6">
            <select name="" id="" class="form-control input_blue select_fin_hora">
            <option value=""></option>
          </select>
        </div>
    </div>-->
    
    <div class="form-group">
        <div class="col-md-6">
            <button type="button" class="btn btn-default btn-block btn_sig_alta_sala" style="border:2px solid rgb(8,141,198);font-size:1.2em;font-weight:bold;">Siguiente - Especificaciones</button>
            <div class="mens" style="font-size:1.1em;font-weight: bold;margin-top:20px"></div>  
        </div>
    </div>
</form>

<button type="button" class="btn btn-primary btn-lg btn_emergente" data-toggle="modal" data-target="#myHorarios" style="display: none">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myHorarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:100px;">
    <div class="modal-content" style="margin:20px;background-color: black;border: 1px solid rgb(8,141,198);-webkit-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);-moz-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color:white" aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Defina el horario de su reserva</h3>
      </div>
      <div class="modal-body">
        <div class="row" style="padding:13px">
          <div class="col-md-4" style="margin-right: -15px;margin-top:12px">
            <label style="font-size:1.3em;font-weight: lighter"><span class="icon-play2"></span> Comienza </label>
          </div>
          <div class="col-md-3" style="margin-top:12px">
            <select name="" id="" class="form-control input_blue select_inicio_hrs select_horario_ajax">
                <option value="">Hrs</option>
            </select>
          </div>
          <div class="col-md-3" style="margin-top:12px">
            <select name="" id="" class="form-control input_blue select_inicio_min select_horario_ajax">
                <option value="">Min</option>
              </select>
          </div>
        </div>
        <div class="row" style="padding:13px">
          <div class="col-md-4" style="margin-right: -15px;margin-top:12px">
            <label style="font-size:1.3em;font-weight: lighter"><span class="icon-stop"></span> Termina </label>
          </div>
          <div class="col-md-3" style="margin-top:12px">
            <select name="" id="" class="form-control input_blue select_fin_hrs select_horario_ajax">
                <option value="">Hrs</option>
            </select>
          </div>
          <div class="col-md-3" style="margin-top:12px">
            <select name="" id="" class="form-control input_blue select_fin_min select_horario_ajax">
                <option value="">Min</option>
              </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mens_horario"></div>
        </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-close" data-dismiss="modal" style="font-weight:bold;font-size: 1.1em"> Cerrar Ventana</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" style="font-weight:bold;font-size: 1.1em">Aceptar</button>
      </div>
    </div>
  </div>
</div>
