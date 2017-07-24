<script>
	formulario_control("panel_sys/inmuebles/process_altaInm.php")
</script>
<div class="row">
	<div class="col-md-10">
		<h3>Alta de inmueble para el cliente <?php echo $name_cliente ?></h3>
	</div>
	<div class="col-md-10" style="margin-top:10px">
		<!--<form method="post" enctype="multipart/form-data" class="control_inline">
			<div class="group_inline">
				<div class="label_inline">
					<label>Nombre del inmueble</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="name_txt" maxlength="124">
				</div>
			</div>
			<div class="group_inline">
				<div class="label_inline">
					<label>Calle</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="calle_txt" maxlength="124">
				</div>
			</div>
			<div class="group_inline">
				<div class="label_inline">
					<label>Número exterior</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="num_ext_txt" pattern="[0-9]{1,3}" maxlength="3">
				</div>
			</div>
			<div class="group_inline">
				<div class="label_inline">
					<label>Número interior</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="num_int_txt" pattern="[0-9]{1,3}" maxlength="3" title="Solo se admiten caracteres númericos">
				</div>
			</div>
			<div class="group_inline">
				<div class="label_inline">
					<label>Colonia</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="colonia_txt" maxlength="124">
				</div>
			</div>
			<div class="group_inline">
				<div class="label_inline">
					<label>Codigo Postal</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="postal_txt" pattern="[0-9]{5}" maxlength="5">
				</div>
			</div>
			<div class="group_inline">
					<div class="label_inline">
						<label>Entidad Federativa</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="entidad_txt" maxlength="124">
					</div>
			</div>
			<div class="group_inline">
					<div class="label_inline">
						<label>Municipio/Delegación</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="demarcacion_txt" maxlength="124">
					</div>
			</div>
			<div class="group_inline">
				<div class="label_inline">
					<label>Fecha Inicio contrato</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="postal_txt">
				</div>
			</div>
			<div class="group_inline">
				<div class="label_inline">
					<label>Fecha Finalización contrato</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="postal_txt">
				</div>
			</div>
			<div class="group_inline">
				<div class="label_inline">
					<label>Referencias</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="referencias_txt" maxlength=124>
				</div>
			</div>
			<div class="group_inline">
				<div class="label_inline">
					<label>Codigo Autorización</label>
				</div>
				<div class="type_inline">
					<input type="password" class="input_inline element_ol" name="autorizacion_txt" maxlength="24">
				</div>
			</div>
			<div class="group_inline">
				<div class="label_inline">
					</div>
				<div class="type_inline">
					<button type="button" class="button_enviar element_ol btn btn-default">Enviar información</button>
				</div>
			</div>
		</form>-->
		<form class="form_alta_inmueble" method="POST" enctype="multipart/form-data">
		<label>Nombre del Inmueble</label>
		<input type="text" class="form-control input-sm" name="name_txt"><br>
		<div class="row">
			<div class="col-md-6">
				<label>Calle</label>
				<input type="text" class="form-control input-sm" name="calle_txt">
			</div>
			<div class="col-md-3">
				<label>No.Ext</label>
				<input type="text" class="form-control input-sm" name="ext_txt" pattern="[0-9]{1,3}" maxlength="3">
			</div>
			<div class="col-md-3">
				<label>No.Int</label>
				<input type="text" class="form-control input-sm" name="int_txt" pattern="[0-9]{1,3}" maxlength="3">
			</div>	
		</div><br>
		<div class="row">
			<div class="col-md-6">
				<label>Colonia</label>
				<input type="text" class="form-control input-sm" name="colonia_txt">
			</div>
			<div class="col-md-3">
				<label>Codigo Postal</label>
				<input type="text" class="form-control input-sm" name="postal_txt" pattern="[0-9]{1,3}" maxlength="5">
			</div>
		</div><br>
		<div class="row">
			<div class="col-md-6">
				<label>Entidad Federativa</label>
				<select class="form-control entidad input-sm" name="entidad_txt">
					<?php include("estados.php") ?>
				</select>
			</div>
			<div class="col-md-6">
				<label>Municipio/Delegacion</label>
				<select class="form-control municipios input-sm" name="demarcacion_txt"></select>
			</div>
		</div>	
		<p style="margin-top:15px;">*Contrato</p>
		<div class="row">
			<div class="col-md-6">
				<label>Fecha de inicio de contrato</label>
				<input type="date" class="form-control input-sm" name="inicio_txt">
			</div>
			<div class="col-md-6">
				<label>Fecha de finalización de contrato</label>
				<input type="date" class="form-control input-sm" name="fin_txt">
			</div>
		</div>
		<p style="margin-top:15px">*Horarios</p>	
		<div class="row">
			<div class="col-md-6">
				<label >Elija los Horarios de Trabajo para este inmueble</label><br>
				<label class="checkbox-inline">
				  	<input type="checkbox" name="6" value="6"> 6 hrs
				</label>
				<label class="checkbox-inline">
				  	<input type="checkbox" name="8" value="8"> 8 hrs
				</label>
				<label class="checkbox-inline">
				  	<input type="checkbox" name="12" value="12"> 12 hrs
				</label>
				<label class="checkbox-inline">
				  	<input type="checkbox" name="24" value="24"> 24 hrs
				</label>
			</div>
			<div class="col-md-6">
				<label>Comentarios</label>
				<input type="text" class="form-control input-sm" name="referencias_txt">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6">
				<input type="password" placeholder="codigo de confirmación" name="codigo_txt" style="display: inline-block;">
				<input class="btn btn-default btn_cliente" type="button" value="Aceptar y Registrar" style="display: inline-block;">
				<input class="btn btn-default btn_limpiar" type="button" value="Limpiar formulario" style="display:inline-block;">	
			</div>
			<div class="col-md-6 mens">
				
			</div>
		</div>
	</form>
	</div>
</div>
<script>
	$(document).on("click",".btn_cliente",function(){
		$.ajax({
			type:"POST",
			url:"panel_sys/inmuebles/process_altaInm.php",
			data:$(".form_alta_inmueble").serialize(),
			success:function(data){
				$(".mens").html(data)
			}	
		})
	})
	$(document).on("click",".btn_limpiar",function(){
		$(".form-control").val("")
	})
</script>