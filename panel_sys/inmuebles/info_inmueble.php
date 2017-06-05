<?php $val = sanitizar_get("val")?>
<div class="row">
	<div class="col-md-10">
		<br>
		<?php 
			$array = consulta_array("SELECT * FROM inmuebles where id_inmueble = '$val'");
			$id_inmueble   = $array['id_inmueble'];
			$name_inmueble = $array['name_inmueble'];
			$calle         = $array['calle'];
            $colonia       = $array['colonia'];
            $num_exterior  = $array['num_exterior'];
            $entidad       = $array['entidad'];
            $demarcacion   = $array['demarcacion'];
            $direccion     = "Calle ".$calle." #".$num_exterior." Colonia ".$colonia." ".$demarcacion." ".$entidad;

            $a_cliente     = $array['cliente'];
            $q_cliente     = consulta_array("SELECT name_cliente FROM clientes WHERE id_cliente = '$a_cliente'");
            $name_cliente  = $q_cliente['name_cliente']; 

            $conteo        = consulta_val("SELECT id_usuario FROM usuarios WHERE inmueble_asign='$id_inmueble'");

            $referencia    = $array['referencia'];
            $supervisor_inm  = $array['supervisor'];
            if($supervisor_inm != 'Aun no cuenta'){
                    $supervisor_name = consulta_array("SELECT nombre,apellido_p,apellido_m FROM usuarios WHERE id_usuario = '$supervisor_inm'");  
                    $nombre = $supervisor_name['nombre'];
                    $apellido_p = $supervisor_name['apellido_p'];
                    $apellido_m = $supervisor_name['apellido_m'];
                    $supervisor_inm = $nombre." ".$apellido_p." ".$apellido_m;
                                      
            }
            $identificador = $array['identificador'];
			$status = $array['status'];
			$status = $array['status'];
            if ($status == 11) {
                $color = "#f0ad4e";
            }
            else{
            	$color = "green";
            }
		?>
		<h4 style="display:inline;"><strong>Inmueble:</strong> <?php echo $name_inmueble ?></h4>
		<h4 style="display:inline;margin-left:20px"><strong>Empresa:</strong> <?php echo $name_cliente ?></h4>		
		<h4 style="display:inline;margin-left:20px"><strong>Supervisor:</strong> <?php echo $supervisor_inm ?></h4>
		<h4>Identificador: <?php echo $identificador ?></h4>
		<h4>Direccion: <?php echo $direccion ?></h4>
		<h4>Plantilla: #<?php echo $conteo ?> Elementos</h4>
		<h4>Referencia: <?php echo $referencia ?></h4>
		<h4><strong>Estado:</strong> <span class='icon-radio-checked' style='color:<?php echo $color ?>;font-size:.8em'></span> </h4>
		<!--<a href="" class="blue"><h4>Ver historial de Checklist generados</h4></a>-->
		<!--<a href="" class="blue"><h4><span class="icon-file-text"></span> Ver historial de reportes extraordinarios</h4></a>-->
		<br>
		<?php 
			if ($status == '11') {
				include("panel_sys/inmuebles/estatus_inmueble.php");
			}
		?>
		<a class="btn btn-default" href="?inm=listado" role="button">Regresar a listado de inmuebles (tecla <span class="glyphicon glyphicon-arrow-left"></span> )</a>

	</div>
</div>

	<script>
	
	
		$(document).keydown(function(event){
			var control_menu = $(".activo_menu").length
			if (control_menu == 0) {
				if (event.which == 37) {
					window.location.href = '?inm=listado';
				}
			}
		});
	
	</script>
