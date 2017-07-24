<?php 
	include("../funciones.php");
	$id_sala = sanitizar_get("id_sala");
	$consulta_sala = consulta_array("SELECT*FROM salas_juntas WHERE id_sala = '$id_sala'");
	$name_sala = $consulta_sala["name_sala"];
	$hora_inicio_turno = $consulta_sala["hora_inicio"];
	$hora_fin_turno    = $consulta_sala["hora_fin"];

?>
<a href="" class="regresar_mod_sala"><span class="icon-reply"></span> Regresar</a>
<h3>Modificar datos Sala - <?php echo $name_sala ?></h3>
<hr class="linea">
<form class="form-horizontal form_mod_sala" method="POST" enctype="multipart/form-data" style="margin-top:27px">
    			  <input type="hidden" value="<?php echo $id_sala ?>" name="id_sala">
                  <div class="form-group">
                    <label class="col-sm-2 col-md-3 control-label" style="font-size:1.3em;font-weight: lighter"><span class="glyphicon glyphicon-asterisk"></span> Nombre de la Sala</label>
                    <div class="col-sm-6 col-md-8">
                      <input type="text" name="sala_txt" class="form-control input_blue sala_txt"  autocomplete="off" value="<?php echo $name_sala ?>">
                    </div>
                  </div>
                  <div class="form-group" style="margin-top:20px">
                    <label class="col-sm-2 col-md-3 control-label" style="font-size:1.3em;font-weight: lighter"><span class="glyphicon glyphicon-asterisk"></span> Horario de uso</label>
                    <div class="col-sm-3">
                      <p style="font-size:1.1em;margin-top:8px"><strong>de:</strong></p>
                      <select class="form-control input_blue hora_inicio_txt" name="hora_inicio_txt" id="hora_inicio_xc_slc">
                        <option class="ip" value="<?php echo $hora_inicio_turno ?>"><?php echo $hora_inicio_turno ?> Hrs</option>
                        <!--<option value="00">00</option>
                        <option value=""></option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>-->
                        <option value="05">05 Hrs</option>
                        <option value="06">06 Hrs</option>
                        <option value="07">07 Hrs</option>
                        <option value="08">08 Hrs</option>
                        <option value="09">09 Hrs</option>
                        <option value="10">10 Hrs</option>
                        <option value="11">11 Hrs</option>
                        <option value="12">12 Hrs</option>
                        <option value="13">13 Hrs</option>
                        <option value="14">14 Hrs</option>
                        <option value="15">15 Hrs</option>
                        <option value="16">16 Hrs</option>
                        <option value="17">17 Hrs</option>
                        <option value="18">18 Hrs</option>
                      </select>
                    </div>
                    <div class="col-sm-3">
                      <p style="font-size:1.1em;margin-top:8px;"><strong>a:</strong></p>
                      <select class="form-control input_blue hora_fin_txt" name="hora_fin_txt" id="hora_salida_xc_slc">
                        <option class="ip" value="<?php echo $hora_fin_turno ?>"><?php echo $hora_fin_turno ?> Hrs</option>
                        <!--<option value="00">00</option>
                        <option value=""></option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>-->
                        <option value="09">09 Hrs</option>
                        <option value="10">10 Hrs</option>
                        <option value="11">11 Hrs</option>
                        <option value="12">12 Hrs</option>
                        <option value="13">13 Hrs</option>
                        <option value="14">14 Hrs</option>
                        <option value="15">15 Hrs</option>
                        <option value="16">16 Hrs</option>
                        <option value="17">17 Hrs</option>
                        <option value="18">18 Hrs</option>
                        <option value="19">19 Hrs</option>
                        <option value="20">20 Hrs</option>
                        <option value="21">21 Hrs</option>
                        <option value="22">22 Hrs</option>
                        <option value="23">23 Hrs</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top:25px">
                    <label class="col-sm-2 col-md-3 control-label" style="font-size:1.3em;font-weight: lighter"><span class="glyphicon glyphicon-asterisk"></span> Equipamiento</label>
                    <div class="col-sm-6">               
                        <div class="input-group">
                          <input type="text" class="form-control equipo" placeholder="Equipo disponible" aria-describedby="basic-addon2" style="font-weight:bold">
                          <input type="hidden" class="ini_equipo" name="ini_equipo" value="">
                          <input type="hidden" class="fin_equipo" name="fin_equipo" value="">
                          <span class="input-group-addon agregar" id="basic-addon2" style="cursor:pointer;font-weight: bold;">Agregar</span>
                        </div>

                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-2 col-md-offset-3 lista_equipo">
                    	<?php 
                    		$consulta_equipo = mysqli_query($q_sec,"SELECT * FROM equipo_salas WHERE id_sala = '$id_sala'");
                    		$num_equipo      = consulta_val("SELECT * FROM equipo_salas WHERE id_sala = '$id_sala'");
                    		while ($array = mysqli_fetch_array($consulta_equipo)) {
                    			//$id_equipo   = $array['id_equipo'];
                    			$name_equipo = $array['name_equipo'];
                    			?>
									<div class='div_equipo' id="<?php echo $num_equipo ?>">
										<p style='font-weight:bold;font-size:1.2em'>
											<span class='icon-cancel-circle' style='color:#81DAF5;'></span> 
											<?php echo $name_equipo ?>
											<input type='hidden' name="<?php echo $num_equipo ?>" value="<?php echo $name_equipo ?>">
										</p>
									</div>
                    			<?php
                    			$num_equipo --;
                    		}	
                    	?>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top:17px;margin-bottom:20px">
                    <div class="col-sm-offset-2 col-sm-6 col-md-6 col-md-offset-3">
                      <button type="button" class="btn btn-default btn-block btn_mod_sala" style="border:2px solid rgb(8,141,198);font-size:1.2em;font-weight:bold;">Aceptar y Modificar</button>
                       <div class="mens" style="font-size:1.1em;font-weight: bold;margin-top:20px"></div>  
                    </div>
                  </div>

</form>
<script>
	$(document).on("click",".agregar",function(event){
    var equipo = $(".equipo").val()
    if (equipo != 0) {
      var div_equipo = $(".div_equipo").length;
      if (div_equipo == 0) {
            var id_equipo = 1;
      }
      if (div_equipo > 0) {
            var ultimo_div = $(".lista_equipo div:first").attr("id")
            var id_equipo = parseInt(ultimo_div)+1;
      }
      var input_agregar = "<input type='hidden' name='"+id_equipo+"' value='"+equipo+"'>"
      $(".lista_equipo").prepend("<div class='div_equipo' id='"+id_equipo+"'><p style='font-weight:bold;font-size:1.2em'><span class='icon-cancel-circle' style='color:#81DAF5;'></span> "+equipo+input_agregar+"</p></div>")
      $(".equipo").val("")
      $(".equipo").focus()
    }
  })
  $(document).on("click",".icon-cancel-circle",function(){
    $(this).parent().parent().remove()
  })
  $(document).on("click",".btn_mod_sala",function(){
    var name = $(".sala_txt").val()
    var inicio = $(".hora_inicio_txt").val()
    var fin = $(".hora_fin_txt").val()
    var num_equipo = $(".div_equipo").length
    if (name!='' && inicio!='' && fin!=''){
        if (num_equipo != 0) {   

        	var inicio_int = parseInt(inicio)
        	var fin_int    = parseInt(fin)
        	if (inicio_int < fin_int) {
	            var ini_equipo = $(".lista_equipo .div_equipo:last").attr("id")
	            var fin_equipo = $(".lista_equipo .div_equipo:first").attr("id")
	            $(".ini_equipo").val(ini_equipo)
	            $(".fin_equipo").val(fin_equipo)

	            $(".btn_mod_sala").prop("disabled",true)
	            $.ajax({
	                type:"POST",
	                url:"administrador/process_mod_sala.php",
	                data:$(".form_mod_sala").serialize(),
	                success:function(data){
	                  if (data == "si") {
	                    $(".mens").html("Los datos se modificarón exitosamente")
	                    $(".principal").load("administrador/info_salas.php")
	                    return false
	                  }
	                  else{
	                    $(".btn_mod_sala").prop("disabled",false)
	                  }
	                  alert(data)
	                  
	                }
	            });
	        }
	        else{
	        	alert("La hora de inicio no puede ser mayor a la hora de finalización")
	        }
        }
        else{
          alert("Indique al menos un elemento con el que esta equipada la sala")
        }
    }
    else{
      alert("Llene todos los campos del formulario")
    }
  });
</script>