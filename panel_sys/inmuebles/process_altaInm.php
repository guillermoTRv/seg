<?php 
	session_start();

	if ($_SESSION['type_user'] = "admi") {
		$id_cliente = $_SESSION['cliente'];
		include("../../funciones.php");
		$codigo = sanitizar("autorizacion_txt");
		if ($codigo == 1234) {
		

			$name_inmueble = sanitizar("name_txt");
			$calle = sanitizar("calle_txt");
			$num_int = sanitizar("num_int_txt");
			$num_ext = sanitizar("num_ext_txt");
			$colonia = sanitizar("colonia_txt");
			$postal  = sanitizar("postal_txt");
			$entidad = sanitizar("entidad_txt");
			$demarcacion = sanitizar("demarcacion_txt");
			$referencia = sanitizar("referencias_txt");
			
			$consulta_val = consulta_val("SELECT name_inmueble FROM inmuebles WHERE name_inmueble='$name_inmueble'");
			if ($consulta_val == 0) {
				$consulta_insert = insertar("INSERT INTO inmuebles(
					name_inmueble,
					cliente,
					calle,
					colonia,
					num_exterior,
					num_interior,
					codigo_postal,
					entidad,
					demarcacion,
					zona,
					supervisor,
					fecha_registro_inmueble,
					fecha_mod_inmueble,
					estado_repo,
				 	referencia,
				 	status,
				 	identificador) 
				 	values(
					'$name_inmueble',
					'$id_cliente',
					'$calle',
					'$colonia',
					'$num_ext',
					'$num_int',
					'$postal',
					'$entidad',
					'$demarcacion',
					'--',
					'Aun no cuenta',
					'$fecha',
					'$fecha',
					'00',
					'$referencia',
					'si',
					'--------'
				 	)");
					$id_inmueble = consulta_tx("SELECT id_inmueble FROM inmuebles WHERE name_inmueble='$name_inmueble'",'id_inmueble');
					$caracteres_id = mb_strlen($id_inmueble);
					$resta_caracteres = 8 - $caracteres_id - 1;
					$valor_menor = substr(100000,0, $resta_caracteres);
					$valor_mayor = substr(999999,0, $resta_caracteres);
					$serie_aleatorios = rand($valor_menor,$valor_mayor);
					$identificador = $id_inmueble."-".$serie_aleatorios;

					$insertar_id = consulta_gen("UPDATE inmuebles SET identificador = '$identificador' WHERE id_inmueble = '$id_inmueble'");

					echo "El nuevo inmueble fue registrado correctamente";
			}
			
			else{

				echo "Este inmueble ya estaba registrado";
			
			}

		}
		else{
			echo "Codigo de autorizacion incorrecto";
		}	

	}
	else{
		echo "Peligro, ataque en proceso";
	}

?>