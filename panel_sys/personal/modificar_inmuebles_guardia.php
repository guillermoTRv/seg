<div class="row">
	<div class="col-md-4" >
		<h4>Inmueble actualmente asignado</h4>
		<h4><strong><?php echo $inmueble_asign ?></strong></h4>		
	</div>
	<div class="col-md-5" style="border-left:1px solid #6E6E6E;padding-left:30px">
			
			<h4>Elija el inmueble al cual desea cambiar el elemento</h4>
			<select id="val_inmueble" class="form-control">
				<option value="">--</option>
				<?php 
					$inmuebles_c = mysqli_query($q_sec,"SELECT id_inmueble,name_inmueble FROM inmuebles WHERE cliente = '$id_cliente'");
					while ($array = mysqli_fetch_array($inmuebles_c)) {
						$name_inmueble = $array['name_inmueble'];
						$id_inmueble   = $array['id_inmueble'];
						echo "<option value='$id_inmueble'>$name_inmueble</option>";
					}
				?>
			</select>
			<br>
			<div class="siguiente_paso">
				<button style='width:300px' class='btn btn-default btn-iniciar'>Iniciar rotación de inmuebles</button>	
			</div>
			<input type="hidden" class="puesto" value="<?php echo $puesto ?>">
			<input type="hidden" class="val_user" value="<?php echo $val ?>">
			<div class="mensaje_rotacion">
				
			</div>
			<br>
					
	</div>
</div>
<script>
	$(document).keydown(function(event){
	if (event.which == 13) {
			event.preventDefault()
		}
	});
	$(function(){
        $(document).on("click",".btn-iniciar",function(){
         	var val_inmueble = $("#val_inmueble").val()
         	var val_puesto   = $(".puesto").val()
         	var val_user     = $(".val_user").val()
         	if (val_inmueble != '') {
	         	$(".siguiente_paso").html("Ingrese codigo de autorización para finalizar la acción<br>      <form  method='post' enctype='multipart/form-data' class='form-inline'>    <div class='form-group'>     <input name='val_usuario_txt' type='hidden' value='"+val_user+"'>   <input name='val_inmueble_txt' type='hidden' value='"+val_inmueble+"'>        <input name='val_puesto_txt' type='hidden' value='"+val_puesto+"'>              <input name='codigo' type='password' class='form-control ingrese' autocomplete='off'></div>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-concluir'>Conluir Acción</button>&nbsp;&nbsp;<button type='button' class='btn btn-default btn-cancelar'>Cancelar o Revertir</button></form>")
	    	 	$(".ingrese").focus()
	    	 	$("#val_inmueble").prop( "disabled", true )
    	 	}
    	 	else{
    	 		alert("Tiene que escoger algun inmueble para continuar")
    	 	}
       	});
    });
    $(document).on("click",".btn-concluir",function(){
        if ($(".ingrese").val() != ''){
	        $.ajax({
					type:"POST",
					url:"panel_sys/personal/process_modificar_rotacion.php",
					data:$(".form-inline").serialize(),
					success:function(data){
						if (data == 00) {
							alert("Codigo invalido")
						}
						else{
							$(".btn-concluir").prop( "disabled", true )
							$(".mensaje_rotacion").html(data)	
						}
						
					}
			});
		}
		else{
    	 	alert("Ingrese codigo de autorización")
    	}
    });
    $(document).on("click",".btn-cancelar",function(){
         $(".siguiente_paso").html("<button style='width:300px' class='btn btn-default btn-iniciar'>Iniciar rotación de inmuebles</button>")
         $(".mensaje_rotacion").html(" ")
         $("#val_inmueble").prop( "disabled", false )

    });
</script>
