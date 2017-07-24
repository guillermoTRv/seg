<?php 
	session_start();
	include("../../funciones.php");

	if ($_SESSION['type_user'] = "admi") {
		$id_cliente = $_SESSION['cliente'];	
		$name_inmueble = sanitizar("name_txt");
		$calle = sanitizar("calle_txt");
		$num_int = sanitizar("int_txt");
		$num_ext = sanitizar("ext_txt");
		$colonia = sanitizar("colonia_txt");
		$postal  = sanitizar("postal_txt");
		$entidad = sanitizar("entidad_txt");
		$demarcacion = sanitizar("demarcacion_txt");
		$referencia = sanitizar("referencias_txt");
		$inicio = sanitizar("inicio_txt");
		$fin    = sanitizar("fin_txt");
		$codigo = sanitizar("codigo_txt");
		if ($name_inmueble != '' && $calle!='' && $num_int!='' && $num_ext!='' && $colonia!='' && $postal!='' && $entidad!='' && $demarcacion != '' && $referencia !='' && $inicio!= '' && $fin !='' && $codigo!='') {
				
				if (sanitizar("6")!='' or sanitizar("8")!='' or sanitizar("12")!='' or sanitizar("24")!='') {
					if ($codigo == $permiso) {
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
								'$inicio',
								'$fin',
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

								if (sanitizar("6") !='') {
									$hora = sanitizar("6");
									$insertar_horario = consulta_gen("INSERT INTO horarios_inmuebles(id_inmueble,hora) values('$id_inmueble','$hora')");
								}
								if (sanitizar("8") !='') {
									$hora = sanitizar("8");
									$insertar_horario = consulta_gen("INSERT INTO horarios_inmuebles(id_inmueble,hora) values('$id_inmueble','$hora')");
								}
								if (sanitizar("12") !='') {
									$hora = sanitizar("12");
									$insertar_horario = consulta_gen("INSERT INTO horarios_inmuebles(id_inmueble,hora) values('$id_inmueble','$hora')");
								}
								if (sanitizar("23") !='') {
									$hora = sanitizar("24");
									$insertar_horario = consulta_gen("INSERT INTO horarios_inmuebles(id_inmueble,hora) values('$id_inmueble','$hora')");
								}

								echo "<div class='alert alert-success' role='alert'>El nuevo inmueble fue registrado correctamente - <a href='cliente.php?inm=info&val=$id_inmueble' class='a_blue'>Ver info</></div>";
						}
						
						else{

							echo "<div class='alert alert-warning' role='alert'>Este inmueble ya estaba registrado</div>";
						
						}

					}
					else{
						echo '<div class="alert alert-warning" role="alert">Codigo de autorización incorrecto</div>';
					}	
				}
				else{
					echo '<div class="alert alert-warning" role="alert">Seleccione un horario</div>';
				}
		}
		else{
			echo '<div class="alert alert-warning" role="alert">No deje campos vacios en el formulario</div>';
		}

	}
	else{
		echo '<div class="alert alert-warning" role="alert">Peligro, ataque en proceso</div>';
	}

?>