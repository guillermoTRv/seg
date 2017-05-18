<?php 
	session_start();
	if ($_SESSION['type_user'] == "admi") {
		include("../../funciones.php");
		$type_usuario = sanitizar("val_puesto_txt");
		$id_inmueble  = sanitizar("val_inmueble_txt");
		$id_usuario   = sanitizar("val_usuario_txt");
		$codigo       = sanitizar("codigo");
			$q_personal = consulta_array("SELECT * FROM usuarios WHERE id_usuario='$id_usuario'");
			$nombre =     $q_personal['nombre'];
			$apellido_p = $q_personal['apellido_p'];
			$apellido_m = $q_personal['apellido_m'];
			$nombre_completo = $nombre." ".$apellido_p." ".$apellido_m;
		if ($codigo == $permiso) {
			
			if ($type_usuario == "guardia") {
				
					$consulta_val = consulta_val("SELECT null FROM usuarios WHERE id_usuario = '$id_usuario' and inmueble_asign = '$id_inmueble'");
					$name_inmueble = consulta_tx("SELECT name_inmueble FROM inmuebles WHERE id_inmueble = '$id_inmueble'","name_inmueble");

					if ($consulta_val == 0) {
						$rotacion_guardia = consulta_gen("UPDATE usuarios SET inmueble_asign='$id_inmueble',fecha_rotacion='$fecha' WHERE id_usuario='$id_usuario'");
						echo "<br><h4>La rotacion de inmueble se realizo de manera exitosa - Ahora el guardia <strong>$nombre_completo</strong> laborara en el inmueble $name_inmueble</h4>";			
					}
					else{
						echo "<br><h4>El inmueble ya estaba asignado al elemento</h4>";			
					}
						
			}
			if ($type_usuario == "supervisor") {
					$cadena = $id_inmueble;
					$inicio_corte = 0;
					for($i=0;$i<strlen($cadena);$i++)
					{
						if (is_numeric($cadena[$i])) {
						}
						else{
							$fin_corte = $i - $inicio_corte;
							$corte = substr($cadena,$inicio_corte,$fin_corte);
							$asignacion = consulta_gen("UPDATE inmuebles SET supervisor='$id_usuario' WHERE id_inmueble='$corte'");
							$inicio_corte = $i+1;
						}	

					}
					echo "<h4>La rotacion de inmuebles se ah realizado exitosamente</h4>";
					echo "<h4>Ahora los anteriores inmuebles son supervisados por <strong>$nombre_completo</strong></h4>";
			}
					
		}
		else{
			echo 00;
		}
	}
	else{
		echo "ataque";
	}

?>