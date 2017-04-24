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
	$(document).on("click",".btn-categoria",function(){
         $.ajax({
			type:"POST",
			url:"panel_sys/checklist/process_alta_categoria.php",
			data:$("#form-categoria").serialize(),
			success:function(data){
				alert(data)
				
			}
		});
    });
    $(document).on("click",".btn-situacion",function(){
         $.ajax({
			type:"POST",
			url:"panel_sys/checklist/process_alta_situacion.php",
			data:$("#form-situacion").serialize(),
			success:function(data){
				alert(data)
				
			}
		});
    });
    $(document).on("change","#inmuebles",function(){
                   $("#inmuebles option:selected").each(function () {
                    elegid=$(this).val();
                    $.post("panel_sys/checklist/select_ajax.php", { elegid: elegid }, function(data){
                    $("#categoria").html(data);
                    
                });
           })
    });

</script>
<div class="row">
	<div class="col-md-4">
		<button class="btn btn-default a_uno" type="button">
			<h4>Alta de Categoria para el cliente - <?php echo $name_cliente; ?></h4>
		</button>
	</div>
	<div class="col-md-4">
		<button class="btn btn-default a_dos" type="button">
			<h4>Alta de Situacion para el cliente - <?php echo $name_cliente; ?></h4>
		</button>
	</div>
</div>
<br>

<div class="row form_uno" style="display:none">
	<div class="col-md-10">
		<h3>Alta de Categoria para el cliente - <?php $id_cliente = $_SESSION['cliente']; echo $name_cliente = consulta_tx("SELECT name_cliente FROM clientes WHERE id_cliente = '$id_cliente'","name_cliente") ?></h3>
		<br>
		<form class="form-horizontal" method="POST" enctype="multipart/form-data" id="form-categoria">
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Seleccione un inmueble</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="inmueble_txt" >
			      	<option value="">--</option>
			      	<?php 
			      		$consulta_inm = mysqli_query($q_sec,"SELECT id_inmueble,name_inmueble FROM inmuebles WHERE cliente = '$id_cliente'");
			      		while ($array = mysqli_fetch_array($consulta_inm)) {
			      			$id_inmueble   = $array['id_inmueble'];
			      			$name_inmueble = $array['name_inmueble'];
			      			echo "<option value='$id_inmueble'>$name_inmueble</option>";
			      		}
			      	?>
			      </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Categoria nueva</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="categoria_txt">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-3 col-sm-offset-2">
			      <button type="button" class="btn btn-success btn-categoria">Aceptar</button>
			    </div>
			  </div>
		</form>
	</div>
</div>

<div class="row form_dos" style="display:none">
	<div class="col-md-10">
		<h3>Alta de Situacion para el cliente - <?php $id_cliente = $_SESSION['cliente']; echo $name_cliente = consulta_tx("SELECT name_cliente FROM clientes WHERE id_cliente = '$id_cliente'","name_cliente") ?></h3>
		<br>
		<form class="form-horizontal" method="POST" enctype="multipart/form-data" id="form-situacion">
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Seleccione un inmueble</label>
			    <div class="col-sm-10">
			      <select class="form-control" id="inmuebles">
			      	<option value="">--</option>
			      	<?php 
			      		$consulta_inm = mysqli_query($q_sec,"SELECT id_inmueble,name_inmueble FROM inmuebles WHERE cliente = '$id_cliente'");
			      		while ($array = mysqli_fetch_array($consulta_inm)) {
			      			$id_inmueble   = $array['id_inmueble'];
			      			$name_inmueble = $array['name_inmueble'];
			      			echo "<option value='$id_inmueble'>$name_inmueble</option>";
			      		}
			      	?>
			      </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Selecciones una categoria</label>
			    <div class="col-sm-10">
			      <select class="form-control" id="categoria" name="categoria_txt">
			      	<option value="">--</option>
			      </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Situacion</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="situacion_txt">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-3 col-sm-offset-2">
			      <button type="button" class="btn btn-success btn-situacion">Aceptar</button>
			    </div>
			  </div>

		</form>
	</div>
</div>

