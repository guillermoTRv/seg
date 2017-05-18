<script>
	$(document).keydown(function(event){
	if (event.which == 13) {
			event.preventDefault()
		}
	});
	$(function(){
        $(document).on("click",".btn-iniciar",function(){
         	var select_valor = $("#puesto_txt").val()
         	var identificador = $(".identificador_txt").val()
         	if (select_valor != '') {
	         	$(".siguiente_paso").html("Ingrese codigo de autorizacion para finalizar la accion<br> <form  method='post' enctype='multipart/form-data' class='form-inline'><div class='form-group'> <input name='identificador_txt' type='hidden' value='"+identificador+"'>    <input name='select_txt' type='hidden' value='"+select_valor+"'>                      <input name='codigo' type='password' class='form-control ingrese' autocomplete='off'></div>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-concluir'>Conluir Accion</button>&nbsp;&nbsp;<button type='button' class='btn btn-default btn-cancelar'>Cancelar</button></form>")
	    	 	$(".ingrese").focus()
    	 	}
       	});
    });
    $(document).on("click",".btn-concluir",function(){
        if ($(".ingrese").val() != ''){
	        $.ajax({
					type:"POST",
					url:"panel_sys/personal/process_modificar_puesto.php",
					data:$(".form-inline").serialize(),
					success:function(data){
						if (data == 00) {
							alert("Codigo invalido")
						}
						else{
							$(".mensaje_cambio").html(data)	
						}
						
					}
			});
		}
    });
    $(document).on("click",".btn-cancelar",function(){
         $(".siguiente_paso").html("<button style='width:300px' class='btn btn-default btn-iniciar'>Iniciar cambio de puesto</button>")
    });
</script>

<?php 
	$q_personal = consulta_array("SELECT * FROM usuarios WHERE id_usuario='$val'");
	$nombre =     $q_personal['nombre'];
	$apellido_p = $q_personal['apellido_p'];
	$apellido_m = $q_personal['apellido_m'];
	$nombre_completo = $nombre." ".$apellido_p." ".$apellido_m;
	$identificador = $q_personal['identificador'];
	$usuario = $q_personal['usuario'];
	$puesto = $q_personal['puesto'];
?>

<div class="row">
	<div class="col-md-10">
			<h3>
				Cambio de puesto para el <?php echo  ucwords($puesto).": <strong>$nombre_completo</strong>"; ?>
			</h3>
			<h3>
				Identificador: <strong><?php echo $identificador ?> </strong> &nbsp; Nombre de usuario: <strong><?php echo $usuario ?></strong>
			</h3>
			<h3>
				Puesto actual: <strong><?php echo ucwords($puesto) ?></strong>
			</h3>
			
			<h3>Seleccione un nuevo puesto</h3>
			<select class="form-control" id="puesto_txt">
					<option value="">Seleccione un puesto</option>
					<?php 
						if ($puesto == 'guardia') {
							?>
							<option value="supervisor">Supervisor</option>
							<option value="cliente">Cliente</option>
							<?php
						}
						if ($puesto == 'supervisor') {
							?>
							<option value="guardia">Guardia</option>
							<option value="cliente">Cliente</option>
							<?php
						}
						if ($puesto == 'cliente') {
							?>
							<option value="guardia">Guardia</option>
							<option value="supervisor">Supervisor</option>
							<?php
						}
					?>
			</select>
			<br>
			<div class="siguiente_paso">
				<button style='width:300px' class='btn btn-default btn-iniciar'>Iniciar cambio de puesto</button>	
			</div>
			<div class="mensaje_cambio">
				
			</div>
			<input type="hidden" value="<?php echo $val ?>" class="identificador_txt">

	<br><br>
	<a href="?pr=opciones_modificar_usuario&val=<?php echo $val ?>" class="blue"><span class="icon-undo2"></span> Regresar a las opciones de modificación</a><br>
	<a href="?pr=info&val=<?php echo $val ?>" class="blue"><span class="icon-undo2"></span> Regresar al panel de información del elemento</a>
	</div>

</div>
