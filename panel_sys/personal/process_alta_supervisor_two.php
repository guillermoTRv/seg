<?php 
		   	$id_empresa = $_SESSION['cliente'];
		    $nombre = sanitizar("name_txt");
			$apellido_p = sanitizar("apellido_uno_txt");
			$apellido_m = sanitizar("apellido_dos_txt");
			$fecha_nacimiento = sanitizar("fecha_txt");
			$curp = sanitizar("curp_txt");
			$telefono_uno = sanitizar("tel_uno_txt");
			$telefono_dos = sanitizar("tel_dos_txt");

			$calle = sanitizar("calle_txt");
			$num_int = sanitizar("num_int_txt");
			$num_ext = sanitizar("num_ext_txt");
			$colonia = sanitizar("colonia_txt");
			$postal = sanitizar("postal_txt");
			$entidad = sanitizar("entidad_txt");
			$demarcacion = sanitizar("demarcacion_txt");

			$peso = sanitizar("peso_txt");
			$altura = sanitizar("altura_txt");

			//$inmueble = sanitizar("inmueble_txt");
			$jornada  = sanitizar("jornada_txt"); #variable #12 horas #24 horas

			#$turno = sanitizar("turno_txt");
			#$horario = sanitizar("horario_txt");
			$fecha_inicio = sanitizar("fecha_inicio_txt"); 
			$fecha_finalizacion = sanitizar("fecha_fin_txt");
			$comentario = sanitizar("comentario_txt");
			$codigo = sanitizar("codigo_txt");

			$con = "SELECT curp FROM usuarios WHERE curp = '$curp'";
			$con = mysqli_query($q_sec,$con);
			$con = mysqli_num_rows($con);


			//$id_inmueble = consulta_tx("SELECT id_inmueble FROM inmuebles WHERE name_inmueble = '$inmueble'","id_inmueble");
			$validacion_curp = consulta_val("SELECT curp FROM usuarios WHERE curp = '$curp'");
			if ($validacion_curp == 0) {
				$insertar = insertar("INSERT INTO usuarios(
					nombre,
					apellido_p,
					apellido_m,
					curp,
					fecha_nacimiento,
					usuario,
					
					calle,
					colonia,
					num_exterior,
					num_interior,
					codigo_postal,
					entidad,
					demarcacion,
					
					num_movil,
					num_dos,

					peso,
					altura,
					
					pass_xc,
					
					inmueble_asign,
					costo_serv,
					jornada,
					horario_laboral,
					tipo_pago,
					
					fecha_inicio_contrato,
					fecha_finalizacion,
					fecha_registro_bd,
					fecha_mod_bd,
					fecha_rotacion,
					
					estado_repo,
					puesto,
					empresa,
					status,
					identificador,
					comentarios
					) 
					VALUES(
					'$nombre',
					'$apellido_p',
					'$apellido_m',
					'$curp',
					'$fecha_nacimiento',
					'--',

					'$calle',
					'$colonia',
					'$num_ext',
					'$num_int',
					'$postal',
					'$entidad',
					'$demarcacion',
					
					'$telefono_uno',
					'$telefono_dos',

					'$peso',
					'$altura',
					
					'--',
					
					'0',
					'0000',
					'$jornada',
					'--',
					'--',

					'$fecha',
					'$fecha',
					'$fecha',
					'$fecha',
					'$fecha',
					
					'00',
					'supervisor',
					'$id_empresa',
					'si',
					'00000000',
					'$comentario'
					)");
				    
				    $id_usuario = consulta_tx("SELECT id_usuario FROM usuarios WHERE curp = '$curp'","id_usuario");
				    $caracteres_id = mb_strlen($id_usuario);
					$resta_caracteres = 8 - $caracteres_id - 1;
					$valor_menor = substr(100000,0, $resta_caracteres);
					$valor_mayor = substr(999999,0, $resta_caracteres);
					$serie_aleatorios = rand($valor_menor,$valor_mayor);
					$identificador = $id_usuario."-".$serie_aleatorios;

					$nombreMinusculas      = strtolower($nombre);
					$nombreUsuario         = $nombreMinusculas."-".$id_usuario;
					$insertar_datos = consulta_gen("UPDATE usuarios SET identificador = '$identificador',usuario = '$nombreUsuario' WHERE id_usuario = '$id_usuario'");

					$inmuebles = sanitizar("inmuebles_txt");
						$cadena = $inmuebles;
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
					echo "El nuevo supervisor ah sido registrado exitosamente junto a los inmuebles que estara supervisando";
					

			}
			else {
				echo "El usuario que este introduciendo ya esta registrado";
			}


			$resultado = @move_uploaded_file($_FILES['files']["tmp_name"], "personal_img/".$curp.".jpg");
			if ($resultado) {
				echo $_FILES["files"]["name"];	
			}
			else{
				#echo "string";
			}
?>