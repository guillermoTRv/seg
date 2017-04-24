<?php 
	$val = sanitizar_get("val");
?>
<script>
	$(document).keydown(function(event){
		var control_sl = $(".control_sl").length;
		if (control_sl == 0) {
			tabla_val("",event)
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




</script>
<div class="row">
	<div class="col-md-10">
			<p style="margin-left:20px">##Utilizar las teclas de navegación <span class="glyphicon glyphicon-arrow-up"></span> <span class=" glyphicon glyphicon-arrow-down"></span></p>
			<li style="display:inline-block;">
				<p style="background-color:#fff;padding:3px 6px 3px 6px;border:solid 1px #E6E6E6;border-radius:3px;font-size:1.1em"><a href="" class="select_a">Seleccione un inmueble(shift) <span class="icon-circle-down"></span></a></p>
				<ul class="ul_menu" style="display:none; position: absolute; list-style:none;background-color:#f2f2f2;padding:0px;">
					<?php 
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
					?>
				</ul>
			</li>
			<h3 style="display:inline;margin-left:10px;position:absolute;margin-top:2px" class="inm_h">
				Listado Checklist
				<?php 
					if ($val != '') {
						echo " - ".$name_inmueble = consulta_tx("SELECT name_inmueble FROM inmuebles WHERE id_inmueble='$val'","name_inmueble");
					}
				?>
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
					<?php 
						if ($val != '') {
							
							$q_categoria = mysqli_query($q_sec,"SELECT id_categoria,categoria FROM checklist_categoria WHERE id_inmueble = '$val'");
							while ($array = mysqli_fetch_array($q_categoria)) {
								   $id_categoria = $array["id_categoria"];
								   $categoria = $array["categoria"];

								   $q_situacion = mysqli_query($q_sec,"SELECT id_situacion,situacion FROM checklist_situacion WHERE id_categoria = '$id_categoria'");
								   while ($array_st = mysqli_fetch_array($q_situacion)) {
								   		$id_situacion = $array_st["id_situacion"];
								   		$situacion = $array_st["situacion"];
								   		echo "
										<tr id='$id_usuario'>
											<td>$categoria</td>
											<td>$situacion</td>
											<td>Activo</td>
										</tr>	
							           ";	
								   }

						           
							}
							/**echo "
							<script>
							$(document).ready(function(){
						        $('tbody tr').dblclick(function(){
						          var ruta = $(this).attr('id')
						          window.location.href = '?pr=info&val='+ruta+''
						        });
						    });
							</script>";*/
						}
					?>						
					</tbody>
				</table>
		</div>
	</div>
</div>