<?php 
	
	$cont_registros = consulta_val("SELECT null FROM registros_es WHERE identificador = '$identificador'");

	$array_jornada  = consulta_array("SELECT estado_registro,inmueble,id_registro_es FROM registros_es WHERE identificador = '$identificador' order by id_registro_es desc");
	$estado         = $array_jornada['estado_registro'];

?>
<style>
	.centra{text-align: center;}
	.check{cursor: pointer}
	.check_select{background-color: green}
	.input_check{margin-left:10px;border-top:solid 1px #fff;border-left:solid 1px #fff;border-right:solid 1px #fff;}
</style>
<div class="row">
	<div class="col-md-9" style="margin-right: 46px">
		<?php 
			if ($estado_registro == "correcto" || $cont_registros == 0) {
				?>
				<h3><span class="icon-clipboard"></span> Llenado de checklist </h3><br>
				<?php		
				if ($cont_registros == 0) {
					echo "<h3><strong>¡Bienvenido a su primer día de trabajo!</strong></h3>";
					echo "<h3><strong>Porfavor proceda a registrar su entrada. Al final usted tiene que reportar en esta seccion el estado en que se encuentran las diferentes zonas o lugares del inmueble al que esta asignado de acuerdo a su jornada laboral</strong></h3>";
				}
				else{
					echo "<h3><strong>Aun no ha iniciado turno</strong></h3>";
				}

			}
			if ($estado_registro == "entrada"){
				$id_inmueble    = $array_jornada['inmueble'];
			    $name_inmueble  = consulta_tx("SELECT name_inmueble FROM inmuebles WHERE id_inmueble = '$id_inmueble'","name_inmueble");
				?>
				<h3><span class="icon-clipboard"></span> Llenado de checklist - <?php echo $name_inmueble ?></h3><br>
				
				<?php 
					$id_registro_es     = $array_jornada['id_registro_es'];
					$estado_checklist_j = consulta_val("SELECT estado FROM checklist_jornada WHERE id_registro_es = '$id_registro_es'");
					if ($estado_checklist_j == 0) {
						include("panel_sys/guardia/form_checklist.php");
					}
					if ($estado_checklist_j == 1) {
						echo "<h3><strong>Usted ya realizo su checklist para esta jornada</strong></h3>";
					}
				?>
				<?php
			}
		?>	
	</div>
	<div class="col-md-9 m_v" style="margin-right: 46px">
		
	</div>
</div>


<script>
	$(document).on("click",".btn-checklist",function(){
	    $(".btn-checklist").prop("disabled",true)
	   	
		var contador = 0
		$("form.datos_checklist input").each(function(){
		    var val_input = $(this).val()
		    if (val_input == '') {					    
		    	contador = 1
		    }
		})
		if (contador == 1) {
			alert("Existen campos vacios en el checklist")
			$(".btn-checklist").prop("disabled",false)
		}
		else{
		    $.ajax({
				type:"POST",
				url:"panel_sys/guardia/process_checklist.php",
				data:$(".datos_checklist").serialize(),
				success:function(data){
					$(".m_v").html(data)
					$(".btn-checklist").prop("disabled",false)
					$(".btn-checklist").hide()
				}
				
	    	});
	    }
    });	
	$(document).on("click",".check",function(){
		var cont_select = $(this).parent().parent().find(".check_select").length
		if (cont_select == 1) {
			

			$(this).parent().parent().find(".check_select").removeClass("check_select")
		

		}
		$(this).addClass("check_select")
		var situacion_name = $(this).parent().parent().find(".situacion_name").html()
		var categoria_name = $(this).parent().parent().find(".categoria_name").html()
		var estado_check   = $(this).attr("data")
		if (estado_check == "anomalia") {
			data_td       = $(this).parent().attr("data")
			name_coment   = data_td+"_coment";

			$(this).next(".td_coment").html("<input type='text' class='input_check' name='"+name_coment+"'>")
			$(this).next(".td_coment").children(".input_check").focus()
			$(this).next().next(".td_valor").children(".input_valor").val(estado_check)
		}
		if (estado_check == "normal") {
			$(this).parent().next().children(".td_coment").html("")
			$(this).parent().next().children(".td_valor").children(".input_valor").val(estado_check)
		}


	});	    
</script>