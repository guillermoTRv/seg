<?php 
	include("../../funciones.php");
	$pass_xc = sanitizar("pass_xc");
	if ($pass_xc == $permiso) {
	
			$identificador       = sanitizar("usuario_txt");
			$fecha_entrada_post  = sanitizar("fecha_entrada");
			$dia_txt             = sanitizar("dia_txt");
			$hora_entrada        = sanitizar("hora_entrada_txt");
			$hora_salida         = sanitizar("hora_salida_txt");
			$type_jornada        = sanitizar("jornada_txt");

			$id_registro_es = 0;
			$estado         = "en-proceso";  


			###tratar fecha####
			$mes_entrada = substr($fecha_entrada_post,5);

			$mes_entrada = substr($mes_entrada,0,-3);
			if (strlen($mes_entrada) == 1) {
			 	$mes_entrada = "0".$mes_entrada;
				$year        = substr($fecha_entrada_post,0,4);
				$day         = substr($fecha_entrada_post,7);
				$fecha_entrada_post = $year."-".$mes_entrada."-".$day;
			} 

			if ($dia_txt == "siguiente") {
				$nuevafecha   = strtotime ( '+2 day' , strtotime ( $fecha_entrada_post ) ) ;
				$fecha_salida = date ( 'Y-m-j' , $nuevafecha );
					 
			}
			if ($dia_txt == "en-curso") {
				$fecha_salida = $fecha_entrada_post;
			}

			include("process_validar_jornada.php");

		#validar que no se pueda meter turno en el mismo rango de tiempo de una jornada
		#validacion para que no meta el mismo horario
	}
	else{
		echo "Codigo de autorización incorrecto";
	}
?>