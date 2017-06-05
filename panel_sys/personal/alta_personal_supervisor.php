<style>
	.element_inm{margin-top:7px;margin-bottom:7px;display:inline-block;}
	.element_can{margin-top:7px;margin-bottom:7px;margin-left:10px;display:inline-block;}
</style>
<div class="row" style="margin-right:40px">
		<h2>Alta de Supervisor para el cliente - <?php echo $name_cliente?></h2>
</div>
<script>
	formulario_control_secuencia("panel_sys/personal/process_alta_supervisor.php",6)
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
	$(function(){
	    $(document).on("click",".boton_agregar_inmueble",function(event){
			event.preventDefault()
			var sq = $(".inmueble_txt").val()
			if (sq != 'No agregar por el momento inmuebles') {
				var control_inm = 0
				$(".lista_inmuebles .element_inm").each(function(){
	        	    if ($(this).html() == sq) {
	        	    	control_inm = 1
	        	    }
	        	});
	        	if (control_inm == 0) {
	        		$.ajax({
						type:"GET",
						url:"panel_sys/personal/process_alta_supervisor.php?get_inm="+sq+"",
						dataType:"json",
						success:function(data){
							if (data.uno == 0) {
								$(".lista_inmuebles").append("<div><div class='element_inm'>"+sq+"</div><div class='element_can' id='"+data.two+"'><a class='blue' href=''>Cancelar</a></div></div>")
								var valores_inm = $(".inmuebles_txt").val();
								var new_val = $(".inmuebles_txt").val(valores_inm+data.two)
							}
							if (data.uno == 1) {
								$(".lista_inmuebles").append("<div style='margin-top:7px;'>El inmueble "+sq+" ya esta en supervision. Si desea continuar la supervision cambiara y estara a cargo del nuevo supervisor que esta creando </div><div class='element_inm'>"+sq+"</div><div class='element_can' id='"+data.two+"' data='span'><a class='blue' href=''>Cancelar</a></div>")
								var valores_inm = $(".inmuebles_txt").val();
								var new_val = $(".inmuebles_txt").val(valores_inm+data.two)
							}
						}
					});
					return false;	
	        	}
			}
			else{
				$(".lista_inmuebles").html(sq)
				var valores_inm = $(".inmuebles_txt").val("--");
			}
		});
		$(document).on("click",".element_can",function(event){
			event.preventDefault()
			var valor_inm_can = $(this).attr("id") 
			if ($(this).attr("data")=="span") {
				$(this).prev().prev().remove()
			}
			$(this).prev().remove()
			$(this).remove()
			var valores_inm = $(".inmuebles_txt").val();
			var nuevo_val = valores_inm.replace(valor_inm_can,"")
			alert(nuevo_val)
			$(".inmuebles_txt").val(nuevo_val)
		});
	});
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
				<h3>Seleccione los inmuebles que que estaran al cargo del supervisor</h3>
				<p style="margin-bottom:-10px">Puede seleccionar varios inmuebles - La lista de estos se mostrara en la parte de abajo</p>
				<hr style="border-color:#414141;width:91.3%;float:left;margin-bottom:25px ">
				<div class="group_inline">
					<div class="label_inline">
						<label>Inmueble a Supervisar</label>
					</div>
					<li class="li_select">
						<p class="p_select element_ol"><span class="icon-circle-down"></span> Seleccione una opción</p>
						<ul class="ul_menu">
							<li><p>No agregar por el momento inmuebles</p></li>
							<?php 
								$q_inmuebles = mysqli_query($q_sec,"SELECT name_inmueble FROM inmuebles WHERE cliente = '$id_cliente'");
								while ($q_array = mysqli_fetch_array($q_inmuebles)) {
									$name_inmueble = $q_array['name_inmueble'];
									echo "<li><p>$name_inmueble</p></li>";
								}
							?>
						</ul>
						<input type="hidden" class="inmueble_txt" value="">
						<input type="hidden" class="inmuebles_txt" name="inmuebles_txt" value="">
					</li>	
				</div>
				<div class="group_inline" style="margin-top:-10px">
					<div class="label_inline">
						
					</div>
					<div class="type_inline">
						<button type="button" class="btn btn-success boton_agregar_inmueble">Agregar Inmueble</button>
						<div class="lista_inmuebles" style="margin-left:200px">
							
						</div>
					</div>
					
				</div>
				<div class="group_inline">
					<div class="label_inline">
					</div>
					<div class="type_inline">
						<button type="button" class="btn btn-default boton_atras"><span class=" icon-arrow-left"></span> Atras</button>
					</div>
					<div class="type_inline">
						<button type="button" class="btn btn-default boton_sig element_ol">Siguiente <span class=" icon-arrow-right"></span></button>
					</div>
				</div>
			</div>
			<div id="5" style="display:none">
				<h3 style="margin-bottom:0px">Informacion laboral</h3>
				<hr style="border-color:#414141;width:91.3%;float:left;margin-bottom:25px ">
				<div class="group_inline">
					<div class="label_inline">
						<label>Tipo de jornada de trabajo</label>
					</div>
					<li class="li_select">
						<p class="p_select element_ol"><span class="icon-circle-down"></span> Seleccione una opción</p>
						<ul class="ul_menu">
							<li><p>8 Horas</p></li>
							<li><p>12 Horas</p></li>
							<li><p>24 Horas</p></li>
							<li><p>Disponibilidad de horario</p></li>
						</ul>
						<input type="hidden" name="jornada_txt" value="">
					</li>	
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Fecha de Inicio del Contrato</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="fecha_inicio_txt">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Fecha de Finalizacion <br> del Contrato</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="fecha_fin_txt">
					</div>
				</div>
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