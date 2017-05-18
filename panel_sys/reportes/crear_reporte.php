<?php 
	$array_jornada  = consulta_array("SELECT estado_registro,inmueble,id_registro_es FROM registros_es WHERE identificador = '$identificador' order by id_registro_es desc");
	$id_registro_es = $array_jornada['id_registro_es'];
	$estado         = $array_jornada['estado_registro'];
	$id_inmueble    = $array_jornada['inmueble'];
	$name_inmueble  = consulta_tx("SELECT name_inmueble FROM inmuebles WHERE id_inmueble ='$id_inmueble'","name_inmueble");


	$consulta_reporte = consulta_val("SELECT null FROM reportes_extra WHERE id_registro_es = '$id_registro_es'");

?>
<div class="row">
	<div class="col-md-10">
		<h3>Generación de reportes extraordinarios <?php if($name_inmueble != ''){echo "- ".$name_inmueble;} ?></h3>
		<?php 
			if ($estado == "entrada") {
				if ($consulta_reporte == 1) {
					echo "<h4><strong>Ya se ha levantado un reporte extraordinario en su turno</strong></h4>";	
				}
				if ($consulta_reporte > 1) {
					echo "<h4><strong>Ya se han levantado $consulta_reporte reportes extraordinarios en su turno</strong></h4>";	
				}
				include("panel_sys/reportes/form_reporte.php");
			}
			if ($estado == "correcto") {
				echo "<h3><strong>Tiene que iniciar turno para poder crear un reporte</strong></h3>";
			}
		?>
		

		
	</div>
</div>
<script>

	$(".option_est").click(function(){
        var option_val = $(this).val()
        $(".option_val").val(option_val)   
    });

	$(document).on("click",".btn-reporte",function(event){
		 event.preventDefault()
	    $(".btn-reporte").prop("disabled",true)
	    var detalle_repo = $(".detalle_repo").val()
	    var option_val   = $(".option_val").val()
	   
	    if (detalle_repo != '' && option_val !='') {
	    	
	    	var formData = new FormData($(".form_reporte")[0]);
            var ruta = "panel_sys/reportes/process_reporte.php";
	    	$.ajax({
				url: ruta,
                type: "POST",

                data: formData,
                contentType: false,
                processData: false,
				success:function(data){
					$(".m_v").html(data)
					$(".btn-reporte").hide()
				}
				
	    	});
	    }
	    else{
	    	alert("Llene todos los campos del formulario")
	    	$(".btn-reporte").prop("disabled",false)
	    }
	   
                
    });	
</script>