<?php 
	session_start();
	error_reporting(E_ALL ^ E_NOTICE);
	if ($_SESSION['type_user']=="admi") {
		include("../../funciones.php");
		$id_cliente = $_SESSION['cliente'];
		$dato_modificar = sanitizar("dato_mod_txt");
		if ($dato_modificar != '') {
	
			$q_nombre_e = consulta_val("SELECT null FROM inmuebles WHERE name_inmueble = '$dato_modificar'");
			if ($q_nombre_e == 0) {
			
				$q_nombre_a = consulta_val("SELECT null FROM inmuebles WHERE name_inmueble LIKE '%$dato_modificar%' AND cliente = '$id_cliente'"); 
				if ($q_nombre_a == 0) {

					$resp_name = true;

				}
				else{
					echo "<h4><strong>Se encontraron $q_nombre_a para $dato_modificar</strong></h4>";
					$q_c = mysqli_query($q_sec,"SELECT * FROM inmuebles WHERE name_inmueble LIKE '%$dato_modificar%'");
					while ($array = mysqli_fetch_array($q_c)) {
						$id_inmueble = $array['id_inmueble'];
						$name_inmueble = $array['name_inmueble'];
						$identificador = $array['identificador'];
						$num_ext = $array['num_exterior'];
						$calle = $array['calle'];
						$colonia = $array['colonia'];
						$entidad = $array['entidad'];
						$demarcacion = $array['demarcacion'];
						$codigo_postal = $array['codigo_postal'];

						$direccion = "Calle ".$calle." #".$num_ext." Colonia ".$colonia." - ".$demarcacion." ".$entidad;

						echo "<h4><a href='?inm=modificar_inmueble&val=$id_inmueble'>Nombre: <strong>$name_inmueble</strong> identificador: <strong>$identificador</strong> </h4></a>";
						/*echo "<h4><a href='#'>Nombre :<strong>$name_inmueble</strong> identificador: <strong>$identificador</strong> Dirccion: <strong>$direccion</strong> </h4></a>";*/

					}

				}

			}
			else{
				$date_true = true;
			}


			////////////////////////////////////////////////////////////////////////////////////////////////
			$q_identi_e = consulta_val("SELECT * FROM inmuebles WHERE identificador = '$dato_modificar'");

			if ($q_identi_e == 0) {
				
				$q_identi_a = consulta_val("SELECT null FROM inmuebles WHERE identificador LIKE '%$dato_modificar%' AND cliente = '$id_cliente'"); 
				if ($q_identi_a == 0) {
					$resp_ide = true;
				}
				else{
					echo "<h4><strong>Se encontraron $q_identi_a para $dato_modificar</strong></h4>";
					$q_c = mysqli_query($q_sec,"SELECT * FROM inmuebles WHERE identificador LIKE '%$dato_modificar%'");
					while ($array = mysqli_fetch_array($q_c)) {
						$id_inmueble = $array['id_inmueble'];
						$name_inmueble = $array['name_inmueble'];
						$identificador = $array['identificador'];
						$num_ext = $array['num_exterior'];
						$calle = $array['calle'];
						$colonia = $array['colonia'];
						$entidad = $array['entidad'];
						$demarcacion = $array['demarcacion'];
						$codigo_postal = $array['codigo_postal'];

						$direccion = "Calle ".$calle." #".$num_ext." Colonia ".$colonia." - ".$demarcacion." ".$entidad;

						echo "<h4><a href='?inm=modificar_inmueble&val=$id_inmueble'>Nombre: <strong>$name_inmueble</strong> identificador: <strong>$identificador</strong> </h4></a>";
						/*echo "<h4><a href='#'>Nombre :<strong>$name_inmueble</strong> identificador: <strong>$identificador</strong> Dirccion: <strong>$direccion</strong> </h4></a>";*/

					}
				}

			}
			else{
			
				$date_true = true;
			
			}

			if ($resp_ide == true && $resp_name == true) {
				echo "<br><strong>No se encontro registro para: ".$dato_modificar."</strong>";
			}
			if ($date_true == true) {
				echo "Solo un resultado";
			}







		
			
			/*if($consulta_val == 0){
				echo "<strong>No se encontro registro para: ".$dato_modificar."</strong>";
			}*/
		}
	}
	else{
		echo "ataque";
	}


?>