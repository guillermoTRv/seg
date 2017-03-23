<script>
	$(document).keydown(function(event){
	var control_menu = $(".activo_menu").length
	if (control_menu == 0) {

		var fr = parseInt($(".fr").attr("id"))
		var fr_siguiente = fr+1
		var fr_atras = fr-1
		var activo = parseInt(document.activeElement.id.substr(7));
		if (event.which == 39 && fr_siguiente < 5) {
			$("#"+fr).hide();
			$("#"+fr).removeClass("fr");
			$("#"+fr_siguiente).show()
			$("#"+fr_siguiente).addClass("fr")
			$("#"+fr_siguiente+" input:first").focus();
			if (fr_siguiente == 4) {
				$("#"+fr_siguiente+" input:eq(1)").focus();
			}
		}
		if (event.which == 37 && fr_atras > 0) {
			$("#"+fr).hide();
			$("#"+fr).removeClass("fr");
			$("#"+fr_atras).show()
			$("#"+fr_atras).addClass("fr")
			$("#"+fr_atras+" input:first").focus();

		}
		if (event.which == 13 || event.which == 40) {
			var cambio_activo = activo +1;
			$("#activo_"+cambio_activo).focus();
		}
		if (event.which == 38) {
			var cambio_activo = activo -1;
			$("#activo_"+cambio_activo).focus();
		}
		}
		
	});
	$(document).ready(function(){
		$(".boton_sig").click(function(){
			var fr = parseInt($(".fr").attr("id"))
			var fr_siguiente = fr+1
			$("#"+fr).hide();
			$("#"+fr).removeClass("fr");
			$("#"+fr_siguiente).show()
			$("#"+fr_siguiente).addClass("fr")
			$("#"+fr_siguiente+" input:first").focus();
			if (fr_siguiente == 4) {
				$("#"+fr_siguiente+" input:eq(1)").focus();
			}
		});
		$(".boton_atras").click(function(){
			var fr = parseInt($(".fr").attr("id"))
			var fr_atras = fr-1
			if (fr_atras > 0) {
				$("#"+fr).hide();
				$("#"+fr).removeClass("fr");
				$("#"+fr_atras).show()
				$("#"+fr_atras).addClass("fr")
				$("#"+fr_atras+" input:first").focus();
			}
		});
	});	
</script>

<script>
	  function archivo(evt) {
	      var files = evt.target.files; // FileList object
	       
	        //Obtenemos la imagen del campo "file". 
	      for (var i = 0, f; f = files[i]; i++) {         
	           //Solo admitimos imágenes.
	           if (!f.type.match('image.*')) {
	                continue;
	           }
	       
	           var reader = new FileReader();
	           
	           reader.onload = (function(theFile) {
	               return function(e) {
	               // Creamos la imagen.
	                      document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
	               };
	           })(f);
	 
	           reader.readAsDataURL(f);
	       }
		}
	             
	    document.getElementById('files').addEventListener('change', archivo, false);
	</script>	

<div class="row" style="margin-right:40px;margin-bottom:30px">
		<h2>Alta de personal para el cliente - <?php $id_cliente = $_SESSION['cliente']; echo $name_cliente = consulta_tx("SELECT name_cliente FROM clientes WHERE id_cliente = '$id_cliente'","name_cliente") ?></h2>
</div>

<div class="row">
	<div class="col-md-10">	
		<form class="form-horizontal">
		<div id="1" class="fr">		
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Nombre</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="activo_1" autofocus>
			    </div>
			  </div>

			  <div class="form-group">
			    <label class="col-sm-2 control-label">Campo Select</label>
			    <div class="col-sm-10">
			      <li style="list-style: none">
			      	<p style="background-color:white;border:1px solid black;padding:3px 6px 3px 6px;margin-bottom:15px;border-radius:7px"><a href="#">Seleccione un fenomeno</a></p>
			      	<ul style="list-style: none; display:none">
			      		<li>qwe</li>
			      		<li>123</li>
			      	</ul>
			      </li>
			      <input type="hidden" class="form-control" id="activo_1" autofocus>
			    </div>
			  </div>

			  <div class="form-group">
			    <label class="col-sm-2 control-label">Apellido Paterno</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="activo_2">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Apellido Materno</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="activo_3">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Fecha de nacimiento </label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="activo_4">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Curp </label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="activo_5">
			    </div>
			  </div>
			   <div class="form-group">
			    <label class="col-sm-2 control-label">Telefono 1</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="activo_6">
			    </div>
			  </div>
			   <div class="form-group">
			    <label class="col-sm-2 control-label">Telefono 2</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="activo_7">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="button" class="btn btn-default boton_sig">Siguiente (tecla <span class="glyphicon glyphicon-arrow-right"></span>)</button>
			    </div>
			  </div>
			
		</div>
		<div id="2" style="display:none">	
			
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Calle</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="activo_8">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Num ext</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="activo_9">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Num int</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="activo_10">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Colonia </label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="activo_11">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">C.P </label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="activo_12">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Entidad federativa </label>
			    <div class="col-sm-10">
			      <select name="" id="" id="activo_13" class="form-control"></select>
			      <input type="hidden" class="form-control">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Demarcación </label>
			    <div class="col-sm-10">
			      <select name="" id="" id="activo_14" class="form-control"></select>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="button" class="btn btn-default boton_atras">(tecla <span class="glyphicon glyphicon-arrow-left"></span>) Atras</button>
			      <button type="button" class="btn btn-default boton_sig">Siguiente (tecla <span class="glyphicon glyphicon-arrow-right"></span>)</button>
			    </div>
			  </div>
			
		</div>

		<div id="3" style="display:none">	
			
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Peso (Kg)</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="activo_15">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Estatura(formato 0.00 Medición-Metros) </label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="activo_16">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Fotografia del elemento(Solo formato jpg menor a 4mb)</label>
			    <div class="col-sm-10">
			      <input type="file" id="files" name="files"/>
			      <output id="list"></output>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="button" class="btn btn-default boton_atras">(tecla <span class="glyphicon glyphicon-arrow-left"></span>) Atras</button>
			      <button type="button" class="btn btn-default boton_sig">Siguiente (tecla <span class="glyphicon glyphicon-arrow-right"></span>)</button>
			    </div>
			  </div>
		</div>

		<div id="4" style="display:none">	
			
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Inmueble donde laborara</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" disabled>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Turno </label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="activo_20">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Horario</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="activo_21">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Fecha inicio contrato</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="activo_22">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Fecha finalizacion contrato</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="activo_23">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Costos</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="button" class="btn btn-default boton_atras">(tecla <span class="glyphicon glyphicon-arrow-left"></span>) Atras</button>
			      <button type="button" class="btn btn-default">Crtl + Enter - Enviar formulario</button>
			    </div>
			  </div>
			
		</div>
		</form>
	</div>
</div>




