<a href="" class="regresar_general" style="font-weight: bold;"><span class="icon-reply"></span> Regresar</a>
<a href="" class="regresar_lista" style="font-weight: bold;display:none"><span class="icon-reply"></span> Regresar</a>
<h3><span class="icon-clock"></span> Información Horarios Salas de Juntas</h3>
<hr class="linea">
<div class="div_salas">
<?php  
  include("../funciones.php");
  $consulta_sala = mysqli_query($q_sec,"SELECT * FROM salas_juntas order by id_sala asc");
  while ($array  = mysqli_fetch_array($consulta_sala)) {
      $name_sala = $array['name_sala'];
      $id_sala   = $array['id_sala'];
      ?>
        <div class="boton_info" id='<?php echo $id_sala ?>' data="<?php echo $name_sala ?>"><?php echo $name_sala ?>
        </div>
      <?php
  }
?>
</div>
<div class="horarios_info" style="display: none">
	<div class="row">
	  <div class="col-md-6"> 
	  	<h3 style="margin-top:0px" class="name_sala_h3"></h3>
	    <div class="input-group">
	      <span class="input-group-addon input-lg icon-calendar "></span>
	      <input type="text" class="form-control input-lg input_fecha_ventana" placeholder="Seleccione Fecha" aria-describedby="basic-addon1" style="cursor: pointer;font-weight: bold;">
	    </div>
	  </div>
	</div>	
	<div class="horarios" style="font-size:1.1em">
  
    </div>
    <form class="form_oculto" style="display: none">
    	<input type="hidden" name="sala_txt" class="sala_txt inputs" value="" style="color:black">
    	<input type="text" value="si" name="valor_info">
    </form>
	<button type="button" class="btn btn-primary btn-lg btn_emergente_fecha" data-toggle="modal" data-target="#myfecha" style="display: none">
	  Launch demo modal
	</button>

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

</div>
<br>
<script>
	$(document).on("click",".boton_info",function(){
		var name_sala = $(this).html()
		var id_sala   = $(this).attr("id")
		$(".div_salas").hide()
		$(".regresar_general").hide()
		$(".regresar_lista").show()
		$(".horarios_info").show()
		$(".name_sala_h3").html(name_sala)
		$(".sala_txt").val(id_sala)
	})
	$(document).on("click",".regresar_lista",function(){
		$(".horarios_info").hide()
		$(".regresar_lista").hide()
		$(".div_salas").show()
		$(".regresar_general").show()
		$(".inputs").val("")
		$(".horarios").html("")
		$(".input_fecha_ventana").val("")
		return false
	})
	$(document).on("click",".caja_dia",function(){
		var input_dia = $(this).attr("data")
	})
</script>