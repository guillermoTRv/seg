<a href="" class="regresar"><span class="icon-reply"></span> Regresar</a>
<h3>Alta Usuario - Uso Salas de Juntas</h3>
<hr class="linea">
                <form class="form-horizontal form_alta_usuario" method="POST" enctype="multipart/form-data" style="margin-top:27px">
                  <div class="form-group">
                    <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"><span class="glyphicon glyphicon-asterisk"></span>Nombre </label>
                    <div class="col-sm-6">
                      <input type="text" name="nombre_txt" class="form-control input_blue nombre_txt" id="usuario" autocomplete="off" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"><span class="glyphicon glyphicon-asterisk"></span>Apellidos </label>
                    <div class="col-sm-6">
                      <input type="text" name="apellidos_txt" class="form-control input_blue apellidos_txt" id="usuario" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"><span class="glyphicon glyphicon-user" style=""></span> Usuario</label>
                    <div class="col-sm-6">
                      <input type="text" name="usuario_txt" class="form-control input_blue usuario_txt" id="usuario" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"><span class="glyphicon glyphicon-envelope" style=""></span> Correo </label>
                    <div class="col-sm-6">
                      <input type="mail" name="correo_txt" class="form-control input_blue correo_txt" id="usuario" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group" style="margin-top:18px">
                    <label class="col-sm-2 control-label" style="font-size:1.3em;font-weight: lighter"><span class=" icon-key"></span> Password</label>
                    <div class="col-sm-6">
                      <input type="password" name="password_txt" class="form-control input_blue password_txt" id="pass">
                    </div>
                  </div>
                 
                  <div class="form-group" style="margin-top:37px;margin-bottom:20px">
                    <div class="col-sm-offset-2 col-sm-6">
                      <button type="button" class="btn btn-default btn-block btn_alta_usuario" style="border:2px solid rgb(8,141,198);font-size:1.2em;font-weight:bold;">Aceptar y Registrar</button>
                       <div class="mens" style="font-size:1.1em;font-weight: bold;margin-top:20px"></div>  
                    </div>
                  </div>

                </form>
<script>
  $(document).on("click",".btn_alta_usuario",function(){
    var nombre = $(".nombre_txt").val(); 
    var apellidos = $(".apellidos_txt").val(); 
    var usuario = $(".usuario_txt").val(); 
    var correo = $(".correo_txt").val();
    var pass = $(".password_txt").val();
    //alert(nombre+"-"+apellidos+""+usuario+""+correo+"")
    if (nombre !='' && apellidos !='' && usuario!='' && correo !='' && pass !=''){
          $(".btn_alta_usuario").prop("disabled",true)
          $.ajax({
          type:"POST",
          url:"administrador/process_alta_usuario.php",
          data:$(".form_alta_usuario").serialize(),
          success:function(data){
            if (data == 00) {
              $(".mens").html("El registro se llevo correctamente. Para ver la información del nuevo usuario dirigase al apartado Información, Modificación y Baja de Usuarios <br> <a class='otro_user' href=''>Registrar otro usuario </a>")
                return false
            }
            else{
              $(".btn_alta_usuario").prop("disabled",false)
            }
            alert(data)
            
          }
      });
    }
    else{
      alert("Llene todos los campos del formulario")
    }
  }) 
  $(document).on("click",".otro_user",function(event){
    event.preventDefault()
    $(".input_blue").val("")
    $(".mens").html("")
    $(".btn_alta_usuario").prop("disabled",false)
  })
</script>