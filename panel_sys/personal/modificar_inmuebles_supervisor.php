<style>
	.element_inm{margin-top:7px;margin-bottom:7px;display:inline-block;}
	.element_can{margin-top:7px;margin-bottom:7px;margin-left:10px;display:inline-block;}
</style>
<div class="row">
	<div class="col-md-4" >
		<h4>Inmuebles actualmente asignados</h4>
		<?php
			$q_inmuebles  = "SELECT name_inmueble FROM inmuebles WHERE supervisor = '$val'";
			$consulta_val = consulta_val($q_inmuebles);
			if ($consulta_val == 0) {
				echo "<h4>No hay inmuebles asignados</h4>";
			}
			else{
			$q_inmuebles = mysqli_query($q_sec,$q_inmuebles);
				while ($array_inm = mysqli_fetch_array($q_inmuebles)) {
		  			$inmueble_sup = $array_inm['name_inmueble'];
					echo "<h4><span class='icon-radio-checked' style='color:green'></span> - $inmueble_sup</h4>";
				}
			}
		?>
	</div>
	<div class="col-md-5" style="border-left:1px solid #6E6E6E;padding-left:30px">
		<h4>Seleccione los inmuebles que que estaran al cargo del supervisor</h4>
			<select id="val_inmueble" class="form-control" style="margin-bottom:4px">
				<option value="">--</option>
				<?php 
					$inmuebles_c = mysqli_query($q_sec,"SELECT id_inmueble,name_inmueble FROM inmuebles WHERE cliente = '$id_cliente' and supervisor !='$val' ");
					while ($array = mysqli_fetch_array($inmuebles_c)) {
						$name_inmueble = $array['name_inmueble'];
						$id_inmueble   = $array['id_inmueble'];
						echo "<option class='$id_inmueble' value='$id_inmueble'>$name_inmueble</option>";
					}
				?>
			</select>
			<div class="lista_inmuebles" style="margin-left:16px">
				
			</div>
			<input type="hidden" class="valores_inm">
			<input type="hidden" class="nombre_user" value="<?php echo $nombre_completo ?>">
			<input type="hidden" class="puesto" value="<?php echo $puesto ?>">
			<input type="hidden" class="val_user" value="<?php echo $val ?>">	
			<div class="siguiente_paso">
				<button style='width:300px;margin-top:15px;' class='btn btn-success btn-agregar'>Agregar inmueble</button>
				<button style='width:300px;margin-top:15px;' class='btn btn-default btn-iniciar'>Iniciar rotación de inmuebles</button>	
			</div>
			<div class="mensaje_rotacion">
				
			</div>
			<br><br>
	</div>
</div>
<script>
	$(document).keydown(function(event){
		if (event.which == 13) {
			event.preventDefault()
		}
	});

	$(document).on("click",".btn-agregar",function(){
        var val_inmueble = $("#val_inmueble").val()
        var string_inmueble = $("#val_inmueble option."+val_inmueble+"").html()
        var valores_inm = $(".valores_inm").val()
        var control_inm = 0
        var nombre_user = $(".nombre_user").val()
        if (val_inmueble != ''){
	        $(".lista_inmuebles .element_inm").each(function(){
		        if ($(this).html() == string_inmueble) {
		        	control_inm = 1
		        }
		    });

	        if (control_inm != 1) {
		        $.ajax({
						type:"GET",
						url:"panel_sys/personal/ajax_supervisor_inm.php?val="+val_inmueble+"",
						success:function(data){
							if (data == 11) {
								$(".lista_inmuebles").append("<div><div class='element_inm'>"+string_inmueble+"</div><div class='element_can' id='"+val_inmueble+"'><a class='blue' href=''>Cancelar</a></div></div>")
								var new_valores_inm = $(".valores_inm").val(valores_inm+val_inmueble+"-")
							}
							if (data == 22) {
								$(".lista_inmuebles").append("<div style='margin-top:7px;'>El inmueble "+string_inmueble+" ya esta en supervision. Si desea continuar la supervision cambiara y estara a cargo del supervisor <strong>"+nombre_user+" </strong> </div><div class='element_inm'>"+string_inmueble+"</div><div class='element_can' id='"+val_inmueble+"' data='span'><a class='blue' href=''>Cancelar</a></div>")
								var new_valores_inm = $(".valores_inm").val(valores_inm+val_inmueble+"-")
							}
							
								
							
						}
				});
			}
		}
    });
    $(document).on("click",".element_can",function(event){
			event.preventDefault()
			var valor_inm_can = $(this).attr("id") 
			if ($(this).attr("data")=="span") {
				$(this).prev().prev().remove()
			}
			$(this).prev().remove()
			$(this).remove()
			var valores_inm = $(".valores_inm").val();
			var nuevo_val = valores_inm.replace(valor_inm_can+"-","")
			$(".valores_inm").val(nuevo_val)
	});

    $(function(){
        $(document).on("click",".btn-iniciar",function(){
         	var valores_inm  = $(".valores_inm").val()
         	var val_puesto   = $(".puesto").val()
         	var val_user     = $(".val_user").val()
         	if (valores_inm != '') {
	         	$(".siguiente_paso").html("Ingrese codigo de autorización para finalizar la acción<br>      <form  method='post' enctype='multipart/form-data' class='form-inline'>    <div class='form-group'>     <input name='val_usuario_txt' type='hidden' value='"+val_user+"'>   <input name='val_inmueble_txt' type='hidden' value='"+valores_inm+"'>        <input name='val_puesto_txt' type='hidden' value='"+val_puesto+"'>              <input name='codigo' type='password' class='form-control ingrese' autocomplete='off'></div>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-concluir'>Conluir Acción</button>&nbsp;&nbsp;<button type='button' class='btn btn-default btn-cancelar'>Cancelar o Revertir</button></form>")
	    	 	$(".ingrese").focus()
	    	 	$("#val_inmueble").prop( "disabled", true )
    	 		$(".element_can").remove()
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
         $(".siguiente_paso").html("<button style='width:300px;margin-top:15px;' class='btn btn-success btn-agregar'>Agregar inmueble</button><button style='width:300px;margin-top:15px;' class='btn btn-default btn-iniciar'>Iniciar rotación de inmuebles</button>")
         $(".mensaje_rotacion").html(" ")
         $(".lista_inmuebles").html(" ")
         $(".valores_inm").val("")
         $("#val_inmueble").prop( "disabled", false )

    });

</script>
