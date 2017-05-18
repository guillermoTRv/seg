<?php 
	$val = sanitizar_get("val");
?>
<script>
	$(document).keydown(function(event){
		var control_sl = $(".control_sl").length;
		if (control_sl == 0) {
			tabla_val("nono",event)
		}

		if (event.which == 13) {  
            event.preventDefault();
        }
	});


	function ajax_select_click(event){
		$(".ul_menu li").click(function(event){	    		
		event.preventDefault()
		var valor_ajax = $(this).attr("id")
		var nombre     = $(this).html()
				$.ajax({

						type:"GET",
						url:"panel_sys/checklist/tabla_checklist.php?val="+valor_ajax+"",				
						success:function(data){
							$(".mens").html(data)
							$(".inm_h").html("Listado Checklist "+nombre+"")
						}	
											
				});
		});
	} 

	function ajax_select_enter(){
		var valor_ajax = $(".control_li").attr("id");
						var nombre     = $(".control_li").html();
						$.ajax({
							type:"GET",
							url:"panel_sys/checklist/tabla_checklist.php?val="+valor_ajax+"",
							success:function(data){
								$(".mens").html(data)
								$(".inm_h").html("Listado Checklist - "+nombre+"")
								$(".ul_menu").slideUp(100);
					        	$(".select_a").removeClass("control_sl");
					        	$(".control_li").removeClass("control_li");
							}
												
						});
	}

	select_slc(ajax_select_click,ajax_select_enter)


	$(document).on("click",".btn_cambio",function(event){
		event.preventDefault()
		var nn = $(this).parent().parent().prev().prev().prev().html()
		var mm = $(this).parent().parent().prev().prev().html()
		var id_categoria = $(this).parent().parent().prev().prev().prev().attr("id")
		var id_situacion = $(this).parent().parent().prev().prev().attr("id")

		$(".categoria_txt").val(id_categoria)
		$(".situacion_txt").val(id_situacion)
		$(".val_anterior").val(mm)


		$(".memo").val(mm)
		$(".ss").html(mm)
 		$(".ckk").html(nn)
 		$(".nm").show(400)
 	});
 	$(document).on("click",".cerrar",function(event){
		event.preventDefault()
		$(".m_vv").html("")
		$(".m_v").html("")
 		$(".nm").hide(600)
 		$(".ventana_delete").hide(600)
 	});
 	$(document).on("click",".btn-danger",function(event){
		event.preventDefault()
 		$(".m_v").html("")
 		$(".nm").hide(300)
 	});

 	$(document).on("click",".btn-primary",function(event){
 		$(".btn-primary").prop( "disabled", true )
 		var inpu  = $(".memo").val()
 		var id_situacion = $(".situacion_txt").val()
 		
 		$.ajax({
			type:"POST",
			url:"panel_sys/checklist/process_cambio_ck.php",
			data:$(".cambio_ck").serialize(),
			success:function(data){
				$(".m_v").html(data)
				$(".btn-primary").prop( "disabled", false )
				$(".st_"+id_situacion).html(inpu)		
			}
		});
		return false;
	});
 	$(document).on("click",".btn_delete",function(event){
		event.preventDefault()
		var name_categoria = $(this).parent().parent().prev().prev().prev().html()
		var name_situacion = $(this).parent().parent().prev().prev().html()
		var id_situacion = $(this).parent().parent().prev().prev().attr("id")
		$(".situacion_txt").val(name_situacion)
		$(".situacion_val").val(id_situacion)
		$(".name_categoria").html(name_categoria)
		$(".name_situacion").html(name_situacion)
		$(".ventana_delete").show(400)
	});
 	$(document).on("click",".btn_delete_process",function(event){
 		var id_situacion = $(".situacion_val").val()
 		$.ajax({
			type:"POST",
			url:"panel_sys/checklist/process_eliminar_situacion.php",
			data:$(".delete_form_situacion").serialize(),
			success:function(data){
				$(".m_vv").html(data)		
				$(".st_"+id_situacion).parent().remove()
				
			}
		});
		return false;
	});
	$(document).on("click",".btn-default",function(event){
		event.preventDefault()
		$(".m_vv").html("")
 		$(".ventana_delete").hide(300)
 	});
</script>

<div class="row">
	<div class="col-md-10">
			<p style="margin-left:20px">##Utilizar las teclas de navegación <span class="glyphicon glyphicon-arrow-up"></span> <span class=" glyphicon glyphicon-arrow-down"></span></p>
			<li style="display:inline-block;">
				<p style="background-color:#fff;padding:3px 6px 3px 6px;border:solid 1px #E6E6E6;border-radius:3px;font-size:1.1em"><a href="" class="select_a">Seleccione un inmueble(shift) <span class="icon-circle-down"></span></a></p>
				<ul class="ul_menu" style="display:none; position: absolute; list-style:none;background-color:#f2f2f2;padding:0px;">
					<?php 
						if (isset($usuario)) {
							$q_inmuebles = mysqli_query($q_sec,"SELECT * FROM inmuebles WHERE supervisor = '$num_user'");
							while ($array_inm = mysqli_fetch_array($q_inmuebles)) {
								$name_inmueble = $array_inm['name_inmueble'];
								$id_inmueble    = $array_inm['id_inmueble'];
								echo "<li id='$id_inmueble'>$name_inmueble</li>";
							}

						}
						else{
							
					
							$q_sentencia = "SELECT id_inmueble, name_inmueble FROM inmuebles WHERE cliente='$id_cliente' order by id_inmueble ASC";
							
							$q_conteo    = consulta_val($q_sentencia);
							if ($q_conteo == 0) {
								echo "<li>No tiene inmuebles asignados para este cliente</li>";
							}
							$q_inmuebles = mysqli_query($q_sec,$q_sentencia);
							while ($array = mysqli_fetch_array($q_inmuebles)) {
								$id_inmueble    =  $array['id_inmueble'];
								$name_inmueble	=  $array['name_inmueble'];
								echo "<li id='$id_inmueble'> <a href='#'> $name_inmueble </a> </li>";		
							}
						}		
					?>

				</ul>
			</li>
			<h3 style="display:inline;margin-left:10px;position:absolute;margin-top:2px" class="inm_h">
				Listado Checklist
			</h3>	
			
		
		<div style="background-color:#fff;margin-top:15px">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Categoria</th>
							<th>Situacion</th>
							<th>Estatus</th>
							<th><center>Acciones</center></th>
						</tr>
					</thead>
					<tbody class="mens">
				
					</tbody>
				</table>
		</div>
	</div>
</div>
<div style="display: none;position: absolute; left: 0px; top: 0px; right:0px; bottom:0px ;background-color:rgba(0,0,0,.4);height: 100%;width:100%" class="nm">
		<div style="background-color:white;position: absolute; left: 25%; top: 25%;right:25%;display;padding:25px">
			<h4 style="display: inline;">Modificar situación "<strong><span class="ss"></span></strong>" perteneciente al checklist "<strong><span class="ckk"></span></strong>"</h4>
			<a style="display: inline;float:right;" href="" class="cerrar">
				<span class="icon-cross"></span>
			</a>
			<br><br>
			<form method="POST" enctype="multipart/form-data" class="cambio_ck">
				<input type="text"   name="cambio_txt" class="form-control memo">
				<input type="hidden" name="categoria_txt" class="categoria_txt">
				<input type="hidden" name="situacion_txt" class="situacion_txt">
				<input type="hidden" name="val_anterior"  class="val_anterior">
				<br>
				<input class="btn btn-primary" type="button" value="Aceptar">
				<input class="btn btn-danger" type="button" value="Cancelar">
			</form>
			<div class="m_v">
				
			</div>
		</div>
	
</div>


<div style="display: none;position: absolute; left: 0px; top: 0px; right:0px; bottom:0px ;background-color:rgba(0,0,0,.4);height: 100%;width:100%" class="ventana_delete">
		<div style="background-color:white;position: absolute; left: 25%; top: 25%;right:25%;display;padding:25px">
			<h4 style="display: inline;">Eliminar la situacion "<strong class="name_situacion"></strong>" perteneciente al checklist "<strong class="name_categoria"></strong>"</h4>
			<a style="display: inline;float:right;" href="" class="cerrar">
				<span class="icon-cross"></span>
			</a>
			<br><br>	
			<form method="POST" method="multipart/form-data" class="delete_form_situacion">
				<input type="hidden" name="situacion_txt" class="situacion_txt">
				<input type="hidden" name="situacion_val" class="situacion_val">
				<input class="btn btn-danger btn_delete_process" type="button" value="Eliminar Situacion">
				<input class="btn btn-default" type="button" value="Cancelar">
			</form>
			<div class="m_vv">
				
			</div>	
		</div>
		
	
</div>