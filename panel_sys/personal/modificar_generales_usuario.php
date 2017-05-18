<?php 
	$array_guardia = consulta_array("SELECT * FROM usuarios WHERE id_usuario='$val'","nombre");	
	$nombre = $array_guardia['nombre'];
	$apellido_p = $array_guardia['apellido_p'];
	$apellido_m = $array_guardia['apellido_m'];
	$identificador = $array_guardia['identificador'];
	$usuario = $array_guardia['usuario'];	

	$fecha_nacimiento = $array_guardia['fecha_nacimiento'];
	$curp = $array_guardia['curp'];
	$num_uno = $array_guardia['num_movil'];
	$num_dos = $array_guardia['num_dos'];
	$calle = $array_guardia['calle'];
	$num_ext = $array_guardia['num_exterior'];
	$num_int = $array_guardia['num_interior'];
	$colonia = $array_guardia['colonia'];
	$postal = $array_guardia['codigo_postal'];
	$entidad = $array_guardia['entidad'];
	$demarcacion = $array_guardia['demarcacion'];
	$peso = $array_guardia['peso'];
	$altura = $array_guardia['altura'];
	$inmueble = consulta_tx("SELECT name_inmueble FROM inmuebles WHERE id_inmueble = '".$array_guardia['inmueble_asign']."'","name_inmueble");
	$jornada = $array_guardia['jornada'];
	$fecha_inicio = $array_guardia['fecha_inicio_contrato'];
	$fecha_fin = $array_guardia['fecha_finalizacion'];
	$comentario = $array_guardia['comentario'];
	?>
<div class="row">
	<div class="col-md-10">
		<h3 >Modificar datos para el Guardia:
			<strong><?php echo $nombre." ".$apellido_p." ".$apellido_m?></strong><br> 
			Identificador: 
			<strong><?php echo $identificador ?></strong> &nbsp;&nbsp;&nbsp;
			Nombre Usuario: 
			<strong><?php echo $usuario ?></strong> 
		</h3>
		
		<form method="post" enctype="multipart/form-data" class="control_inline">
			<div id="1" class="fr">

				<h3 style="margin-bottom:0px">Datos Generales</h3><hr style="border-color:#686868;width:91.3%;float:left;margin-bottom:25px ">
				<div class="group_inline">
					<div class="label_inline">
						<label>Nombre</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="name_txt" value="<?php echo $nombre ?>">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Apellido paterno</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="apellido_uno_txt" value="<?php echo $apellido_p ?>">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Apellido materno</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="apellido_dos_txt" value="<?php echo $apellido_m ?>">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Fecha de nacimiento</label>
					</div>
					<div class="type_inline">
						<input type="date" class="input_inline element_ol" name="fecha_txt" value="<?php echo $fecha_nacimiento ?>">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Curp</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="curp_txt" value="<?php echo $curp ?>">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Telefono 1</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="tel_uno_txt" value="<?php echo $num_uno ?>">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Telefono 2</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="tel_dos_txt" value="<?php echo $num_dos ?>">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						</div>
					<div class="type_inline">
						<button type="button" class="btn btn-default boton_sig element_ol">Siguiente <span class="icon-arrow-right"></span></button>
					</div>
				</div>
			</div>
			<div id="2" style="display:none">
				<h3 style="margin-bottom:0px">Datos hubicacion</h3><hr style="border-color:#333;width:91.3%;float:left;margin-bottom:25px ">
				<div class="group_inline">
					<div class="label_inline">
						<label>Calle</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="calle_txt" value="<?php echo $calle ?>">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Número exterior</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="num_ext_txt" value="<?php echo $num_ext ?>">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Número interior</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="num_int_txt" value="<?php echo $num_int ?>">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Colonia</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="colonia_txt" value="<?php echo $calle ?>">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Codigo Postal</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="postal_txt" value="<?php echo $postal ?>">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Entidad Federativa</label>
					</div>
					<li class="li_select">
						<p class="p_select element_ol"><span class="icon-circle-down"></span> <?php echo $entidad ?></p>
						<ul class="ul_menu">
							<li><p>Estado 1</p></li>
							<li><p>Estado 2</p></li>
							<li><p>Estado 3</p></li>
							<li><p>Estado 4</p></li>
							<li><p>Estado 5</p></li>
						</ul>
						<input type="hidden" name="entidad_txt" value="<?php echo $entidad ?>">
					</li>	
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Municipio/Delegación</label>
					</div>
					<li class="li_select">
						<p class="p_select element_ol"><span class="icon-circle-down"></span> <?php echo $demarcacion ?></p>
						<ul class="ul_menu">
							<li><p>Municipio 1</p></li>
							<li><p>Municipio 2</p></li>
							<li><p>Municipio 3</p></li>
							<li><p>Municipio 4</p></li>
							<li><p>Municipio 5</p></li>
						</ul>
						<input type="hidden" name="demarcacion_txt" value="<?php echo $demarcacion ?>">
					</li>	
				</div>
				<div class="group_inline">
					<div class="label_inline">
					</div>
					<div class="type_inline">
						<button type="button" class="btn btn-default boton_atras"><span class="icon-arrow-left"></span> Atras</button>
					</div>
					<div class="type_inline">
						<button type="button" class="btn btn-default boton_sig element_ol">Siguiente <span class=" icon-arrow-right"></span></button>
					</div>
				</div>
			</div>
			<div id="3" style="display:none">
				<h3 style="margin-bottom:0px">Datos Fisicos</h3><hr style="border-color:#333;width:91.3%;float:left;margin-bottom:25px ">
				<div class="group_inline">
					<div class="label_inline">
						<label>Peso(kg)</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="peso_txt" value="<?php echo $peso ?>">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Estatura(formato 0.00 Medición-Metros)</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="altura_txt" value="<?php echo $altura ?>">
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
			<div id="4" style="display:none">
				<h3 style="margin-bottom:0px">Datos Laborales</h3><hr style="border-color:#414141;width:91.3%;float:left;margin-bottom:25px ">
				<div class="group_inline">
					<div class="label_inline">
						<label>Tipo de jornada de trabajo</label>
					</div>
					<li class="li_select">
						<p class="p_select element_ol"><span class="icon-circle-down"></span> <?php echo $jornada ?></p>
						<ul class="ul_menu">
							<li><p>8 Horas fjo</p></li>
							<li><p>12 Horas variable</p></li>
							<li><p>12 Horas fijo</p></li>
						</ul>
						<input type="hidden" name="jornada_txt" value="<?php echo $jornada ?>">
					</li>	
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Fecha de Inicio del Contrato</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="fecha_inicio_txt" value="<?php echo $fecha_inicio ?>">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Fecha de Finalizacion <br> del Contrato</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="fecha_fin_txt" value="<?php echo $fecha_fin ?>">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Comentarios</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="comentario_txt" value="<?php echo $comentario ?>">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Codigo Autorización</label>
					</div>
					<div class="type_inline">
						<input type="password" class="input_inline element_ol" name="codigo_txt">
						<input type="hidden" name="val_user" value="<?php echo $val ?>">
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
		<hr>
		<a href="?pr=opciones_modificar_usuario&val=<?php echo $val ?>" class="blue"><span class="icon-undo2"></span> Regresar a las opciones de modificación</a><br>
		<a href="?pr=info&val=<?php echo $val ?>" class="blue"><span class="icon-undo2"></span> Regresar al panel de información del elemento</a>
	</div>
</div>
<script>
	formulario_control_secuencia("panel_sys/personal/process_modificar_usuario.php",5)
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