<style>


</style>
<a href="" class="regresar_dos_reserva" style="font-weight: bold;"><span class="icon-reply"></span> Regresar</a>
<h3>2 - Selección de Fecha y Hora </h3>
<h4 style="font-weight:bold;" class="name_sala_form"></h4>



<div class="row">
  <div class="col-md-6"> 
    <div class="input-group">
      <span class="input-group-addon input-lg icon-calendar "></span>
      <input type="text" class="form-control input-lg input_fecha_ventana" placeholder="Seleccione Fecha" aria-describedby="basic-addon1" style="cursor: pointer;font-weight: bold;">
    </div>
  </div>
</div>
<p  class="horas_disponibilidad"></p>
<div class="horarios" style="font-size:1.1em">
  
</div>
<br>
<form class="form-horizontal form_alta_usuario" method="POST" enctype="multipart/form-data" style="margin-top:27px"> 
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
<button type="button" class="btn btn-primary btn-lg btn_emergente_fecha" data-toggle="modal" data-target="#myfecha" style="display: none">
  Launch demo modal
</button>
<button type="button" class="btn btn-primary btn-lg btn_emergente_fechaSe" data-toggle="modal" data-target="#myHorariosSe" style="display: none">
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
        <span>Seleccione primero la hora</span>
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
          <div class="col-md-12 mens_horario" style="text-align:center;"></div>
        </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-close" data-dismiss="modal" style="font-weight:bold;font-size: 1.1em"> Cerrar Ventana</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" style="font-weight:bold;font-size: 1.1em">Aceptar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="myHorariosSe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:100px;">
    <div class="modal-content" style="margin:20px;background-color: black;border: 1px solid rgb(8,141,198);-webkit-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);-moz-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color:white" aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Defina el horario de su reserva</h3>
      </div>
      <div class="modal-body">
        <span>Seleccione primero la hora</span>
        <div class="row" style="padding:13px">
          <div class="col-md-4" style="margin-right: -15px;margin-top:12px">
            <label style="font-size:1.3em;font-weight: lighter"><span class="icon-play2"></span> Comienza </label>
          </div>
          <div class="col-md-3" style="margin-top:12px">
            <select name="" id="" class="form-control input_blue select_inicio_hrsSe select_horario_ajaxSe">
                <option value="">Hrs</option>
            </select>
          </div>
          <div class="col-md-3" style="margin-top:12px">
            <select name="" id="" class="form-control input_blue select_inicio_minSe select_horario_ajaxSe">
                <option value="">Min</option>
              </select>
          </div>
        </div>
        <div class="row" style="padding:13px">
          <div class="col-md-4" style="margin-right: -15px;margin-top:12px">
            <label style="font-size:1.3em;font-weight: lighter"><span class="icon-stop"></span> Termina </label>
          </div>
          <div class="col-md-3" style="margin-top:12px">
            <select name="" id="" class="form-control input_blue select_fin_hrsSe select_horario_ajaxSe">
                <option value="">Hrs</option>
            </select>
          </div>
          <div class="col-md-3" style="margin-top:12px">
            <select name="" id="" class="form-control input_blue select_fin_minSe select_horario_ajaxSe">
                <option value="">Min</option>
              </select>
          </div>
        </div>
        <div class="inputs">  
        </div>
        <div class="row">
          <div class="col-md-12 mens_horarioSe" style="text-align: center;"></div>
        </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-close" data-dismiss="modal" style="font-weight:bold;font-size: 1.1em"> Cerrar Ventana</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" style="font-weight:bold;font-size: 1.1em">Aceptar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="myfecha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:100px;">
    <div class="modal-content" style="margin:20px;background-color: black;border: 1px solid rgb(8,141,198);-webkit-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);-moz-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color:white" aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel"><p class="name_sala_ventana" style="display:inline"></p> - Seleccione el día de su reserva</h3>
      </div>
      <div class="modal-body">
        <?php $month=date("n"); ?>
        <div class="calendario" data="<?php echo $month ?>">  
          <?php
            # definimos los valores iniciales para nuestro calendario
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

                <caption style="margin-top:20px"><h4><?php echo $meses[$month]." ".$year?><span class=" icon-circle-right siguiente_mes" style="cursor:pointer;margin-left:15px"></span></h4></caption>
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

                      // mostramos el dia
                      if($day==$diaActual){
                        if ($day < 10) {
                          $day_pon = "0".$day;
                        }
                        else{
                          $day_pon = $day;
                        }
                        $fecha_calendario_data = $year."-".$month."-".$day_pon;
                        echo "<td data='$fecha_calendario_data' style='background-color:#A4A4A4' class='caja_dia'>$day</td>";
                      }

                      else{

                        if ($day < $diaActual) {
                          echo "<td>$day</td>";                        
                        }
                        if ($day > $diaActual) {
                                                  if ($day < 10) {
                          $day_pon = "0".$day;
                          }
                          else{
                            $day_pon = $day;
                          }
                          $fecha_calendario_data = $year."-".$month."-".$day_pon;
                          echo "<td data='$fecha_calendario_data' style='background-color:#A4A4A4' class='caja_dia'>$day</td>";  
                        }

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
        </div>
      <div class="row">
      <p class="mensaje_fecha" style="text-align:center;margin-top: 15px">
        
      </p>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-close" data-dismiss="modal" style="font-weight:bold;font-size: 1.1em"> Cerrar Ventana</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" style="font-weight:bold;font-size: 1.1em">Aceptar</button>
      </div>
    </div>
  </div>
</div>
