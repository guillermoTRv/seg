<?php $val = sanitizar_get("val")?>
<div class="row">
	<div class="col-md-10">
		<?php 
			$array = consulta_array("SELECT * FROM inmuebles where id_inmueble = '$val'");
			$id_inmueble   = $array['id_inmueble'];
			$name_inmueble = $array['name_inmueble'];
			$calle         = $array['calle'];
            $colonia       = $array['colonia'];
            $num_exterior  = $array['num_exterior'];
            $entidad       = $array['entidad'];
            $demarcacion   = $array['demarcacion'];
            $direccion     = $calle." #".$num_exterior." ".$colonia." ".$demarcacion." ".$entidad;

            $a_cliente     = $array['cliente'];
            $q_cliente     = consulta_array("SELECT name_cliente FROM clientes WHERE id_cliente = '$a_cliente'");
            $name_cliente  = $q_cliente['name_cliente']; 

            $conteo        = consulta_val("SELECT id_usuario FROM usuarios WHERE inmueble_asign='$id_inmueble'");

            $referencia    = $array['referencia']
		?>
		<h3 style="display:inline;"><strong>Inmueble:</strong> <?php echo $name_inmueble ?></h3>
		<h3 style="display:inline;margin-left:20px"><strong>Empresa:</strong> <?php echo $name_cliente ?></h3>		
		<h3 style="display:inline;margin-left:20px"><strong>Supervisor:</strong> Aun no cuenta</h3>
		<h3>Direccion: <?php echo $direccion ?></h3>
		<h3>Plantilla: <?php echo $conteo ?></h3>
		<h3>Referencia: <?php echo $referencia ?></h3>
		<hr>
		<li style="display:inline-block;">
				<p style="background-color:#fff;padding:3px 6px 3px 6px;border:solid 1px #E6E6E6;border-radius:3px;font-size:1.1em"><a href="" class="select_a">Seleccione un tipo de reporte(shift) <span class="icon-circle-down"></span></a></p>
				<ul class="ul_menu" style="display:none; position: absolute; list-style:none;background-color:#f2f2f2;padding:0px;">
					<li><a href="#">Reportes extraordinarios</a></li>
					<li><a href="#">Reportes de personal</a></li>
					<li><a href="#">Reportes Checklist</a></li>
				</ul>
		</li>
		<a class="btn btn-default" href="#" role="button" style="margin-bottom:5px;margin-left:10px ">Regresar a listado de inmuebles (tecla <span class="glyphicon glyphicon-arrow-left"></span> )</a>

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
