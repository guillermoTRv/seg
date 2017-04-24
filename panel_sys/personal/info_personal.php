<?php 
	$val = sanitizar_get("val");

	$q_personal = consulta_array("SELECT * FROM usuarios WHERE id_usuario='$val'");
	$nombre =     $q_personal['nombre'];
	$apellido_p = $q_personal['apellido_p'];
	$apellido_m = $q_personal['apellido_m'];
	$calle      = $q_personal['calle'];
	$colonia    = $q_personal['colonia'];
	$num_exterior = $q_personal['num_exterior'];
	$demarcacion  = $q_personal['demarcacion'];
	$entidad      = $q_personal['entidad'];

	$inmueble_asign = $q_personal['inmueble_asign'];
	$name_inmueble  = consulta_array("SELECT name_inmueble FROM inmuebles WHERE id_inmueble = '$inmueble_asign'");
	$name_inmueble  = $name_inmueble['name_inmueble'];

	$nombre_completo = $nombre." ".$apellido_p." ".$apellido_m;
	$direccion = $calle." #".$num_exterior." Colonia - ".$colonia.", ".$demarcacion.", ".$entidad;

	$usuario = $q_personal['usuario'];
	$fecha_inicio_contrato = $q_personal['fecha_inicio_contrato'];
	$num_movil = $q_personal['num_movil'];
?>

<div class="row" style="border-bottom:2px solid #6E6E6E;margin-right:25px">
	<div class="col-md-7" >
		<h4><strong>Nombre del elemento:</strong> <?php echo $nombre_completo ?></h4>
		<h4><strong>Inmueble Asignado:</strong> <?php echo $name_inmueble ?></h4>
		<h4><strong>Numero identificador:</strong> 12987</h4>
		
		<h4>Domicilio: <?php echo $direccion ?></h4>
		<h4>Nombre de usuario en el sistema: <?php echo $usuario?></h4>
		<h4>Fecha de ingreso: <?php echo $fecha_inicio_contrato ?></h4>
		<h4>Número de telefono: <?php echo $num_movil; ?></h4>
		<hr>
	</div>
	<div class="col-md-3" style="padding-left:40px;border-left:2px solid #6E6E6E;">
		<span class="glyphicon glyphicon-user" style="font-size: 12em;margin-top: 15px"></span>
	</div>
</div>
<div class="row">
	<div class="col-md-5">
		<h3>Modificacion de datos</h3>
		<a href="" style="color:blue;"><h4>Editar datos principales</h4></a>
		<a href="" style="color:blue;"><h4>Cambio de puesto</h4></a>
		<a href="" style="color:blue;"><h4>Recuperacion de contraseña</h4></a>
		<br>
		<a class="btn btn-default" href="#" role="button">Regresar a listado del porsonal (tecla <span class="glyphicon glyphicon-arrow-left"></span> )</a>
	</div>
</div>
<?php 
	echo "
	<script>
	$(document).keydown(function(event){
		var control_menu = $('.activo_menu').length
		if (control_menu == 0) {
			if (event.which == 37) {
				window.location.href = '?pr=listado&val=$inmueble_asign';
			}
		}	
	});
	</script>
	";
?>





