<script>
	formulario_control("panel_sys/inmuebles/process_altaInm.php")
</script>
<div class="row">
	<div class="col-md-10">
		<h3>Alta de inmueble para el cliente <?php echo $name_cliente ?></h3>
	</div>
	<div class="col-md-10">
		<br>
		<form method="post" enctype="multipart/form-data" class="control_inline">
			<div class="group_inline">
				<div class="label_inline">
					<label>Nombre del inmueble</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="name_txt">
				</div>
			</div>
			<div class="group_inline">
				<div class="label_inline">
					<label>Calle</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="calle_txt">
				</div>
			</div>
			<div class="group_inline">
				<div class="label_inline">
					<label>Número interior</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="num_int_txt">
				</div>
			</div>
			<div class="group_inline">
				<div class="label_inline">
					<label>Número exterior</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="num_ext_txt">
				</div>
			</div>
			<div class="group_inline">
				<div class="label_inline">
					<label>Colonia</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="colonia_txt">
				</div>
			</div>
			<div class="group_inline">
				<div class="label_inline">
					<label>Codigo Postal</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="postal_txt">
				</div>
			</div>
			<div class="group_inline">
					<div class="label_inline">
						<label>Entidad Federativa</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="entidad_txt">
					</div>
				</div>
				<div class="group_inline">
					<div class="label_inline">
						<label>Municipio/Delegación</label>
					</div>
					<div class="type_inline">
						<input type="text" class="input_inline element_ol" name="demarcacion_txt">
					</div>
				</div>
			<div class="group_inline">
				<div class="label_inline">
					<label>Referencias</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="referencias_txt">
				</div>
			</div>
			<div class="group_inline">
				<div class="label_inline">
					<label>Codigo Autorización</label>
				</div>
				<div class="type_inline">
					<input type="password" class="input_inline element_ol" name="autorizacion_txt">
				</div>
			</div>
			<div class="group_inline">
				<div class="label_inline">
					</div>
				<div class="type_inline">
					<button type="button" class="button_enviar element_ol btn btn-default">Enviar información</button>
				</div>
			</div>
		</form>
	</div>
</div>