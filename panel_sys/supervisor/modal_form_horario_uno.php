


<div class="modal fade" id="<?php echo $secuencia ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Definir jornada de trabajo para el dia <strong><?php saber_dia($fecha_calendario);echo "&nbsp;".$secuencia ?> de <?php mes_castellano($month) ?></strong></h4>
      </div>
      <div class="modal-body">
            <form smethod="POST" enctype="multipart/form-data" class="form-horizontal form_horario" style="margin-top:10px">
              <div class="form-group">
                <label class="col-sm-3 control-label" style="margin-top:5px">Tipo de jornada</label>
                <div class="col-sm-9">
                  <select name="jornada_txt" class="form-control select_horario">
                    <option value="">--</option>
                    <option value="8">8 Horas</option>
                    <option value="12">12 Horas</option>
                    <option value="24">24 Horas</option>
                  </select>
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="margin-top:5px">Hora de entrada</label>
                <div class="col-sm-9">
                  <select name="hora_entrada_txt" class="form-control select_hora_entr">
                      <option value="">--</option>
                      <option value="00">00 AM Horas</option>
                      <option value="01">01 AM Horas</option>
                      <option value="02">02 AM Horas</option>
                      <option value="03">03 AM Horas</option>
                      <option value="04">04 AM Horas</option>
                      <option value="05">05 AM Horas</option>
                      <option value="06">06 AM Horas</option>
                      <option value="07">07 AM Horas</option>
                      <option value="08">08 AM Horas</option>
                      <option value="09">09 AM Horas</option>
                      <option value="10">10 AM Horas</option>
                      <option value="11">11 AM Horas</option>
                      <option value="12">12 PM Horas</option>
                      <option value="13">13 PM Horas</option>
                      <option value="14">14 PM Horas</option>
                      <option value="15">15 PM Horas</option>
                      <option value="16">16 PM Horas</option>
                      <option value="17">17 PM Horas</option>
                      <option value="18">18 PM Horas</option>
                      <option value="19">19 PM Horas</option>
                      <option value="20">20 PM Horas</option>
                      <option value="21">21 PM Horas</option>
                      <option value="22">22 PM Horas</option>
                      <option value="23">23 PM Horas</option>
                  </select>
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="margin-top:5px">Hora de salida</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control hora_salida" disabled>
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="margin-top:5px">Codigo de autorización</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control pass" name="pass_xc">
                </div>
              </div>
              <div class="form-group">
              <br>
              <div class="col-sm-offset-3 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="otra_jornada" name="checkbox_ck" style="margin-top:0px"> <span><strong>Ingresar como otra jornada en el mismo día</strong></span>
                  </label>
                </div>
              </div>
            </div>
              <br>
              <input type="hidden" class="oculto_horario">
              <input type="hidden" class="hora_salida_txt" name="hora_salida_txt">
              <input type="hidden" class="dia_txt" name="dia_txt">
              <input type="hidden" class="fecha_entrada" name="fecha_entrada" value="<?php echo $fecha_calendario ?>" >
              <input type="hidden" class="usuario_txt" name="usuario_txt" value="<?php echo $val ?>">
              <br>
              <div class="m_v" style="margin:0px 30px 0px 30px">

              </div>      
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-aceptar">Aceptar</button>
         
      </div>
    </div>
  </div>
</div>