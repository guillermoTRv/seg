<?php 
	session_start();
	if ($_SESSION['type_user']== "admi") {
		include("../../funciones.php");
		$id_cliente = $_SESSION['cliente'];

		$registros_es = sanitizar("registros_es");
		if ($registros_es == '') {
			$fecha_1 = sanitizar("fecha_1");
			$fecha_2 = sanitizar("fecha_2");
		}


		$consulta_personal = mysqli_query($q_sec,"SELECT * FROM usuarios where empresa='$id_cliente'");
		while ($array_pr = mysqli_fetch_array($consulta_personal)) {
			$id_usuario = $array_pr["id_usuario"];
            
            $nombre     = $array_pr['nombre'];
            $apellido_p = $array_pr['apellido_p'];
            $apellido_m = $array_pr['apellido_m'];
            $nombre     = $array_pr['nombre'];
			$apellido_p = $array_pr['apellido_p'];
			$apellido_m = $array_pr['apellido_m'];
			$nombre_completo = $nombre." ".$apellido_p." ".$apellido_m;

			$identificador = $array_pr['identificador'];

            $calle      = $array_pr['calle'];
            $colonia    = $array_pr['colonia'];
            $num_exterior = $array_pr['num_exterior'];
            $entidad      = $array_pr['entidad'];
		    $demarcacion  = $array_pr['demarcacion'];

		    $inmueble_asign = $array_pr['inmueble_asign'];
		    $name_inmueble = consulta_tx("SELECT name_inmueble FROM inmuebles WHERE id_inmueble = '$inmueble_asign'",'name_inmueble');

		    $direccion = "Calle ".$calle." #".$num_exterior." Colonia ".$colonia." - ".$demarcacion." ".$entidad;
			
		    $peso = $array_pr['peso'];
		    $altura = $array_pr['altura'];
			echo "<tr>
					<td>$nombre_completo</td>
					<td>$identificador</td>
					<td>--</td>
					<td>$direccion<td>
				  	<td>--</td>
				  	<td>$name_inmueble</td>
				  	<td>--</td>
				  	<td>--</td>
				  	<td>$peso</td>
				  	<td>$altura</td>
				  </tr>";
		}
	}
	else{
		echo "ataque";
	}
	
?>