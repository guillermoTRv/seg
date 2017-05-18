<?php 
	session_start();
	if ($_SESSION['type_user']=="admi") {
		include("../../funciones.php");
		$id_cliente = $_SESSION['cliente'];
		$dato_modificar = sanitizar("dato_mod_txt");
		if ($dato_modificar != '') {
	
		
			$consulta_baja  = "SELECT * FROM usuarios WHERE MATCH(nombre,apellido_p,apellido_m,curp,identificador) AGAINST('$dato_modificar'IN BOOLEAN MODE) and empresa = '$id_cliente'";
			$consulta_val   = consulta_val($consulta_baja);
			if ($consulta_val == 1) {

				$array_baja = consulta_array($consulta_baja);
					$id_usuario = $array_baja['id_usuario'];
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
						<a class="btn btn-primary" href="?pr=opciones_modificar_usuario&val=<?php echo $id_usuario ?>" >Modificar datos del elemento</a>	
						
					<?php

			}
			if ($consulta_val > 1) {

				echo "<div class='opciones'><strong>Se encontraron $consulta_val resultados para - $dato_modificar</strong>";
				echo "<br><ul>";
				$ejecutar = mysqli_query($q_sec,$consulta_baja);
				$ejecutarr = mysqli_query($q_sec,$consulta_baja);
				while ($array_r = mysqli_fetch_array($ejecutar)) {
					$id_usuario = $array_r['id_usuario'];
					$nombre = $array_r['nombre'];
					$apellido_p = $array_r['apellido_p'];
					$apellido_m = $array_r['apellido_m'];
					$nombre_completo = $nombre." ".$apellido_p." ".$apellido_m;
					$identificador = $array_r['identificador'];
					$inmueble_asign = $array_r['inmueble_asign'];
					$name_inmueble = consulta_tx("SELECT name_inmueble FROM inmuebles WHERE id_inmueble = '$inmueble_asign'","name_inmueble");
					echo "<li class='opcion_busqueda' id='$identificador'><h4><a href=''>$nombre_completo - Identificador: $identificador - Inmueble: $name_inmueble</a></h4></li>";
				}
				echo "</ul></div>";
				
				while ($array_r = mysqli_fetch_array($ejecutarr)) {
					$id_usuario = $array_r['id_usuario'];
					$nombre = $array_r['nombre'];
					$apellido_p = $array_r['apellido_p'];
					$apellido_m = $array_r['apellido_m'];
					$nombre_completo = $nombre." ".$apellido_p." ".$apellido_m;
					$identificador = $array_r['identificador'];
					
					$num_ext = $array_r['num_exterior'];
					$calle = $array_r['calle'];
					$colonia = $array_r['colonia'];
					$entidad = $array_r['entidad'];
					$demarcacion = $array_r['demarcacion'];
					$codigo_postal = $array_r['codigo_postal'];

					$direccion = "Calle ".$calle." #".$num_ext." Colonia ".$colonia." - ".$demarcacion." ".$entidad;
					echo "<div class='$identificador' style='display:none'>";
					?>
						<h4>Nombre: <strong> <?php echo $nombre_completo?> </strong></h4>
						<h4>Identificador: <strong id="identificador"><?php echo $identificador ?></strong></h4>
						<!--antiguedad del elemento-->
						<h4>Inmueble de labores: <strong> <?php echo $name_inmueble ?></strong></h4>
						<h4>Domicilio: <strong><?php echo $direccion ?></strong></h4>
						<a class="btn btn-primary" href="?pr=opciones_modificar_usuario&val=<?php echo $id_usuario ?>" >Modificar datos del elemento</a>
						<a class="btn btn-default regresar" id="<?php echo $identificador ?>" >Regresar al listado de opciones</a>	
					<?php
					echo "</div>";
				}
				

			}
			if($consulta_val == 0){
				echo "<strong>No se encontro registro para: ".$dato_modificar."</strong>";
			}
		}
	}
	else{
		echo "ataque";
	}


?>