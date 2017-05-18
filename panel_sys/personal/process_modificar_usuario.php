<?php 
	session_start();
	if ($_SESSION['type_user'] == "admi") {
		
			include("../../funciones.php");
			$val    = sanitizar("val_user");
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
			
			if ($codigo == 1234) {
				$cambios  = consulta_gen("UPDATE usuarios SET 
					nombre = '$nombre',
					apellido_p = '$apellido_p',
					apellido_m = '$apellido_m',
					curp = '$curp',
					fecha_nacimiento ='$fecha_nacimiento',
					calle = '$calle',
					colonia = '$colonia',
					num_exterior = '$num_ext',
					num_interior = '$num_int',
					codigo_postal = '$postal',
					entidad = '$entidad',
					demarcacion = '$demarcacion',
					num_movil = '$telefono_uno',
					num_dos = '$telefono_dos',
					peso = '$peso',
					altura = '$altura',
					jornada = '$jornada',
					fecha_inicio_contrato = '$fecha_inicio',
					fecha_finalizacion = '$fecha_finalizacion',
					comentarios = '$comentario'
					WHERE id_usuario = '$val'");
					echo "Los cambios se realizarón exitosamente";	
			}

			else{
				echo "Codigo de autorización incorrecto";
			}
	}
	else{
		echo "Ataque";
	}
?>