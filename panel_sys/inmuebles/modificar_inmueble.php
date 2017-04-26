<?php  
	$valores = consulta_array("SELECT * FROM inmuebles WHERE id_inmueble='$val'");
	$name_inmueble = $valores['name_inmueble'];
	$calle = $valores['calle'];
	$num_ext = $valores['num_exterior'];
	$num_int = $valores['num_interior'];
	$colonia = $valores['colonia'];
	$postal  = $valores['codigo_postal'];
	$entidad = $valores['entidad'];
	$demarcacion = $valores['demarcacion'];
	$referencia = $valores['referencia'];
?>
<script>
	formulario_control("panel_sys/inmuebles/process_modificar_inm.php")
</script>
<div class="row">
	<div class="col-md-10">
		<h3>Modificacion de datos para el inmueble <?php echo $name_inmueble." de la empresa - ";echo $name_cliente ?></h3>
	</div>
	<div class="col-md-10">
		<br>
		<form method="post" enctype="multipart/form-data" class="control_inline">
			<div class="group_inline">
				<div class="label_inline">
					<label>Nombre del inmueble</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="name_txt" value="<?php echo $name_inmueble ?>">
				</div>
			</div>
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
					<label>Número interior</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="num_int_txt" value="<?php echo $num_int ?>">
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
					<label>Colonia</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="colonia_txt" value="<?php echo $colonia ?>">
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
						<li><p>Memorias</p></li>
						<li><p>hjs kjasf</p></li>
						<li><p>hjsssskjasf</p></li>
						<li><p>hjskja    sf</p></li>
						<li><p>hjskjasf</p></li>
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
						<li><p>Memorias</p></li>
						<li><p>hjs kjasf</p></li>
						<li><p>hjsssskjasf</p></li>
						<li><p>hjskja    sf</p></li>
						<li><p>hjskjasf</p></li>
					</ul>
					<input type="hidden" name="demarcacion_txt" value="<?php echo $demarcacion ?>">
				</li>	
			</div>
			<div class="group_inline">
				<div class="label_inline">
					<label>Referencias</label>
				</div>
				<div class="type_inline">
					<input type="text" class="input_inline element_ol" name="referencias_txt" value="<?php echo $referencia ?>">
					<input type="hidden" name="valor_txt" value="<?php echo $val ?>">
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
	<a href="?inm=listado" class="blue"><span class="icon-undo2"></span> Regresar al listado de inmuebles para el cliente <?php echo $name_cliente ?></a>
	<br><br><br><br>
	</div>
</div>