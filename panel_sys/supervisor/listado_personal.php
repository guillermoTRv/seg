<script>
    $(document).keydown(function(event){
		var control_sl = $(".control_sl").length;
		if (control_sl == 0) {
			tabla_val("?pr=info&val=",event)
		}
	});


	function ajax_select_click(event){
	    $(".ul_menu li").click(function(event){	    		
			event.preventDefault()
			var valor_ajax   = $(this).attr("id")
			var nombre       = $(this).html()
			var name_cliente = $(".name_cliente").html()
			$.ajax({
				type:"GET",
				url:"panel_sys/supervisor/tabla_personal.php?val="+valor_ajax+"",				
				success:function(data){
						$(".mens").html(data)
						$(".inm_h").html(" - "+nombre)
				}	
												
			});
		});
	} 

	function ajax_select_enter(){
		var valor_ajax   = $(".control_li").attr("id")
		var nombre       = $(".control_li").html()
		var name_cliente = $(".name_cliente").html()
		$.ajax({
			type:"GET",
			url:"panel_sys/supervisor/tabla_personal.php?val="+valor_ajax+"",
			success:function(data){
				$(".mens").html(data)
				$(".inm_h").html(" - "+nombre)
				$(".ul_menu").slideUp(100);
				$(".select_a").removeClass("control_sl");
				$(".control_li").removeClass("control_li");
			}
												
		});
	}

	select_slc(ajax_select_click,ajax_select_enter)

</script>
<style> .calendar-color{font-size:1.3em;} .calendar-color:hover{color:red;}</style>
<div class="row">
	<div class="col-md-11">
				<p style="margin-left:20px">##Utilizar las teclas de navegación <span class="glyphicon glyphicon-arrow-up"></span> <span class=" glyphicon glyphicon-arrow-down"></span></p>
				<li style="display:inline-block;">
					<p style="background-color:#fff;padding:3px 6px 3px 6px;border:solid 1px #E6E6E6;border-radius:3px;font-size:1.1em"><a href="" class="select_a">Seleccione un inmueble(shift) <span class="icon-circle-down"></span></a></p>
					<ul class="ul_menu" style="display:none; position: absolute; list-style:none;background-color:#f2f2f2;padding:0px;">
						<?php 
							$q_inmuebles = mysqli_query($q_sec,"SELECT * FROM inmuebles WHERE supervisor = '$num_user'");
							while ($array_inm = mysqli_fetch_array($q_inmuebles)) {
								$name_inmueble = $array_inm['name_inmueble'];
								$id_inmueble    = $array_inm['id_inmueble'];
								echo "<li id='$id_inmueble'>$name_inmueble</li>";
							}

						?>
					</ul>
				</li>
				<h3 style="display:inline;margin-left:10px;position:absolute;margin-top:2px">
					Listado de Guardias  
					<span class="inm_h">	
					</span>
				</h3>	
				
				<div class="content">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Identificador</th>
									<th>Nom.Usuario</th>
									<th>Edad</th>
									<th>Domicilio</th>
									<th>Ant.Inm</th>
									<th>Estado</th>
									<th>Horarios</th>

								</tr>
							</thead>
							<tbody class="mens tb_s">
							<?php 
								if ($val != '') {
									$q_usuario  = mysqli_query($q_sec,"SELECT * FROM usuarios WHERE inmueble_asign = '$val' order by id_usuario asc");
									while ($array = mysqli_fetch_array($q_usuario)) {
										   $id_usuario = $array["id_usuario"];
										   $nombre     = $array['nombre'];
										   $apellido_p = $array['apellido_p'];
										   $apellido_m = $array['apellido_m'];
										   $calle      = $array['calle'];
										   $colonia    = $array['colonia'];
										   $num_exterior  = $array['num_exterior'];
										   $entidad       = $array['entidad'];
								           $demarcacion   = $array['demarcacion'];
								           
								           $identificador = $array['identificador'];
								           $usuario       = $array['usuario'];

								           $fecha_nacimiento = $array['fecha_nacimiento'];
								           $segundos= strtotime('now')-strtotime($fecha_nacimiento);
										   $diferencia_dias=intval($segundos/60/60/24);
										   $date_edadNON = $diferencia_dias/365;
										   $edad   = substr($date_edadNON, 0,2);

										   $fecha_rotacion = $array['fecha_rotacion'];
										   $segundos= strtotime('now')-strtotime($fecha_rotacion);
										   $diferencia_dias=intval($segundos/60/60/24);
										   //$date_edadNON = $diferencia_dias/365;
										   //$rotacion   = substr($date_edadNON, 0,2);
								           
								           echo "
											<tr id='$id_usuario'>
												<td>$nombre $apellido_p $apellido_m</td>
												<td>$identificador</td>
												<td>$usuario</td>
												<td>$edad</td>
												<td>Calle $calle #$num_exterior Colonia $colonia $demarcacion $entidad</td>
												<td>$diferencia_dias dias</td>
												<td>
											        <center>
											            <a href='?pr=opciones_modificar_usuario&val=$id_usuario' style='color:#5296E9'><span class=' icon-cog'></span></a>
											        </center>
											    </td>
											</tr>	
								           ";
									}
									echo "
									<script>
									$(document).ready(function(){
								        $('tbody tr').dblclick(function(){
								          var ruta = $(this).attr('id')
								          window.location.href = '?pr=info&val='+ruta+''
								        });
								    });
									</script>";
								}
							?>						
							</tbody>
						</table>
				</div>
	</div>
</div>