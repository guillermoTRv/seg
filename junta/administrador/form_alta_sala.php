<a href="" class="regresar"><span class="icon-reply"></span> Regresar</a>
<h3>Alta de una Sala de Juntas</h3>

<hr class="linea">

<form class="form-horizontal form_alta_sala" method="POST" enctype="multipart/form-data" style="margin-top:27px">
                  <div class="form-group">
                    <label class="col-sm-2 col-md-3 control-label" style="font-size:1.3em;font-weight: lighter"><span class="glyphicon glyphicon-asterisk"></span> Nombre de la Sala</label>
                    <div class="col-sm-6 col-md-8">
                      <input type="text" name="sala_txt" class="form-control input_blue sala_txt"  autocomplete="off" >
                    </div>
                  </div>
                  <div class="form-group" style="margin-top:20px">
                    <label class="col-sm-2 col-md-3 control-label" style="font-size:1.3em;font-weight: lighter"><span class="glyphicon glyphicon-asterisk"></span> Horario de uso</label>
                    <div class="col-sm-3">
                      <p style="font-size:1.1em;margin-top:8px"><strong>de:</strong></p>
                      <select class="form-control input_blue hora_inicio_txt" name="hora_inicio_txt" id="hora_inicio_xc_slc">
                        <option value=""></option>
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
                    <div class="col-sm-9 col-sm-offset-2 col-md-offset-3 lista_equipo"></div>
                  </div>
                  <div class="form-group" style="margin-top:17px;margin-bottom:20px">
                    <div class="col-sm-offset-2 col-sm-6 col-md-6 col-md-offset-3">
                      <button type="button" class="btn btn-default btn-block btn_alta_sala" style="border:2px solid rgb(8,141,198);font-size:1.2em;font-weight:bold;">Aceptar y Registrar</button>
                       <div class="mens" style="font-size:1.1em;font-weight: bold;margin-top:20px"></div>  
                    </div>
                  </div>

</form>
<script>
  $(document).on("click",".btn_alta_sala",function(){
    var name = $(".sala_txt").val()
    var inicio = $(".hora_inicio_txt").val()
    var fin = $(".hora_fin_txt").val()
    var num_equipo = $(".div_equipo").length
    if (name!='' && inicio!='' && fin!=''){
        if (num_equipo != 0) {   
            var ini_equipo = $(".lista_equipo .div_equipo:last").attr("id")
            var fin_equipo = $(".lista_equipo .div_equipo:first").attr("id")
            $(".ini_equipo").val(ini_equipo)
            $(".fin_equipo").val(fin_equipo)

            $(".btn_alta_sala").prop("disabled",true)
            $.ajax({
                type:"POST",
                url:"administrador/process_alta_sala.php",
                data:$(".form_alta_sala").serialize(),
                success:function(data){
                  if (data == 00) {
                    $(".mens").html("El registro se llevo correctamente. Para ver la información de la nueva sala dirigase al apartado Información, Modificación y Baja de Salas <br> <a class='otra_sala' href=''>Registrar otra Sala </a>")
                    return false
                  }
                  else{
                    $(".btn_alta_sala").prop("disabled",false)
                  }
                  alert(data)
                  
                }
            });
        }
        else{
          alert("Indique al menos un elemento con el que esta equipada la sala")
        }
    }
    else{
      alert("Llene todos los campos del formulario")
    }
  });
  $(document).on("change","#hora_inicio_slc",function(){
    $("#hora_salida_slc").html("")
    var hora_inicio = parseInt($(this).val());
    var resta       = parseInt(24 - hora_inicio)
    for(i = hora_inicio + 1; i <= 24; i++){
        if (i < 10) {
          var i_hora = "0" + i
        }
        else{
          var i_hora = i
        }
        $("#hora_salida_slc").append("<option value='"+i+"'>"+i_hora+" hrs</option>") 
    }
  })
  $(document).on("change","#hora_inicio_xc_slc",function(){
    $("#hora_salida_xc_slc").html("")
    var hora_inicio = parseInt($(this).val());
    var resta       = parseInt(24 - hora_inicio)
    for(i = hora_inicio + 1; i <= 24; i++){
        if (i < 10) {
          var i_hora = "0" + i
        }
        else{
          var i_hora = i
        }
        $("#hora_salida_xc_slc").append("<option value='"+i+"'>"+i_hora+" hrs</option>") 
    }
  })
  $(document).on("click",".otra_sala",function(event){
    event.preventDefault()
    $(".input_blue").val("")
    $(".mens").html("")
    $(".lista_equipo").html("")
    $(".btn_alta_sala").prop("disabled",false)
  })
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
</script>