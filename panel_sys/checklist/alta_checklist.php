<br>
<script>
	$(document).ready(function(){
		$(".a_uno").click(function(event){
			event.preventDefault(); 
			$(".form_dos").hide()
			$(".form_uno").show()
		});
		$(".a_dos").click(function(event){
			event.preventDefault(); 
			$(".form_uno").hide()
			$(".form_dos").show()
		});
	})
</script>
<div class="row">
	<div class="col-md-4">
		<button class="btn btn-default a_uno" type="button">
			<h4>Alta de Categoria para el cliente - <?php $id_cliente = $_SESSION['cliente']; echo $name_cliente = consulta_tx("SELECT name_cliente FROM clientes WHERE id_cliente = '$id_cliente'","name_cliente") ?></h4>
		</button>
	</div>
	<div class="col-md-4">
		<button class="btn btn-default a_dos" type="button">
			<h4>Alta de Situacion para el cliente - <?php $id_cliente = $_SESSION['cliente']; echo $name_cliente = consulta_tx("SELECT name_cliente FROM clientes WHERE id_cliente = '$id_cliente'","name_cliente") ?></h4>
		</button>
	</div>
</div>
<br>

<div class="row form_uno" style="display:none">
	<div class="col-md-10">
		<h3>Alta de Categoria para el cliente - <?php $id_cliente = $_SESSION['cliente']; echo $name_cliente = consulta_tx("SELECT name_cliente FROM clientes WHERE id_cliente = '$id_cliente'","name_cliente") ?></h3>
		<br>
		<form class="form-horizontal">
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Seleccione un inmueble</label>
			    <div class="col-sm-10">
			      <select class="form-control"></select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Categoria nueva</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-3 col-sm-offset-2">
			      <button type="button" class="btn btn-success">Aceptar</button>
			    </div>
			  </div>
		</form>
	</div>
</div>

<div class="row form_dos" style="display:none">
	<div class="col-md-10">
		<h3>Alta de Situacion para el cliente - <?php $id_cliente = $_SESSION['cliente']; echo $name_cliente = consulta_tx("SELECT name_cliente FROM clientes WHERE id_cliente = '$id_cliente'","name_cliente") ?></h3>
		<br>
		<form class="form-horizontal">
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Seleccione un inmueble</label>
			    <div class="col-sm-10">
			      <select class="form-control"></select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Selecciones una categoria</label>
			    <div class="col-sm-10">
			      <select class="form-control"></select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Situacion</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-3 col-sm-offset-2">
			      <button type="button" class="btn btn-success">Aceptar</button>
			    </div>
			  </div>

		</form>
	</div>
</div>

