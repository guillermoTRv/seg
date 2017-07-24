<?php 
	$id_cliente_get = sanitizar_get("val");
	$array_cliente  = consulta_array("SELECT * FROM clientes WHERE id_cliente = '$id_cliente_get'");
	$name_cliente = $array_cliente['name_cliente'];
	$num_int      = $array_cliente['num_int'];
	$num_ext      = $array_cliente['num_ext'];
	$calle        = $array_cliente['calle'];
	$colonia      = $array_cliente['colonia'];
	$postal       = $array_cliente['postal'];
	$demarcacion  = $array_cliente['demarcacion'];
	$entidad      = $array_cliente['entidad'];
	$inicio_contrato = $array_cliente['inicio_contrato'];
	$fin_contrato    = $array_cliente['fin_contrato'];
?>
<div class="col-md-10">
  <h2 style="margin-bottom: 19px"><span class=" icon-upload3"></span> Modificación de Datos - Cliente <?php echo $name_cliente ?></h2>
	<form class="form_cliente_modificar" method="POST" enctype="multipart/form-data">
			<label>Nombre del cliente</label>
			<input type="hidden" value="<?php echo $id_cliente_get ?>" name="id_cliente">
			<input type="text" class="form-control" name="name_txt" value="<?php echo $name_cliente ?>">
			<p style="margin-top:18px;">*Ubicación oficinas principales</p>
			<div class="row">
				<div class="col-md-6">
					<label>Calle</label>
					<input type="text" class="form-control" name="calle_txt" value="<?php echo $calle ?>">
				</div>
				<div class="col-md-3">
					<label>No.Ext</label>
					<input type="text" class="form-control" name="ext_txt" value="<?php echo $num_int ?>">
				</div>
				<div class="col-md-3">
					<label>No.Int</label>
					<input type="text" class="form-control" name="int_txt" value="<?php echo $num_ext ?>">
				</div>	
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label>Colonia</label>
					<input type="text" class="form-control" name="colonia_txt" value="<?php echo $colonia ?>">
				</div>
				<div class="col-md-3">
					<label>Codigo Postal</label>
					<input type="text" class="form-control" name="postal_txt" value="<?php echo $postal ?>">
				</div>
			</div><br>
			<div class="row">	
				<div class="col-md-6">
					<label>Entidad Federativa</label>
					<select class="form-control entidad" name="entidad_txt">
						<option value="<?php echo $entidad ?>"><?php echo $entidad ?></option>
						<?php include("estados.php") ?>
					</select>
				</div>
				<div class="col-md-6">
					<label>Municipio/Delegacion</label>
					<select class="form-control municipios" name="demarcacion_txt">
						<option value="<?php echo $demarcacion ?>"><?php echo $demarcacion ?></option>
					</select>
				</div>
			</div>
			<p style="margin-top:18px;">*Contrato</p>
			<div class="row">
				<div class="col-md-6">
					<label>Fecha de inicio de contrato</label>
					<input type="date" class="form-control" name="inicio_txt" value="<?php echo $inicio_contrato ?>">
				</div>
				<div class="col-md-6">
					<label>Fecha de finalización de contrato</label>
					<input type="date" class="form-control" name="fin_txt" value="<?php echo $fin_contrato ?>">
				</div>
			</div><br>		
			<div class="row">
				<div class="col-md-6">
					<input type="password" placeholder="codigo de confirmación" name="codigo_txt" style="display: inline-block;">
					<input class="btn btn-default btn_cliente" type="button" value="Aceptar y Registrar" style="display: inline-block;">	
				</div>
				<div class="col-md-3">
					
				</div>
			</div>
	</form>
	<h4 class="mens"></h4>
	<h4><a class="a_blue" href="?cont=lista_modificar">Regresar</a></h4>
</div>
<script>
	$(document).on("click",".btn_cliente",function(){
		$(".btn-registrar-es").prop( "disabled",true)
		$.ajax({
			type:"post",
			url:"menu_inicial/process_mod_cliente.php",
			data:$(".form_cliente_modificar").serialize(),	
			success:function(data){
				$(".mens").html(data)
			}
		})
	})
</script>
