<?php 

	$q_personal = consulta_array("SELECT * FROM usuarios WHERE id_usuario='$val'");
	$nombre =     $q_personal['nombre'];
	$apellido_p = $q_personal['apellido_p'];
	$apellido_m = $q_personal['apellido_m'];
	$nombre_completo = $nombre." ".$apellido_p." ".$apellido_m;

	$calle      = $q_personal['calle'];
	$colonia    = $q_personal['colonia'];
	$num_exterior = $q_personal['num_exterior'];
	$demarcacion  = $q_personal['demarcacion'];
	$entidad      = $q_personal['entidad'];
	$direccion = "Calle ".$calle." #".$num_exterior." Colonia - ".$colonia.", ".$demarcacion.", ".$entidad;

	$identificador = $q_personal['identificador'];

	$inmueble_asign = $q_personal['inmueble_asign'];
	$name_inmueble  = consulta_array("SELECT name_inmueble FROM inmuebles WHERE id_inmueble = '$inmueble_asign'");
	$name_inmueble  = $name_inmueble['name_inmueble'];
	$fecha_rotacion = $q_personal['fecha_rotacion'];
	$segundos= strtotime('now')-strtotime($fecha_rotacion);
	$diferencia_dias=intval($segundos/60/60/24);

	$usuario = $q_personal['usuario'];
	$fecha_inicio_contrato = $q_personal['fecha_inicio_contrato'];
	$num_movil = $q_personal['num_movil'];

	$puesto = $q_personal['puesto'];
	$curp = $q_personal['curp'];
?>

<div class="row" style="border-bottom:2px solid #6E6E6E;margin-right:25px">
	<div class="col-md-7" style="border-right:2px solid #6E6E6E;" >
		<h4><strong>Nombre del elemento:</strong> <?php echo $nombre_completo ?></h4>
		<h4><strong>Numero identificador:</strong> <?php echo $identificador ?></h4>
		<?php 
			if($puesto == "guardia"){
				?><h4><strong>Inmueble Asignado:</strong> <?php echo $name_inmueble ?> con <?php echo $diferencia_dias ?> dias </h4><?php
			} 
		?>
		<h4><strong>Nombre de usuario:</strong> <?php echo $usuario ?></h4>	
		<h4>Domicilio: <?php echo $direccion ?></h4>
		<h4>Fecha de ingreso: <?php echo $fecha_inicio_contrato ?></h4>
		<h4>Finalización de contrato</h4>
		<h4>Número de telefono: <?php echo $num_movil; ?></h4>
		<a href="" class="blue"><h4>Ver historial de reportes de este elemento</h4></a>
		<a href="" class="blue"><h4>Ver historial de asistencia de este elemento</h4></a>
		
		<hr>
	</div>
	<div class="col-md-3" style="padding-left:40px;">
		<img src="panel_sys/personal/personal_img/<?php echo $identificador ?>" alt="imagen" style="width: 200px;height:200px;border:1px solid #222;border-radius:9px;">
		<br><br>
		<a class="btn btn-default" href="./descargar_qr.php?qr=<?php echo $identificador ?>" role="button">Codigo QR del <?php echo $puesto ?></a>
	</div>
</div>
<div class="row">
	
		<?php 
			if ($puesto == "supervisor") {
				?>
				<div class="col-md-6" >
					<br><h4><strong>Inmuebles asignados:</strong></h4>
					<?php
						$q_inmuebles = mysqli_query($q_sec,"SELECT name_inmueble FROM inmuebles WHERE supervisor = '$val'");
						while ($array_inm = mysqli_fetch_array($q_inmuebles)) {
							$inmueble_sup = $array_inm['name_inmueble'];
							echo "<h4><span class='icon-radio-checked' style='color:green'></span> - $inmueble_sup</h4>";
					}
					?>
				</div>
				<?php
				#asignar un valor para saber la antiguedad
			}
		?>
	<?php 
	if ($puesto == 'guardia'){ $estilo_mod = "";} 
	if ($puesto == 'supervisor'){$estilo_mod = "style='padding-left:28px;border-left:2px solid #6E6E6E;'"; }
	?>
	<div class="col-md-5" <?php echo $estilo_mod ?>>
		<h3>Modificación de datos</h3>
		<a href="?pr=mod_datos_generales_usuario&val=<?php echo $val ?>" class="blue"><h4>Editar datos generales</h4></a>
		<a href="?pr=mod_fotografia_usuario&val=<?php echo $val ?>" class="blue"><h4>Modificar fotografía</h4></a>
		<a href="?pr=mod_inmuebles_usuario&val=<?php echo $val ?>" class="blue"><h4>Rotacion de inmuebles</h4></a>
		<a href="?pr=mod_puesto_usuario&val=<?php echo $val ?>" class="blue"><h4>Cambio de puesto</h4></a>
		<a href="?pr=mod_password_usuario&val=<?php echo $val ?>" class="blue"><h4>Recuperacion de contraseña</h4></a>
		<br>
		<?php 
			if ($puesto == 'guardia') {
				$ruta_return = "?pr=listado&val=$inmueble_asign";
			}
			if ($puesto == 'supervisor') {
				$ruta_return = "?pr=listado";
			}
		?>
		<a class="btn btn-default" href="<?php echo $ruta_return ?>" role="button">Regresar a listado del personal (tecla <span class="glyphicon glyphicon-arrow-left"></span> )</a>
	</div>
</div>
<br><br>
<?php 
	if ($puesto == 'guardia') {
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
	}
	if ($puesto == 'supervisor') {
		echo "
		<script>
		$(document).keydown(function(event){
			var control_menu = $('.activo_menu').length
			if (control_menu == 0) {
				if (event.which == 37) {
					window.location.href = '$ruta_return';
				}
			}	
		});
		</script>
		";
	}
	
?>





