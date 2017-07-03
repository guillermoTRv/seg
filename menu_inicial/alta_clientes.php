<div class="col-md-10">
	<h2 style="margin-bottom: 19px"><span class=" icon-upload3"></span> Alta de un nuevo cliente</h2>

	<form class="form_cliente_alta" method="POST" enctype="multipart/form-data">
		<label>Nombre del cliente</label>
		<input type="text" class="form-control" name="name_txt">
		<p style="margin-top:18px;">*Ubicación oficinas principales</p>
		<div class="row">
			<div class="col-md-6">
				<label>Calle</label>
				<input type="text" class="form-control" name="calle_txt">
			</div>
			<div class="col-md-3">
				<label>No.Ext</label>
				<input type="text" class="form-control" name="ext_txt">
			</div>
			<div class="col-md-3">
				<label>No.Int</label>
				<input type="text" class="form-control" name="int_txt">
			</div>	
		</div><br>
		<div class="row">
			<div class="col-md-6">
				<label>Colonia</label>
				<input type="text" class="form-control" name="colonia_txt">
			</div>
			<div class="col-md-3">
				<label>Codigo Postal</label>
				<input type="text" class="form-control" name="postal_txt">
			</div>
		</div><br>
		<div class="row">
			<div class="col-md-6">
				<label>Municipio/Delegacion</label>
				<input type="text" class="form-control" name="demarcacion_txt">
			</div>
			<div class="col-md-6">
				<label>Entidad Federativa</label>
				<input type="text" class="form-control" name="entidad_txt">
			</div>
		</div>	
		<p style="margin-top:18px;">*Contrato</p>
		<div class="row">
			<div class="col-md-6">
				<label>Fecha de inicio de contrato</label>
				<input type="date" class="form-control" name="inicio_txt">
			</div>
			<div class="col-md-6">
				<label>Fecha de finalización de contrato</label>
				<input type="date" class="form-control" name="fin_txt">
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
</div>
<script>
	$(document).on("click",".btn_cliente",function(){
		$(".btn-registrar-es").prop( "disabled",true)
		$.ajax({
			type:"post",
			url:"menu_inicial/process_alta_cliente.php",
			data:$(".form_cliente_alta").serialize(),	
			success:function(data){
				$(".mens").html(data)
			}
		})
	})
</script>