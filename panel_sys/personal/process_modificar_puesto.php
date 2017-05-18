<?php 
	session_start();
	if ($_SESSION["type_user"] == "admi") {
		include("../../funciones.php");
		$codigo = sanitizar("codigo");
		$cliente = $_SESSION["cliente"];
		if ($codigo == 1234) {
			$identificador = sanitizar("identificador_txt");
			$puesto = sanitizar("select_txt");
			$cambios = consulta_gen("UPDATE usuarios SET puesto='$puesto',inmueble_asign='00',fecha_mod_bd='$fecha' WHERE id_usuario='$identificador'");
			echo "<h4>Los cambios se realizaron exitosamente</h4>";
			if ($puesto == "guardia") {
				echo "<h4><a href='?pr=mod_inmuebles_usuario&val=$identificador' class='blue'>Seleccione el inmueble para el cual estara laborando el elemento</a></h4>";
			}
			if ($puesto == "supervisor") {
				echo "<h4><a href='?pr=mod_inmuebles_usuario&val=$identificador' class='blue'>Seleccione los inmuebles que supervisara el elemento</a></h4>";
			}
			if ($puesto == "Cliente") {
				echo "<h4>El elemento ahora podra accesar a toda la informacion del cliente  $cliente</h4>";
			}

		}
		else{
			echo 00;
		}
	}
	else{
		echo "Ataque";
	}
?>