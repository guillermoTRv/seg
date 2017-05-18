<script>
$(document).ready(function(){
	$(".btn_aceptar").click(function(){
		if ($(".dato_mod").val() != '') {
			$.ajax({
				type:"POST",
				url:"panel_sys/inmuebles/process_busqueda_mod.php",
				data:$("#form_baja_personal").serialize(),
				success:function(data){
				  	$("#respuesta").html(data,400)
				}
			});
			return false;	
		}
	})
});
$(document).keydown(function(event){
	if (event.which == 13) {
		event.preventDefault()
		if ($(".dato_mod").val() != '') {
			$.ajax({
				type:"POST",
				url:"panel_sys/inmuebles/process_busqueda_mod.php",
				data:$("#form_baja_personal").serialize(),
				success:function(data){
				  	$("#respuesta").html(data,700)
				}
			});
			return false;	
		}
	}
});
$(function(){
    $(document).on("click",".opcion_busqueda",function(event){
		event.preventDefault()
		var id_info = $(this).attr("id")
		$(".opciones").hide(400)
		$("."+id_info).show(700)
	});
	$(document).on("click",".regresar",function(event){
		event.preventDefault()
		var id_info = $(this).attr("id")
		$("."+id_info).hide(400)
		$(".opciones").show(700)
	});
});
</script>
<?php echo $val ?>
<div class="row">
	<div class="col-md-10">
		<h3>Modificación de datos para los inmuebles pertenecientes a <?php echo $name_cliente ?> </h3>
	</div>
	<div class="col-md-10">
		<form id='form_baja_personal' method="post" enctype="multipart/form-data" style="margin-bottom:20px">
		  <div class="form-group"><br>
		    <label>Ingrese a continuación cualquiera de los siguientes datos: Número identificador o el nombre del inmueble</label>
		    <input type="text" class="form-control dato_mod" name="dato_mod_txt" autofocus>
		  </div>
		  <button type="button" class="btn btn-default btn_aceptar">Buscar</button>
		</form>
		<div id="respuesta" style="margin-bottom:20px">
			
		</div>
		<a href="?inm=listado" class="blue">Realizar busqueda por listas</a>	
	</div>
</div>