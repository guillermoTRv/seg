<?php 
	session_start();
	if ($_SESSION['type_user'] == "admi") {
		include("../../funciones.php");
		$id_cliente = $_SESSION['cliente'];

		$dato_baja = sanitizar("dato_baja_txt");
		$consulta_baja = "SELECT * FROM usuarios WHERE MATCH(nombre,apellido_p,apellido_m,curp,identificador) AGAINST('$dato_baja'IN BOOLEAN MODE) and empresa = '$id_cliente'";
		$consulta_val = consulta_val($consulta_baja);
		if ($consulta_val > 0) {

			$array_baja = consulta_array($consulta_baja);
				$nombre = $array_baja['nombre'];
				$apellido_p = $array_baja['apellido_p'];
				$apellido_m = $array_baja['apellido_m'];
				$nombre_completo = $nombre." ".$apellido_p." ".$apellido_m;
				$identificador = $array_baja['identificador'];

				$num_ext = $array_baja['num_exterior'];
				$calle = $array_baja['calle'];
				$colonia = $array_baja['colonia'];
				$entidad = $array_baja['entidad'];
				$demarcacion = $array_baja['demarcacion'];
				$codigo_postal = $array_baja['codigo_postal'];

				$direccion = "Calle ".$calle." #".$num_ext." Colonia ".$colonia." - ".$demarcacion." ".$entidad;
				
				$inmueble_asign = $array_baja['inmueble_asign'];
				$name_inmueble = consulta_tx("SELECT name_inmueble FROM inmuebles WHERE id_inmueble = '$inmueble_asign'","name_inmueble");


				?>	
					<h4>Nombre: <strong> <?php echo $nombre_completo?> </strong></h4>
					<h4>Identificador: <strong id="identificador"><?php echo $identificador ?></strong></h4>
					<!--antiguedad del elemento-->
					<h4>Inmueble de labores: <strong> <?php echo $name_inmueble ?></strong></h4>
					<h4>Domicilio: <strong><?php echo $direccion ?></strong></h4>
					<div class="espacio_baja">
						<button type="button" class="btn btn-danger btn-baja">Dar de baja al elemento</button>	
					</div>
					
				<?php

		}else{
			echo "<br><strong>No se encontro registro para: ".$dato_baja."</strong>";
		}

	}
	else{
		echo "ataque";
	}
?>
