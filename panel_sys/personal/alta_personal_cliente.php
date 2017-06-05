<div class="row" style="margin-right:40px">
		<h2>Alta de Usuario-Cliente para el cliente - <?php echo $name_cliente?></h2>
</div>
<script>
	formulario_control_secuencia("panel_sys/personal/process_alta_Uscliente.php",4)
	$(document).ready(function(){
		$(".boton_sig").click(function(){
			var fr = parseInt($(".fr").attr("id"))
			var fr_siguiente = fr+1
			$("#"+fr).hide();
			$(".element_sl").blur()
			$("#"+fr+" .element_ol").removeClass("element_sl");
			$("#"+fr).removeClass("fr");
			$("#"+fr_siguiente).show()
			$("#"+fr_siguiente).addClass("fr")
			$("#"+fr_siguiente+" .element_ol:eq(0)").addClass("element_sl")
			$("#"+fr_siguiente+" .element_ol:eq(0)").focus()
			return false
		})
		
	})
	$(document).ready(function(){
		$(".boton_atras").click(function(){
			var fr = parseInt($(".fr").attr("id"))
			var fr_atras = fr-1
			$("#"+fr).hide();
			$(".element_sl").blur()
			$("#"+fr+" .element_ol").removeClass("element_sl");
			$("#"+fr).removeClass("fr");
			$("#"+fr_atras).show()
			$("#"+fr_atras).addClass("fr")
			$("#"+fr_atras+" .element_ol:eq(0)").addClass("element_sl")
			$("#"+fr_atras+" .element_ol:eq(0)").focus()
			return false
		})
		
	})
</script>
<div class="row">
	<div class="col-md-10">
		<form method="post" enctype="multipart/form-data" class="control_inline">
			<div id="1" class="fr">
				<?php include("panel_sys/personal/combo_form_generales.php") ?>
			</div>
			<div id="2" style="display:none">
				<?php include("panel_sys/personal/combo_form_ubicacion.php") ?>
			</div>
			<div id="3" style="display:none">
				<?php include("panel_sys/personal/combo_form_aspecto.php") ?>
			</div>
			<div id="4" style="display:none">
				<h3 style="margin-bottom:0px">Datos Laborales</h3><hr style="border-color:#414141;width:91.3%;float:left;margin-bottom:25px ">

				<div class="group_inline">
					<div class="label_inline">
						<label>Comentarios</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="comentario_txt">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Codigo Autorización</label>
					</div>
					<div class="type_inline">
						<input type="password" class="input_inline element_ol" name="codigo_txt">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
					</div>
					<div class="type_inline">
						<button type="button" class="btn btn-default boton_atras"><span class="icon-arrow-left"></span> Atras</button>
					</div>
					<div class="type_inline">
						<button type="button" class="btn btn-default button_enviar element_ol">Aceptar y guardar informacion <span class="icon-floppy-disk"></span></button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>			

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