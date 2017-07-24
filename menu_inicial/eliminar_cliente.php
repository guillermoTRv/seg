<?php 
	$id_cliente_get = sanitizar_get("val");
	$array_cliente  = consulta_array("SELECT * FROM clientes WHERE id_cliente = '$id_cliente_get'");
	$name_cliente = $array_cliente['name_cliente'];
	$calle    =  $array_cliente['calle'];
	$num_ext  =  $array_cliente['num_ext'];
	$colonia  =  $array_cliente['colonia'];
	$demarcacion = $array_cliente['demarcacion'];
	$entidad     = $array_cliente['entidad'];
	$direccion   = "Calle ".$calle." #".$num_ext." colonia ".$colonia." $demarcacion"." $entidad";
?>
<div class="col-md-10">
  <h2 style="margin-bottom: 19px"><span class=" icon-upload3"></span> Eliminar cliente - <?php echo $name_cliente ?></h2>
  <h4>Dirección: <?php echo $direccion ?></h4><br>
  <form method="POST" enctype="multipart/form-data" class="form_eliminar">	
  	<label for="">Ingrese codigo de autorización</label>
  	<input type="password" name="pass" >
  	<input type="hidden" name="id_cliente" value="<?php echo $id_cliente_get ?>">
  	<button type="button" class="btn btn-danger btn-sm">eliminar</button>
  </form>
  	<h4 class="mens"></h4>
  		<h4><a class="a_blue" href="?cont=lista_eliminar">Regresar</a></h4>
</div> 
<script>
	$(document).on("click",".btn-danger",function(){
		$(".btn-danger").prop( "disabled",true)
		$.ajax({
			type:"POST",
			url:"menu_inicial/process_eliminar_cliente.php",
			data:$(".form_eliminar").serialize(),
			success:function(data){
				$(".btn-danger").prop( "disabled",false)
				$(".mens").html(data)
			}
		})
	})
</script>
