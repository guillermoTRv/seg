<?php 
	$val = sanitizar_get("val");
?>
<script>
	function ajax_select_click(event){
		$(".ul_menu li").click(function(event){	    		
			event.preventDefault()
			var valor_ajax = $(this).attr("id")
			var nombre     = $(this).html()
			$.ajax({

				type:"GET",
				url:"panel_sys/checklist/tabla_checklist_baja.php?val="+valor_ajax+"",				
				success:function(data){
					$(".mens").html(data)
					$(".inm_h").html("Baja de categoria-situación "+nombre+"")
				}									
			});
		});
	} 

	function ajax_select_enter(){
		var valor_ajax = $(".control_li").attr("id");
		var nombre     = $(".control_li").html();
		$.ajax({
			type:"GET",
			url:"panel_sys/checklist/tabla_checklist_baja.php?val="+valor_ajax+"",
			success:function(data){
				$(".mens").html(data)
				$(".inm_h").html("Baja de categoria-situación "+nombre+"")
				$(".ul_menu").slideUp(100);
				$(".select_a").removeClass("control_sl");
				$(".control_li").removeClass("control_li");
			}
												
		});
	}

	select_slc(ajax_select_click,ajax_select_enter)

	$(function(){
        $(document).on("click","tbody tr",function(){
			var checklist_val = $(this).attr("class")
			if (checklist_val == "danger") {
				$(this).removeClass("danger");
			}
			else {				
				$(this).addClass("danger");	
			}

		});

		$(document).on("click",".btn-danger",function(){
			var danger = $(".danger").length
			if (danger != 0) {
				var r = confirm("Confirmar");
				if (r == true) {
					$("tbody tr.danger").each(function(){
		       		    var valor_tr = $(this).attr("id")
						var url = "panel_sys/checklist/process_baja_checklist.php?val_id="+valor_tr+""
						if (valor_tr == 'none') {
							valor_tr = $(this).attr("data") 
							url = "panel_sys/checklist/process_baja_checklist.php?val_data="+valor_tr+""
						}
		       		    var valor_tr = $(this).attr("id")
		       		    $(".espera").html("la info se esta enviando")
		       		    $.ajax({
							type:"GET",
							url:url,
							success:function(data){
								$(".danger").remove()	
								$(".espera").html("")	
							}											
						});
		       		});			   	    
				} 
				else {
					        
				}
			}
			if (danger == 0) {
				alert("No hay elementos seleccionados")
			}
			$(".btn-danger").blur()
		});
    });






</script>
<div class="row">
	<div class="col-md-10">
			<br>
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
				Baja de categoria-situación
			</h3>	
			
		<p>Seleccione los elementos que desea dar de baja, al final pulse el boton eliminar elementos</p>
		<button class="btn btn-danger" type="submit"><strong>Eliminar elementos</strong></button>
		<!-- <button class="btn btn-danger" type="submit"><strong>Eliminar to-os</strong></button> -->
		<div style="background-color:#fff;margin-top:15px">
				<table class="table">
					<thead>
						<tr>
							<th>Categoria</th>
							<th>Situacion</th>
							<th>Estatus</th>
						</tr>
					</thead>
					<tbody class="mens">
							
					</tbody>
				</table>
		</div>
		<div class="espera"></div>
	</div>
</div>