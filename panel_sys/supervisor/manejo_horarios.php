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
				url:"panel_sys/supervisor/tabla_personal_horarios.php?val="+valor_ajax+"",				
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
			url:"panel_sys/supervisor/tabla_personal_horarios.php?val="+valor_ajax+"",
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
				<form class="form-inline form-busqueda">
				  <div class="form-group">
				    <input type="text" class="form-control input_busqueda" name="valor_txt" placeholder="Busqueda rapida">
				  </div>
				  <div class="botonn" style="display:inline;">  
				   <button type="button" class="btn btn-default btn-buscar-user" data-toggle="modal" data-target="">Buscar y administrar horario</button></div>
				</form>
				<div class="m_v"></div>
				<br>
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
					Administración de horarios
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
									<th>Ant.Inm</th>
									<th><center>Estado</center></th>
									<th><center>Administrar horario</center></th>

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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
	$(document).ready(function(){
	    $(".input_busqueda").keyup(function(){
	         var val_input = $(".input_busqueda").val();
	         if (val_input != "") {
	         	
	         	
	         	$(".botonn").html('<button type="button" class="btn btn-default btn-buscar-user" data-toggle="modal" data-target="#myModal">Buscar y administrar horario</button>');

	         }
	         else{
	         	$(".botonn").html('<button type="button" class="btn btn-default btn-buscar-user" data-toggle="modal" data-target="">Buscar y administrar horario</button>');
	         }
	    });
	});
	$(document).on("click",".btn-buscar-user",function(){
		var input_busqueda = $(".input_busqueda").val()
		if (input_busqueda != '') { 
			$.ajax({
				type:"POST",
				url:"panel_sys/supervisor/process_busqueda.php",
				data:$(".form_busqueda").serialize(),
				success:function(data){
				  	$(".m_v").html("")
				  	$(".modal-body").html(data)
				}
			});
		}
		else{
			$(".m_v").html("Ingrese algun dato para poder realizar la busqueda")
		}
	});
	$(document).keydown(function(event){
	if (event.which == 13) {
			event.preventDefault()
		}
	});
</script>